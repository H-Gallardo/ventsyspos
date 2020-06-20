<div class="modal-dialog modal-xl no-print" role="document">
  <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close no-print" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="modalTitle"> <?php echo e(app('translator')->getFromJson('sale.sell_details')); ?> (<b><?php echo e(app('translator')->getFromJson('sale.invoice_no')); ?>:</b> <?php echo e($sell->invoice_no); ?>)
    </h4>
</div>
<div class="modal-body">
    <div class="row">
      <div class="col-xs-12">
          <p class="pull-right"><b><?php echo e(app('translator')->getFromJson('messages.date')); ?>:</b> <?php echo e(\Carbon::createFromTimestamp(strtotime($sell->transaction_date))->format(session('business.date_format'))); ?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4">
        <b><?php echo e(__('sale.invoice_no')); ?>:</b> #<?php echo e($sell->invoice_no); ?><br>
        <b><?php echo e(__('sale.status')); ?>:</b> 
          <?php if($sell->status == 'draft' && $sell->is_quotation == 1): ?>
            <?php echo e(__('lang_v1.quotation')); ?>

          <?php else: ?>
            <?php echo e(ucfirst( $sell->status )); ?>

          <?php endif; ?>
        <br>
        <b><?php echo e(__('sale.payment_status')); ?>:</b> <?php echo e(ucfirst( $sell->payment_status )); ?><br>
      </div>
      <div class="col-sm-4">
        <b><?php echo e(__('sale.customer_name')); ?>:</b> <?php echo e($sell->contact->name); ?><br>
        <b><?php echo e(__('business.address')); ?>:</b><br>
        <?php if($sell->contact->landmark): ?>
            <?php echo e($sell->contact->landmark); ?>

        <?php endif; ?>

        <?php echo e(', ' . $sell->contact->city); ?>


        <?php if($sell->contact->state): ?>
            <?php echo e(', ' . $sell->contact->state); ?>

        <?php endif; ?>
        <br>
        <?php if($sell->contact->country): ?>
            <?php echo e($sell->contact->country); ?>

        <?php endif; ?>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-sm-12 col-xs-12">
        <h4><?php echo e(__('sale.products')); ?>:</h4>
      </div>

      <div class="col-sm-12 col-xs-12">
        <div class="table-responsive">
          <table class="table bg-gray">
            <tr class="bg-green">
              <th>#</th>
              <th><?php echo e(__('sale.product')); ?></th>
              <?php if( session()->get('business.enable_lot_number') == 1): ?>
                <th><?php echo e(__('lang_v1.lot_n_expiry')); ?></th>
              <?php endif; ?>
              <th><?php echo e(__('sale.qty')); ?></th>
              <th><?php echo e(__('sale.unit_price')); ?></th>
              <th><?php echo e(__('sale.discount')); ?></th>
              <th><?php echo e(__('sale.tax')); ?></th>
              <th><?php echo e(__('sale.price_inc_tax')); ?></th>
              <th><?php echo e(__('sale.subtotal')); ?></th>
            </tr>
            <?php $__currentLoopData = $sell->sell_lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sell_line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td>
                  <?php echo e($sell_line->product->name); ?>

                  <?php if( $sell_line->product->type == 'variable'): ?>
                    - <?php echo e(isset($sell_line->variations->product_variation->name) ? $sell_line->variations->product_variation->name : ''); ?>

                    - <?php echo e(isset($sell_line->variations->name) ? $sell_line->variations->name : ''); ?>,
                   <?php endif; ?>
                   <?php echo e(isset($sell_line->variations->sub_sku) ? $sell_line->variations->sub_sku : ''); ?>

                    <?php
                      $brand = $sell_line->product->brand;
                    ?>
                    <?php if(!empty($brand->name)): ?>
                      , <?php echo e($brand->name); ?>

                    <?php endif; ?>

                    <?php if(!empty($sell_line->sell_line_note)): ?>
                    <br> <?php echo e($sell_line->sell_line_note); ?>

                    <?php endif; ?>
                </td>
                <?php if( session()->get('business.enable_lot_number') == 1): ?>
                  <td><?php echo e(isset($sell_line->lot_details->lot_number) ? $sell_line->lot_details->lot_number : '--'); ?>

                  <?php if( session()->get('business.enable_product_expiry') == 1 && !empty($sell_line->lot_details->exp_date)): ?>
                    (<?php echo e(\Carbon::createFromTimestamp(strtotime($sell_line->lot_details->exp_date))->format(session('business.date_format'))); ?>)
                  <?php endif; ?>
                  </td>
                <?php endif; ?>
                <td><span class="display_currency" data-currency_symbol="false"><?php echo e($sell_line->quantity); ?></span></td>
                <td>
                  <span class="display_currency" data-currency_symbol="true"><?php echo e($sell_line->unit_price); ?></span>
                </td>
                <td>
                  <span class="display_currency" data-currency_symbol="true"><?php echo e($sell_line->get_discount_amount()); ?></span> <?php if($sell_line->line_discount_type == 'percentage'): ?> (<?php echo e($sell_line->line_discount_amount); ?>%) <?php endif; ?>
                </td>
                <td>
                  <span class="display_currency" data-currency_symbol="true"><?php echo e($sell_line->item_tax); ?></span> 
                  <?php if(!empty($taxes[$sell_line->tax_id])): ?>
                    ( <?php echo e($taxes[$sell_line->tax_id]); ?> )
                  <?php endif; ?>
                </td>
                <td>
                  <span class="display_currency" data-currency_symbol="true"><?php echo e($sell_line->unit_price_inc_tax); ?></span>
                </td>
                <td>
                  <span class="display_currency" data-currency_symbol="true"><?php echo e($sell_line->quantity * $sell_line->unit_price_inc_tax); ?></span>
                </td>
              </tr>
              <?php if(!empty($sell_line->modifiers)): ?>
                <?php $__currentLoopData = $sell_line->modifiers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modifier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td>&nbsp;</td>
                    <td>
                      <?php echo e($modifier->product->name); ?> - <?php echo e(isset($modifier->variations->name) ? $modifier->variations->name : ''); ?>,
                      <?php echo e(isset($modifier->variations->sub_sku) ? $modifier->variations->sub_sku : ''); ?>

                    </td>
                    <?php if( session()->get('business.enable_lot_number') == 1): ?>
                    <td>&nbsp;</td>
                    <?php endif; ?>
                    <td><?php echo e($modifier->quantity); ?></td>
                    <td>
                      <span class="display_currency" data-currency_symbol="true"><?php echo e($modifier->unit_price); ?></span>
                    </td>
                    <td>
                      &nbsp;
                    </td>
                    <td>
                      <span class="display_currency" data-currency_symbol="true"><?php echo e($modifier->item_tax); ?></span> 
                      <?php if(!empty($taxes[$modifier->tax_id])): ?>
                        ( <?php echo e($taxes[$modifier->tax_id]); ?> )
                      <?php endif; ?>
                    </td>
                    <td>
                      <span class="display_currency" data-currency_symbol="true"><?php echo e($modifier->unit_price_inc_tax); ?></span>
                    </td>
                    <td>
                      <span class="display_currency" data-currency_symbol="true"><?php echo e($modifier->quantity * $modifier->unit_price_inc_tax); ?></span>
                    </td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </table>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12 col-xs-12">
        <h4><?php echo e(__('sale.payment_info')); ?>:</h4>
      </div>
      <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="table-responsive">
          <table class="table bg-gray">
            <tr class="bg-green">
              <th>#</th>
              <th><?php echo e(__('messages.date')); ?></th>
              <th><?php echo e(__('purchase.ref_no')); ?></th>
              <th><?php echo e(__('sale.amount')); ?></th>
              <th><?php echo e(__('sale.payment_mode')); ?></th>
              <th><?php echo e(__('sale.payment_note')); ?></th>
            </tr>
            <?php
              $total_paid = 0;
            ?>
            <?php $__currentLoopData = $sell->payment_lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment_line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                if($payment_line->is_return == 1){
                  $total_paid -= $payment_line->amount;
                } else {
                  $total_paid += $payment_line->amount;
                }
              ?>
              <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e(\Carbon::createFromTimestamp(strtotime($payment_line->paid_on))->format(session('business.date_format'))); ?></td>
                <td><?php echo e($payment_line->payment_ref_no); ?></td>
                <td><span class="display_currency" data-currency_symbol="true"><?php echo e($payment_line->amount); ?></span></td>
                <td>
                  <?php echo e(isset($payment_types[$payment_line->method]) ? $payment_types[$payment_line->method] : $payment_line->method); ?>

                  <?php if($payment_line->is_return == 1): ?>
                    <br/>
                    ( <?php echo e(__('lang_v1.change_return')); ?> )
                  <?php endif; ?>
                </td>
                <td><?php if($payment_line->note): ?> 
                  <?php echo e(ucfirst($payment_line->note)); ?>

                  <?php else: ?>
                  --
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </table>
        </div>
      </div>
      <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="table-responsive">
          <table class="table bg-gray">
            <tr>
              <th><?php echo e(__('sale.total')); ?>: </th>
              <td></td>
              <td><span class="display_currency pull-right" data-currency_symbol="true"><?php echo e($sell->total_before_tax); ?></span></td>
            </tr>
            <tr>
              <th><?php echo e(__('sale.discount')); ?>:</th>
              <td><b>(-)</b></td>
              <td><span class="pull-right"><?php echo e($sell->discount_amount); ?> <?php if( $sell->discount_type == 'percentage'): ?> <?php echo e('%'); ?> <?php endif; ?></span></td>
            </tr>
            <tr>
              <th><?php echo e(__('sale.order_tax')); ?>:</th>
              <td><b>(+)</b></td>
              <td class="text-right">
                <?php if(!empty($order_taxes)): ?>
                  <?php $__currentLoopData = $order_taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <strong><small><?php echo e($k); ?></small></strong> - <span class="display_currency pull-right" data-currency_symbol="true"><?php echo e($v); ?></span><br>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                0.00
                <?php endif; ?>
              </td>
            </tr>
            <tr>
              <th><?php echo e(__('sale.shipping')); ?>: <?php if($sell->shipping_details): ?>(<?php echo e($sell->shipping_details); ?>) <?php endif; ?></th>
              <td><b>(+)</b></td>
              <td><span class="display_currency pull-right" data-currency_symbol="true"><?php echo e($sell->shipping_charges); ?></span></td>
            </tr>
            <tr>
              <th><?php echo e(__('sale.total_payable')); ?>: </th>
              <td></td>
              <td><span class="display_currency pull-right"><?php echo e($sell->final_total); ?></span></td>
            </tr>
            <tr>
              <th><?php echo e(__('sale.total_paid')); ?>:</th>
              <td></td>
              <td><span class="display_currency pull-right" data-currency_symbol="true" ><?php echo e($total_paid); ?></span></td>
            </tr>
            <tr>
              <th><?php echo e(__('sale.total_remaining')); ?>:</th>
              <td></td>
              <td><span class="display_currency pull-right" data-currency_symbol="true" ><?php echo e($sell->final_total - $total_paid); ?></span></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <strong><?php echo e(__( 'sale.sell_note')); ?>:</strong><br>
        <p class="well well-sm no-shadow bg-gray">
          <?php if($sell->additional_notes): ?>
            <?php echo e($sell->additional_notes); ?>

          <?php else: ?>
            --
          <?php endif; ?>
        </p>
      </div>
      <div class="col-sm-6">
        <strong><?php echo e(__( 'sale.staff_note')); ?>:</strong><br>
        <p class="well well-sm no-shadow bg-gray">
          <?php if($sell->staff_note): ?>
            <?php echo e($sell->staff_note); ?>

          <?php else: ?>
            --
          <?php endif; ?>
        </p>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <a href="#" class="print-invoice btn btn-primary" data-href="<?php echo e(route('sell.printInvoice', [$sell->id])); ?>"><i class="fa fa-print" aria-hidden="true"></i> <?php echo e(app('translator')->getFromJson("messages.print")); ?></a>
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
