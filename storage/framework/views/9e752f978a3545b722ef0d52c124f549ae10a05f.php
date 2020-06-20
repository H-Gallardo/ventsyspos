<div class="modal-dialog modal-xl" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close no-print" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="modalTitle"> <?php echo e(app('translator')->getFromJson('lang_v1.purchase_return_details')); ?> (<b><?php echo e(app('translator')->getFromJson('purchase.ref_no')); ?>:</b> #<?php echo e($purchase->return_parent->ref_no); ?>)
        </h4>
    </div>

    <div class="modal-body">
      <div class="row">
        <div class="col-sm-6 col-xs-6">
          <h4><?php echo e(app('translator')->getFromJson('lang_v1.purchase_return_details')); ?>:</h4>
          <strong><?php echo e(app('translator')->getFromJson('lang_v1.return_date')); ?>:</strong> <?php echo e(\Carbon::createFromTimestamp(strtotime($purchase->return_parent->transaction_date))->format(session('business.date_format'))); ?><br>
          <strong><?php echo e(app('translator')->getFromJson('purchase.supplier')); ?>:</strong> <?php echo e($purchase->contact->name); ?> <br>
          <strong><?php echo e(app('translator')->getFromJson('purchase.business_location')); ?>:</strong> <?php echo e($purchase->location->name); ?>

        </div>
        <div class="col-sm-6 col-xs-6">
          <h4><?php echo e(app('translator')->getFromJson('purchase.purchase_details')); ?>:</h4>
          <strong><?php echo e(app('translator')->getFromJson('purchase.ref_no')); ?>:</strong> <?php echo e($purchase->ref_no); ?> <br>
          <strong><?php echo e(app('translator')->getFromJson('messages.date')); ?>:</strong> <?php echo e(\Carbon::createFromTimestamp(strtotime($purchase->transaction_date))->format(session('business.date_format'))); ?>

        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-sm-12">
          
        </div>
        <div class="col-sm-4">
          
        </div>
        <div class="col-sm-12">
          <br>
          <table class="table bg-gray">
            <thead>
              <tr class="bg-green">
                  <th>#</th>
                  <th><?php echo e(app('translator')->getFromJson('product.product_name')); ?></th>
                  <th><?php echo e(app('translator')->getFromJson('sale.unit_price')); ?></th>
                  <th><?php echo e(app('translator')->getFromJson('lang_v1.return_quantity')); ?></th>
                  <th><?php echo e(app('translator')->getFromJson('lang_v1.return_subtotal')); ?></th>
              </tr>
          </thead>
          <tbody>
              <?php
                $total_before_tax = 0;
              ?>
              <?php $__currentLoopData = $purchase->purchase_lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase_line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($purchase_line->quantity_returned == 0): ?>
                <?php continue; ?>
              <?php endif; ?>
              <tr>
                  <td><?php echo e($loop->iteration); ?></td>
                  <td>
                    <?php echo e($purchase_line->product->name); ?>

                    <?php if( $purchase_line->product->type == 'variable'): ?>
                      - <?php echo e($purchase_line->variations->product_variation->name); ?>

                      - <?php echo e($purchase_line->variations->name); ?>

                    <?php endif; ?>
                  </td>
                  <td><span class="display_currency" data-currency_symbol="true"><?php echo e($purchase_line->purchase_price_inc_tax); ?></span></td>
                  <td><?php echo e(number_format($purchase_line->quantity_returned, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator'])); ?></td>
                  <td>
                    <?php
                      $line_total = $purchase_line->purchase_price_inc_tax * $purchase_line->quantity_returned;
                      $total_before_tax += $line_total ;
                    ?>
                    <span class="display_currency" data-currency_symbol="true"><?php echo e($line_total); ?></span>
                  </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
        <table class="table">
          <tr>
            <th><?php echo e(app('translator')->getFromJson('purchase.net_total_amount')); ?>: </th>
            <td></td>
            <td><span class="display_currency pull-right" data-currency_symbol="true"><?php echo e($total_before_tax); ?></span></td>
          </tr>
          
          <tr>
            <th><?php echo e(app('translator')->getFromJson('lang_v1.total_return_tax')); ?>:</th>
            <td><b>(+)</b></td>
            <td class="text-right">
                <?php if(!empty($purchase_taxes)): ?>
                  <?php $__currentLoopData = $purchase_taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <strong><small><?php echo e($k); ?></small></strong> - <span class="display_currency pull-right" data-currency_symbol="true"><?php echo e($v); ?></span><br>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                0.00
                <?php endif; ?>
              </td>
          </tr>
          <tr>
            <th><?php echo e(app('translator')->getFromJson('lang_v1.return_total')); ?>:</th>
            <td></td>
            <td><span class="display_currency pull-right" data-currency_symbol="true" ><?php echo e($purchase->return_parent->final_total); ?></span></td>
          </tr>
        </table>
      </div>
    </div>

    <div class="modal-footer">
      <button type="button" class="btn btn-primary no-print" aria-label="Print" 
      onclick="$(this).closest('div.modal-content').printThis();"><i class="fa fa-print"></i> <?php echo e(app('translator')->getFromJson( 'messages.print' )); ?>
      </button>
      <button type="button" class="btn btn-default no-print" data-dismiss="modal"><?php echo e(app('translator')->getFromJson( 'messages.close' )); ?></button>
    </div>
  </div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		var element = $('div.modal-xl');
		__currency_convert_recursively(element);
	});
</script>