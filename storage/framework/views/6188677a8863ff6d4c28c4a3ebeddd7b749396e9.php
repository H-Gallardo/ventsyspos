<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close no-print" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title no-print">
        <?php echo e(app('translator')->getFromJson( 'lang_v1.view_payment' )); ?>
        <?php if(!empty($single_payment_line->payment_ref_no)): ?>
          ( <?php echo e(app('translator')->getFromJson('purchase.ref_no')); ?>: <?php echo e($single_payment_line->payment_ref_no); ?> )
        <?php endif; ?>
      </h4>
      <h4 class="modal-title visible-print-block">
        <?php if(!empty($single_payment_line->payment_ref_no)): ?>
          ( <?php echo e(app('translator')->getFromJson('purchase.ref_no')); ?>: <?php echo e($single_payment_line->payment_ref_no); ?> )
        <?php endif; ?>
      </h4>
    </div>
    <div class="modal-body">
      <?php if(!empty($transaction)): ?>
      <div class="row">
        <?php if(in_array($transaction->type, ['purchase', 'purchase_return'])): ?>
            <div class="col-xs-6">
              <?php echo e(app('translator')->getFromJson('purchase.supplier')); ?>:
              <address>
                <strong><?php echo e($transaction->contact->supplier_business_name); ?></strong>
                <?php echo e($transaction->contact->name); ?>

                <?php if(!empty($transaction->contact->landmark)): ?>
                  <br><?php echo e($transaction->contact->landmark); ?>

                <?php endif; ?>
                <?php if(!empty($transaction->contact->city) || !empty($transaction->contact->state) || !empty($transaction->contact->country)): ?>
                  <br><?php echo e(implode(',', array_filter([$transaction->contact->city, $transaction->contact->state, $transaction->contact->country]))); ?>

                <?php endif; ?>
                <?php if(!empty($transaction->contact->tax_number)): ?>
                  <br><?php echo e(app('translator')->getFromJson('contact.tax_no')); ?>: <?php echo e($transaction->contact->tax_number); ?>

                <?php endif; ?>
                <?php if(!empty($transaction->contact->mobile)): ?>
                  <br><?php echo e(app('translator')->getFromJson('contact.mobile')); ?>: <?php echo e($transaction->contact->mobile); ?>

                <?php endif; ?>
                <?php if(!empty($transaction->contact->email)): ?>
                  <br>Email: <?php echo e($transaction->contact->email); ?>

                <?php endif; ?>
              </address>
            </div>
            <div class="col-xs-6">
              <?php echo e(app('translator')->getFromJson('business.business')); ?>:
              <address>
                <strong><?php echo e($transaction->business->name); ?></strong>
                <?php echo e($transaction->location->name); ?>

                <?php if(!empty($transaction->location->landmark)): ?>
                  <br><?php echo e($transaction->location->landmark); ?>

                <?php endif; ?>
                <?php if(!empty($transaction->location->city) || !empty($transaction->location->state) || !empty($transaction->location->country)): ?>
                  <br><?php echo e(implode(',', array_filter([$transaction->location->city, $transaction->location->state, $transaction->location->country]))); ?>

                <?php endif; ?>
                
                <?php if(!empty($transaction->business->tax_number_1)): ?>
                  <br><?php echo e($transaction->business->tax_label_1); ?>: <?php echo e($transaction->business->tax_number_1); ?>

                <?php endif; ?>

                <?php if(!empty($transaction->business->tax_number_2)): ?>
                  <br><?php echo e($transaction->business->tax_label_2); ?>: <?php echo e($transaction->business->tax_number_2); ?>

                <?php endif; ?>

                <?php if(!empty($transaction->location->mobile)): ?>
                  <br><?php echo e(app('translator')->getFromJson('contact.mobile')); ?>: <?php echo e($transaction->location->mobile); ?>

                <?php endif; ?>
                <?php if(!empty($transaction->location->email)): ?>
                  <br><?php echo e(app('translator')->getFromJson('business.email')); ?>: <?php echo e($transaction->location->email); ?>

                <?php endif; ?>
              </address>
            </div>
        <?php else: ?>
          <div class="col-xs-6">
             <?php echo e(app('translator')->getFromJson('contact.customer')); ?>:
            <address>
              <strong><?php echo e($transaction->contact->name); ?></strong>
             
              <?php if(!empty($transaction->contact->landmark)): ?>
                <br><?php echo e($transaction->contact->landmark); ?>

              <?php endif; ?>
              <?php if(!empty($transaction->contact->city) || !empty($transaction->contact->state) || !empty($transaction->contact->country)): ?>
                <br><?php echo e(implode(',', array_filter([$transaction->contact->city, $transaction->contact->state, $transaction->contact->country]))); ?>

              <?php endif; ?>
              <?php if(!empty($transaction->contact->tax_number)): ?>
                <br><?php echo e(app('translator')->getFromJson('contact.tax_no')); ?>: <?php echo e($transaction->contact->tax_number); ?>

              <?php endif; ?>
              <?php if(!empty($transaction->contact->mobile)): ?>
                <br><?php echo e(app('translator')->getFromJson('contact.mobile')); ?>: <?php echo e($transaction->contact->mobile); ?>

              <?php endif; ?>
              <?php if(!empty($transaction->contact->email)): ?>
                <br>Email: <?php echo e($transaction->contact->email); ?>

              <?php endif; ?>
            </address>
          </div>
          <div class="col-xs-6">
            <?php echo e(app('translator')->getFromJson('business.business')); ?>:
            <address>
              <strong><?php echo e($transaction->business->name); ?></strong>
              <?php echo e($transaction->location->name); ?>

              <?php if(!empty($transaction->location->landmark)): ?>
                <br><?php echo e($transaction->location->landmark); ?>

              <?php endif; ?>
              <?php if(!empty($transaction->location->city) || !empty($transaction->location->state) || !empty($transaction->location->country)): ?>
                <br><?php echo e(implode(',', array_filter([$transaction->location->city, $transaction->location->state, $transaction->location->country]))); ?>

              <?php endif; ?>
              
              <?php if(!empty($transaction->business->tax_number_1)): ?>
                <br><?php echo e($transaction->business->tax_label_1); ?>: <?php echo e($transaction->business->tax_number_1); ?>

              <?php endif; ?>

              <?php if(!empty($transaction->business->tax_number_2)): ?>
                <br><?php echo e($transaction->business->tax_label_2); ?>: <?php echo e($transaction->business->tax_number_2); ?>

              <?php endif; ?>

              <?php if(!empty($transaction->location->mobile)): ?>
                <br><?php echo e(app('translator')->getFromJson('contact.mobile')); ?>: <?php echo e($transaction->location->mobile); ?>

              <?php endif; ?>
              <?php if(!empty($transaction->location->email)): ?>
                <br><?php echo e(app('translator')->getFromJson('business.email')); ?>: <?php echo e($transaction->location->email); ?>

              <?php endif; ?>
            </address>
          </div>
        <?php endif; ?>
      </div>
      <?php endif; ?>
      <div class="row">
          <br>
          <div class="col-xs-6">
            <strong><?php echo e(app('translator')->getFromJson('purchase.amount')); ?> :</strong>
            <span class="display_currency" data-currency_symbol="true">
              <?php echo e($single_payment_line->amount); ?>

            </span><br>
            <strong><?php echo e(app('translator')->getFromJson('lang_v1.payment_method')); ?> :</strong>
            <?php echo e($payment_types[$single_payment_line->method]); ?><br>
            <?php if($single_payment_line->method == "card"): ?>
              <strong><?php echo e(app('translator')->getFromJson('lang_v1.card_holder_name')); ?> :</strong>
              <?php echo e($single_payment_line->card_holder_name); ?> <br>
              <strong><?php echo e(app('translator')->getFromJson('lang_v1.card_number')); ?> :</strong>
              <?php echo e($single_payment_line->card_number); ?> <br>
              <strong><?php echo e(app('translator')->getFromJson('lang_v1.card_transaction_number')); ?> :</strong>
              <?php echo e($single_payment_line->card_transaction_number); ?>

              
            <?php elseif($single_payment_line->method == "cheque"): ?>
              <strong><?php echo e(app('translator')->getFromJson('lang_v1.cheque_number')); ?> :</strong>
              <?php echo e($single_payment_line->cheque_number); ?>

            <?php elseif($single_payment_line->method == "bank_transfer"): ?>

            <?php elseif($single_payment_line->method == "custom_pay_1"): ?>

              <strong><?php echo e(app('translator')->getFromJson('lang_v1.transaction_number')); ?> :</strong>
              <?php echo e($single_payment_line->transaction_no); ?>

            <?php elseif($single_payment_line->method == "custom_pay_2"): ?>

              <strong><?php echo e(app('translator')->getFromJson('lang_v1.transaction_number')); ?> :</strong>
              <?php echo e($single_payment_line->transaction_no); ?>

            <?php elseif($single_payment_line->method == "custom_pay_3"): ?>

              <strong> <?php echo e(app('translator')->getFromJson('lang_v1.transaction_number')); ?>:</strong>
              <?php echo e($single_payment_line->transaction_no); ?>

            <?php endif; ?>
            <strong><?php echo e(app('translator')->getFromJson('purchase.payment_note')); ?> :</strong>
              <?php echo e($single_payment_line->note); ?>

          </div>
          <div class="col-xs-6">
            <b><?php echo e(app('translator')->getFromJson('purchase.ref_no')); ?>:</b> 
              <?php if(!empty($single_payment_line->payment_ref_no)): ?>
                <?php echo e($single_payment_line->payment_ref_no); ?>

              <?php else: ?>
                --
              <?php endif; ?>
              <br/>
            <b><?php echo e(app('translator')->getFromJson('lang_v1.paid_on')); ?>:</b> <?php echo e(\Carbon::createFromTimestamp(strtotime($single_payment_line->paid_on))->format(session('business.date_format'))); ?><br/>
          </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary no-print" 
        aria-label="Print" 
          onclick="$(this).closest('div.modal').printThis();">
        <i class="fa fa-print"></i> <?php echo e(app('translator')->getFromJson( 'messages.print' )); ?>
      </button>
      <button type="button" class="btn btn-default no-print" data-dismiss="modal"><?php echo e(app('translator')->getFromJson( 'messages.close' )); ?>
      </button>
    </div>
  </div>
</div>