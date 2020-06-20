<div class="row">
  <div class="col-xs-12">
    <h2 class="page-header">
      <?php echo e(app('translator')->getFromJson('lang_v1.stock_transfers')); ?> (<b><?php echo e(app('translator')->getFromJson('purchase.ref_no')); ?>:</b> #<?php echo e($sell_transfer->ref_no); ?>)
      <small class="pull-right"><b><?php echo e(app('translator')->getFromJson('messages.date')); ?>:</b> <?php echo e(\Carbon::createFromTimestamp(strtotime($sell_transfer->transaction_date))->format(session('business.date_format'))); ?></small>
    </h2>
  </div>
</div>
<div class="row invoice-info">
  <div class="col-sm-4 invoice-col">
    <?php echo e(app('translator')->getFromJson('lang_v1.location_from')); ?>:
    <address>
      <strong><?php echo e($location_details['sell']->name); ?></strong>
      
      <?php if(!empty($location_details['sell']->landmark)): ?>
        <br><?php echo e($location_details['sell']->landmark); ?>

      <?php endif; ?>

      <?php if(!empty($location_details['sell']->city) || !empty($location_details['sell']->state) || !empty($location_details['sell']->country)): ?>
        <br><?php echo e(implode(',', array_filter([$location_details['sell']->city, $location_details['sell']->state, $location_details['sell']->country]))); ?>

      <?php endif; ?>

      <?php if(!empty($sell_transfer->contact->tax_number)): ?>
        <br><?php echo e(app('translator')->getFromJson('contact.tax_no')); ?>: <?php echo e($sell_transfer->contact->tax_number); ?>

      <?php endif; ?>

      <?php if(!empty($location_details['sell']->mobile)): ?>
        <br><?php echo e(app('translator')->getFromJson('contact.mobile')); ?>: <?php echo e($location_details['sell']->mobile); ?>

      <?php endif; ?>
      <?php if(!empty($location_details['sell']->email)): ?>
        <br>Email: <?php echo e($location_details['sell']->email); ?>

      <?php endif; ?>
    </address>
  </div>

  <div class="col-md-4 invoice-col">
    <?php echo e(app('translator')->getFromJson('lang_v1.location_to')); ?>:
    <address>
      <strong><?php echo e($location_details['purchase']->name); ?></strong>
      
      <?php if(!empty($location_details['purchase']->landmark)): ?>
        <br><?php echo e($location_details['purchase']->landmark); ?>

      <?php endif; ?>

      <?php if(!empty($location_details['purchase']->city) || !empty($location_details['purchase']->state) || !empty($location_details['purchase']->country)): ?>
        <br><?php echo e(implode(',', array_filter([$location_details['purchase']->city, $location_details['purchase']->state, $location_details['purchase']->country]))); ?>

      <?php endif; ?>

      <?php if(!empty($sell_transfer->contact->tax_number)): ?>
        <br><?php echo e(app('translator')->getFromJson('contact.tax_no')); ?>: <?php echo e($sell_transfer->contact->tax_number); ?>

      <?php endif; ?>

      <?php if(!empty($location_details['purchase']->mobile)): ?>
        <br><?php echo e(app('translator')->getFromJson('contact.mobile')); ?>: <?php echo e($location_details['purchase']->mobile); ?>

      <?php endif; ?>
      <?php if(!empty($location_details['purchase']->email)): ?>
        <br>Email: <?php echo e($location_details['purchase']->email); ?>

      <?php endif; ?>
    </address>
  </div>

  <div class="col-sm-4 invoice-col">
    <b><?php echo e(app('translator')->getFromJson('purchase.ref_no')); ?>:</b> #<?php echo e($sell_transfer->ref_no); ?><br/>
    <b><?php echo e(app('translator')->getFromJson('messages.date')); ?>:</b> <?php echo e(\Carbon::createFromTimestamp(strtotime($sell_transfer->transaction_date))->format(session('business.date_format'))); ?><br/>
  </div>
</div>

<br>
<div class="row">
  <div class="col-xs-12">
    <div class="table-responsive">
      <table class="table bg-gray">
        <tr class="bg-green">
          <th>#</th>
          <th><?php echo e(app('translator')->getFromJson('sale.product')); ?></th>
          <th><?php echo e(app('translator')->getFromJson('sale.qty')); ?></th>
          <th><?php echo e(app('translator')->getFromJson('sale.unit_price')); ?></th>
          <th><?php echo e(app('translator')->getFromJson('sale.subtotal')); ?></th>
        </tr>
        <?php 
          $total = 0.00;
        ?>
        <?php $__currentLoopData = $sell_transfer->sell_lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sell_lines): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($loop->iteration); ?></td>
            <td>
              <?php echo e($sell_lines->product->name); ?>

               <?php if( $sell_lines->product->type == 'variable'): ?>
                - <?php echo e($sell_lines->variations->product_variation->name); ?>

                - <?php echo e($sell_lines->variations->name); ?>

               <?php endif; ?>
            </td>
            <td><?php echo e($sell_lines->quantity); ?></td>
            <td>
              <span class="display_currency" data-currency_symbol="true"><?php echo e($sell_lines->unit_price_inc_tax); ?></span>
            </td>
            <td>
              <span class="display_currency" data-currency_symbol="true"><?php echo e($sell_lines->unit_price_inc_tax * $sell_lines->quantity); ?></span>
            </td>
          </tr>
          <?php 
            $total += ($sell_lines->unit_price_inc_tax * $sell_lines->quantity);
          ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </table>
    </div>
  </div>
</div>
<br>
<div class="row">
  
  <div class="col-xs-6">
    <div class="table-responsive">
      <table class="table">
        <tr>
          <th><?php echo e(app('translator')->getFromJson('purchase.net_total_amount')); ?>: </th>
          <td></td>
          <td><span class="display_currency pull-right" data-currency_symbol="true"><?php echo e($total); ?></span></td>
        </tr>
        <?php if( !empty( $sell_transfer->shipping_charges ) ): ?>
          <tr>
            <th><?php echo e(app('translator')->getFromJson('purchase.additional_shipping_charges')); ?>:</th>
            <td><b>(+)</b></td>
            <td><span class="display_currency pull-right" data-currency_symbol="true"><?php echo e($sell_transfer->shipping_charges); ?></span></td>
          </tr>
        <?php endif; ?>
        <tr>
          <th><?php echo e(app('translator')->getFromJson('purchase.purchase_total')); ?>:</th>
          <td></td>
          <td><span class="display_currency pull-right" data-currency_symbol="true" ><?php echo e($sell_transfer->final_total); ?></span></td>
        </tr>
      </table>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-6">
    <strong><?php echo e(app('translator')->getFromJson('purchase.additional_notes')); ?>:</strong><br>
    <p class="well well-sm no-shadow bg-gray">
      <?php if($sell_transfer->additional_notes): ?>
        <?php echo e($sell_transfer->additional_notes); ?>

      <?php else: ?>
        --
      <?php endif; ?>
    </p>
  </div>
</div>


<div class="row print_section">
  <div class="col-xs-12">
    <img class="center-block" src="data:image/png;base64,<?php echo e(DNS1D::getBarcodePNG($sell_transfer->ref_no, 'C128', 2,30,array(39, 48, 54), true)); ?>">
  </div>
</div>