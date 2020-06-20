<div class="modal-header">
    <button type="button" class="close no-print" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="modalTitle"> <?php echo e(app('translator')->getFromJson('purchase.purchase_details')); ?> (<b><?php echo e(app('translator')->getFromJson('purchase.ref_no')); ?>:</b> #<?php echo e($purchase->ref_no); ?>)
    </h4>
</div>
<div class="modal-body">
  <div class="row">
    <div class="col-sm-12">
      <p class="pull-right"><b><?php echo e(app('translator')->getFromJson('messages.date')); ?>:</b> <?php echo e(\Carbon::createFromTimestamp(strtotime($purchase->transaction_date))->format(session('business.date_format'))); ?></p>
    </div>
  </div>
  <div class="row invoice-info">
    <div class="col-sm-4 invoice-col">
      <?php echo e(app('translator')->getFromJson('purchase.supplier')); ?>:
      <address>
        <strong><?php echo e($purchase->contact->supplier_business_name); ?></strong>
        <?php echo e($purchase->contact->name); ?>

        <?php if(!empty($purchase->contact->landmark)): ?>
          <br><?php echo e($purchase->contact->landmark); ?>

        <?php endif; ?>
        <?php if(!empty($purchase->contact->city) || !empty($purchase->contact->state) || !empty($purchase->contact->country)): ?>
          <br><?php echo e(implode(',', array_filter([$purchase->contact->city, $purchase->contact->state, $purchase->contact->country]))); ?>

        <?php endif; ?>
        <?php if(!empty($purchase->contact->tax_number)): ?>
          <br><?php echo e(app('translator')->getFromJson('contact.tax_no')); ?>: <?php echo e($purchase->contact->tax_number); ?>

        <?php endif; ?>
        <?php if(!empty($purchase->contact->mobile)): ?>
          <br><?php echo e(app('translator')->getFromJson('contact.mobile')); ?>: <?php echo e($purchase->contact->mobile); ?>

        <?php endif; ?>
        <?php if(!empty($purchase->contact->email)): ?>
          <br>Email: <?php echo e($purchase->contact->email); ?>

        <?php endif; ?>
      </address>
      <?php if($purchase->document_path): ?>
        
        <a href="<?php echo e($purchase->document_path); ?>" 
        download="<?php echo e($purchase->document_name); ?>" class="btn btn-sm btn-success pull-left no-print">
          <i class="fa fa-download"></i> 
            &nbsp;<?php echo e(__('purchase.download_document')); ?>

        </a>
      <?php endif; ?>
    </div>

    <div class="col-sm-4 invoice-col">
      <?php echo e(app('translator')->getFromJson('business.business')); ?>:
      <address>
        <strong><?php echo e($purchase->business->name); ?></strong>
        <?php echo e($purchase->location->name); ?>

        <?php if(!empty($purchase->location->landmark)): ?>
          <br><?php echo e($purchase->location->landmark); ?>

        <?php endif; ?>
        <?php if(!empty($purchase->location->city) || !empty($purchase->location->state) || !empty($purchase->location->country)): ?>
          <br><?php echo e(implode(',', array_filter([$purchase->location->city, $purchase->location->state, $purchase->location->country]))); ?>

        <?php endif; ?>
        
        <?php if(!empty($purchase->business->tax_number_1)): ?>
          <br><?php echo e($purchase->business->tax_label_1); ?>: <?php echo e($purchase->business->tax_number_1); ?>

        <?php endif; ?>

        <?php if(!empty($purchase->business->tax_number_2)): ?>
          <br><?php echo e($purchase->business->tax_label_2); ?>: <?php echo e($purchase->business->tax_number_2); ?>

        <?php endif; ?>

        <?php if(!empty($purchase->location->mobile)): ?>
          <br><?php echo e(app('translator')->getFromJson('contact.mobile')); ?>: <?php echo e($purchase->location->mobile); ?>

        <?php endif; ?>
        <?php if(!empty($purchase->location->email)): ?>
          <br><?php echo e(app('translator')->getFromJson('business.email')); ?>: <?php echo e($purchase->location->email); ?>

        <?php endif; ?>
      </address>
    </div>

    <div class="col-sm-4 invoice-col">
      <b><?php echo e(app('translator')->getFromJson('purchase.ref_no')); ?>:</b> #<?php echo e($purchase->ref_no); ?><br/>
      <b><?php echo e(app('translator')->getFromJson('messages.date')); ?>:</b> <?php echo e(\Carbon::createFromTimestamp(strtotime($purchase->transaction_date))->format(session('business.date_format'))); ?><br/>
      <b><?php echo e(app('translator')->getFromJson('purchase.purchase_status')); ?>:</b> <?php echo e(ucfirst( $purchase->status )); ?><br>
      <b><?php echo e(app('translator')->getFromJson('purchase.payment_status')); ?>:</b> <?php echo e(ucfirst( $purchase->payment_status )); ?><br>
    </div>
  </div>

  <br>
  <div class="row">
    <div class="col-sm-12 col-xs-12">
      <div class="table-responsive">
        <table class="table bg-gray">
          <thead>
            <tr class="bg-green">
              <th>#</th>
              <th><?php echo e(app('translator')->getFromJson('product.product_name')); ?></th>
              <th><?php echo e(app('translator')->getFromJson('purchase.purchase_quantity')); ?></th>
              <th><?php echo e(app('translator')->getFromJson( 'lang_v1.unit_cost_before_discount' )); ?></th>
              <th><?php echo e(app('translator')->getFromJson( 'lang_v1.discount_percent' )); ?></th>
              <th class="no-print"><?php echo e(app('translator')->getFromJson('purchase.unit_cost_before_tax')); ?></th>
              <th class="no-print"><?php echo e(app('translator')->getFromJson('purchase.subtotal_before_tax')); ?></th>
              <th><?php echo e(app('translator')->getFromJson('sale.tax')); ?></th>
              <th><?php echo e(app('translator')->getFromJson('purchase.unit_cost_after_tax')); ?></th>
              <th><?php echo e(app('translator')->getFromJson('purchase.unit_selling_price')); ?></th>
              <?php if(session('business.enable_lot_number')): ?>
                <th><?php echo e(app('translator')->getFromJson('lang_v1.lot_number')); ?></th>
              <?php endif; ?>
              <?php if(session('business.enable_product_expiry')): ?>
                <th><?php echo e(app('translator')->getFromJson('product.mfg_date')); ?></th>
                <th><?php echo e(app('translator')->getFromJson('product.exp_date')); ?></th>
              <?php endif; ?>
              <th><?php echo e(app('translator')->getFromJson('sale.subtotal')); ?></th>
            </tr>
          </thead>
          <?php 
            $total_before_tax = 0.00;
          ?>
          <?php $__currentLoopData = $purchase->purchase_lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase_line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($loop->iteration); ?></td>
              <td>
                <?php echo e($purchase_line->product->name); ?>

                 <?php if( $purchase_line->product->type == 'variable'): ?>
                  - <?php echo e($purchase_line->variations->product_variation->name); ?>

                  - <?php echo e($purchase_line->variations->name); ?>

                 <?php endif; ?>
              </td>
              <td><span class="display_currency" data-currency_symbol="false"><?php echo e($purchase_line->quantity); ?></span></td>
              <td><span class="display_currency" data-currency_symbol="true"><?php echo e($purchase_line->pp_without_discount); ?></span></td>
              <td><span class="display_currency"><?php echo e($purchase_line->discount_percent); ?></span> %</td>
              <td class="no-print"><span class="display_currency" data-currency_symbol="true"><?php echo e($purchase_line->purchase_price); ?></span></td>
              <td class="no-print"><span class="display_currency" data-currency_symbol="true"><?php echo e($purchase_line->quantity * $purchase_line->purchase_price); ?></span></td>
              <td><span class="display_currency" data-currency_symbol="true"><?php echo e($purchase_line->item_tax); ?> </span> <br/><small><?php if($purchase_line->tax_id): ?> ( <?php echo e($taxes[$purchase_line->tax_id]); ?> ) </small><?php endif; ?></td>
              <td><span class="display_currency" data-currency_symbol="true"><?php echo e($purchase_line->purchase_price_inc_tax); ?></span></td>
              <td><span class="display_currency" data-currency_symbol="true"><?php echo e($purchase_line->variations->default_sell_price); ?></span></td>

              <?php if(session('business.enable_lot_number')): ?>
                <td><?php echo e($purchase_line->lot_number); ?></td>
              <?php endif; ?>

              <?php if(session('business.enable_product_expiry')): ?>
              <td>
                <?php if( !empty($purchase_line->product->expiry_period_type) ): ?>
                  <?php if(!empty($purchase_line->mfg_date)): ?>
                    <?php echo e(\Carbon::createFromTimestamp(strtotime($purchase_line->mfg_date))->format(session('business.date_format'))); ?>

                  <?php endif; ?>
                <?php else: ?>
                  <?php echo e(app('translator')->getFromJson('product.not_applicable')); ?>
                <?php endif; ?>
              </td>
              <td>
                <?php if( !empty($purchase_line->product->expiry_period_type) ): ?>
                  <?php if(!empty($purchase_line->exp_date)): ?>
                    <?php echo e(\Carbon::createFromTimestamp(strtotime($purchase_line->exp_date))->format(session('business.date_format'))); ?>

                  <?php endif; ?>
                <?php else: ?>
                  <?php echo e(app('translator')->getFromJson('product.not_applicable')); ?>
                <?php endif; ?>
              </td>
              <?php endif; ?>
              <td><span class="display_currency" data-currency_symbol="true"><?php echo e($purchase_line->purchase_price_inc_tax * $purchase_line->quantity); ?></span></td>
            </tr>
            <?php 
              $total_before_tax += ($purchase_line->quantity * $purchase_line->purchase_price);
            ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
      </div>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-sm-12 col-xs-12">
      <h4><?php echo e(__('sale.payment_info')); ?>:</h4>
    </div>
    <div class="col-md-6 col-sm-12 col-xs-12">
      <div class="table-responsive">
        <table class="table">
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
          <?php $__empty_1 = true; $__currentLoopData = $purchase->payment_lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment_line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php
              $total_paid += $payment_line->amount;
            ?>
            <tr>
              <td><?php echo e($loop->iteration); ?></td>
              <td><?php echo e(\Carbon::createFromTimestamp(strtotime($payment_line->paid_on))->format(session('business.date_format'))); ?></td>
              <td><?php echo e($payment_line->payment_ref_no); ?></td>
              <td><span class="display_currency" data-currency_symbol="true"><?php echo e($payment_line->amount); ?></span></td>
              <td><?php echo e($payment_methods[$payment_line->method]); ?></td>
              <td><?php if($payment_line->note): ?> 
                <?php echo e(ucfirst($payment_line->note)); ?>

                <?php else: ?>
                --
                <?php endif; ?>
              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
              <td colspan="5" class="text-center">
                <?php echo e(app('translator')->getFromJson('purchase.no_payments')); ?>
              </td>
            </tr>
          <?php endif; ?>
        </table>
      </div>
    </div>
    <div class="col-md-6 col-sm-12 col-xs-12">
      <div class="table-responsive">
        <table class="table">
          <!-- <tr class="hide">
            <th><?php echo e(app('translator')->getFromJson('purchase.total_before_tax')); ?>: </th>
            <td></td>
            <td><span class="display_currency pull-right"><?php echo e($total_before_tax); ?></span></td>
          </tr> -->
          <tr>
            <th><?php echo e(app('translator')->getFromJson('purchase.net_total_amount')); ?>: </th>
            <td></td>
            <td><span class="display_currency pull-right" data-currency_symbol="true"><?php echo e($total_before_tax); ?></span></td>
          </tr>
          <tr>
            <th><?php echo e(app('translator')->getFromJson('purchase.discount')); ?>:</th>
            <td>
              <b>(-)</b>
              <?php if($purchase->discount_type == 'percentage'): ?>
                (<?php echo e($purchase->discount_amount); ?> %)
              <?php endif; ?>
            </td>
            <td>
              <span class="display_currency pull-right" data-currency_symbol="true">
                <?php if($purchase->discount_type == 'percentage'): ?>
                  <?php echo e($purchase->discount_amount * $total_before_tax / 100); ?>

                <?php else: ?>
                  <?php echo e($purchase->discount_amount); ?>

                <?php endif; ?>                  
              </span>
            </td>
          </tr>
          <tr>
            <th><?php echo e(app('translator')->getFromJson('purchase.purchase_tax')); ?>:</th>
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
          <?php if( !empty( $purchase->shipping_charges ) ): ?>
            <tr>
              <th><?php echo e(app('translator')->getFromJson('purchase.additional_shipping_charges')); ?>:</th>
              <td><b>(+)</b></td>
              <td><span class="display_currency pull-right" ><?php echo e($purchase->shipping_charges); ?></span></td>
            </tr>
          <?php endif; ?>
          <tr>
            <th><?php echo e(app('translator')->getFromJson('purchase.purchase_total')); ?>:</th>
            <td></td>
            <td><span class="display_currency pull-right" data-currency_symbol="true" ><?php echo e($purchase->final_total); ?></span></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6">
      <strong><?php echo e(app('translator')->getFromJson('purchase.shipping_details')); ?>:</strong><br>
      <p class="well well-sm no-shadow bg-gray">
        <?php if($purchase->shipping_details): ?>
          <?php echo e($purchase->shipping_details); ?>

        <?php else: ?>
          --
        <?php endif; ?>
      </p>
    </div>
    <div class="col-sm-6">
      <strong><?php echo e(app('translator')->getFromJson('purchase.additional_notes')); ?>:</strong><br>
      <p class="well well-sm no-shadow bg-gray">
        <?php if($purchase->additional_notes): ?>
          <?php echo e($purchase->additional_notes); ?>

        <?php else: ?>
          --
        <?php endif; ?>
      </p>
    </div>
  </div>

  
  <div class="row print_section">
    <div class="col-xs-12">
      <img class="center-block" src="data:image/png;base64,<?php echo e(DNS1D::getBarcodePNG($purchase->ref_no, 'C128', 2,30,array(39, 48, 54), true)); ?>">
    </div>
  </div>
</div>