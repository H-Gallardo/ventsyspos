<div class="modal-dialog" role="document">
  <div class="modal-content">

    <div class="modal-header">
      <button type="button" class="close no-print" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title no-print"><?php echo e(app('translator')->getFromJson( 'purchase.view_payments' )); ?> 
      (<?php if(in_array($transaction->type, ['purchase', 'expense', 'purchase_return'])): ?> 
        <?php echo e(app('translator')->getFromJson('purchase.ref_no')); ?>: <?php echo e($transaction->ref_no); ?>

      <?php elseif(in_array($transaction->type, ['sell', 'sell_return'])): ?>
        <?php echo e(app('translator')->getFromJson('sale.invoice_no')); ?>: <?php echo e($transaction->invoice_no); ?>

      <?php endif; ?>
      )
      </h4>
      <h4 class="modal-title visible-print-block">
      <?php if(in_array($transaction->type, ['purchase', 'expense', 'purchase_return'])): ?> 
        <?php echo e(app('translator')->getFromJson('purchase.ref_no')); ?>: <?php echo e($transaction->ref_no); ?>

      <?php elseif($transaction->type == 'sell'): ?>
        <?php echo e(app('translator')->getFromJson('sale.invoice_no')); ?>: <?php echo e($transaction->invoice_no); ?>

      <?php endif; ?>
      </h4>
    </div>

    <div class="modal-body">
      <?php if(in_array($transaction->type, ['purchase', 'purchase_return'])): ?>
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
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
          <div class="col-md-4 invoice-col">
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

          <div class="col-sm-4 invoice-col">
            <b><?php echo e(app('translator')->getFromJson('purchase.ref_no')); ?>:</b> #<?php echo e($transaction->ref_no); ?><br/>
            <b><?php echo e(app('translator')->getFromJson('messages.date')); ?>:</b> <?php echo e(\Carbon::createFromTimestamp(strtotime($transaction->transaction_date))->format(session('business.date_format'))); ?><br/>
            <b><?php echo e(app('translator')->getFromJson('purchase.purchase_status')); ?>:</b> <?php echo e(ucfirst( $transaction->status )); ?><br>
            <b><?php echo e(app('translator')->getFromJson('purchase.payment_status')); ?>:</b> <?php echo e(ucfirst( $transaction->payment_status )); ?><br>
          </div>
        </div>
      <?php elseif($transaction->type == 'expense'): ?>
        <div class="row invoice-info">
          <?php if(!empty($transaction->contact)): ?>
          <div class="col-sm-4 invoice-col">
            <?php $__env->startTranslation(); ?>('expense.expense_for':
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
          <?php endif; ?>
          <div class="col-md-4 invoice-col">
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

          <div class="col-sm-4 invoice-col">
            <b><?php echo e(app('translator')->getFromJson('purchase.ref_no')); ?>:</b> #<?php echo e($transaction->ref_no); ?><br/>
            <b><?php echo e(app('translator')->getFromJson('messages.date')); ?>:</b> <?php echo e(\Carbon::createFromTimestamp(strtotime($transaction->transaction_date))->format(session('business.date_format'))); ?><br/>
            <b><?php echo e(app('translator')->getFromJson('purchase.payment_status')); ?>:</b> <?php echo e(ucfirst( $transaction->payment_status )); ?><br>
          </div>
        </div>
      <?php else: ?>
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
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
          <div class="col-md-4 invoice-col">
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
          <div class="col-sm-4 invoice-col">
            <b><?php echo e(app('translator')->getFromJson('sale.invoice_no')); ?>:</b> #<?php echo e($transaction->invoice_no); ?><br/>
            <b><?php echo e(app('translator')->getFromJson('messages.date')); ?>:</b> <?php echo e(\Carbon::createFromTimestamp(strtotime($transaction->transaction_date))->format(session('business.date_format'))); ?><br/>
            <b><?php echo e(app('translator')->getFromJson('purchase.payment_status')); ?>:</b> <?php echo e(ucfirst( $transaction->payment_status )); ?><br>
          </div>
        </div>
      <?php endif; ?>
      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('send_notification')): ?>
        <?php if($transaction->type == 'purchase'): ?>
          <div class="row no-print">
            <div class="col-md-12 text-right">
              <button type="button" class="btn btn-info btn-modal btn-xs" 
              data-href="<?php echo e(action('NotificationController@getTemplate', ['transaction_id' => $transaction->id,'template_for' => 'payment_paid'])); ?>" data-container=".view_modal"><i class="fa fa-envelope"></i> <?php echo e(app('translator')->getFromJson('lang_v1.payment_paid_notification')); ?></button>
            </div>
          </div>
          <br>
        <?php endif; ?>
        <?php if($transaction->type == 'sell'): ?>
          <div class="row no-print">
            <div class="col-md-12 text-right">
              <button type="button" class="btn btn-info btn-modal btn-xs" 
              data-href="<?php echo e(action('NotificationController@getTemplate', ['transaction_id' => $transaction->id,'template_for' => 'payment_received'])); ?>" data-container=".view_modal"><i class="fa fa-envelope"></i> <?php echo e(app('translator')->getFromJson('lang_v1.payment_received_notification')); ?></button>
              
              <?php if($transaction->payment_status != 'paid'): ?>
              &nbsp;
                <button type="button" class="btn btn-warning btn-modal btn-xs" data-href="<?php echo e(action('NotificationController@getTemplate', ['transaction_id' => $transaction->id,'template_for' => 'payment_reminder'])); ?>" data-container=".view_modal"><i class="fa fa-envelope"></i> <?php echo e(app('translator')->getFromJson('lang_v1.send_payment_reminder')); ?></button>
              <?php endif; ?>
            </div>
          </div>
          <br>
        <?php endif; ?>
      <?php endif; ?>
      <?php if($transaction->payment_status != 'paid'): ?>
        <div class="row">
          <div class="col-md-12">
          <?php if((auth()->user()->can('purchase.payments') && (in_array($transaction->type, ['purchase', 'purchase_return']) )) || (auth()->user()->can('sell.payments') && (in_array($transaction->type, ['sell', 'sell_return']))) || (auth()->user()->can('expense.access') ) ): ?>
            <a href="<?php echo e(action('TransactionPaymentController@addPayment', [$transaction->id])); ?>" class="btn btn-primary btn-xs pull-right add_payment_modal no-print"><i class="fa fa-plus" aria-hidden="true"></i> <?php echo e(app('translator')->getFromJson("purchase.add_payment")); ?></a>
          <?php endif; ?>
          </div>
        </div>
      <?php endif; ?>
      <div class="row">
        <div class="col-md-12">
          <table class="table table-striped">
            <tr>
              <th><?php echo e(app('translator')->getFromJson('messages.date')); ?></th>
              <th><?php echo e(app('translator')->getFromJson('purchase.ref_no')); ?></th>
              <th><?php echo e(app('translator')->getFromJson('purchase.amount')); ?></th>
              <th><?php echo e(app('translator')->getFromJson('purchase.payment_method')); ?></th>
              <th><?php echo e(app('translator')->getFromJson('purchase.payment_note')); ?></th>
              <?php if($accounts_enabled): ?>
                <th><?php echo e(app('translator')->getFromJson('lang_v1.payment_account')); ?></th>
              <?php endif; ?>
              <th class="no-print"><?php echo e(app('translator')->getFromJson('messages.actions')); ?></th>
            </tr>
            <?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                  <td><?php echo e(\Carbon::createFromTimestamp(strtotime($payment->paid_on))->format(session('business.date_format'))); ?></td>
                  <td><?php echo e($payment->payment_ref_no); ?></td>
                  <td><span class="display_currency" data-currency_symbol="true"><?php echo e($payment->amount); ?></span></td>
                  <td><?php echo e($payment_types[$payment->method]); ?></td>
                  <td><?php echo e($payment->note); ?></td>
                  <?php if($accounts_enabled): ?>
                    <td><?php echo e(isset($payment->payment_account->name) ? $payment->payment_account->name : ''); ?></td>
                  <?php endif; ?>
                  <td class="no-print" style="display: inline;">
                  <?php if((auth()->user()->can('purchase.payments') && (in_array($transaction->type, ['purchase', 'purchase_return']) )) || (auth()->user()->can('sell.payments') && (in_array($transaction->type, ['sell', 'sell_return']))) || auth()->user()->can('expense.access') ): ?>
                    <button type="button" class="btn btn-info btn-xs edit_payment" 
                    data-href="<?php echo e(action('TransactionPaymentController@edit', [$payment->id])); ?>"><i class="glyphicon glyphicon-edit"></i></button>
                    &nbsp; <button type="button" class="btn btn-danger btn-xs delete_payment" 
                    data-href="<?php echo e(action('TransactionPaymentController@destroy', [$payment->id])); ?>"
                    ><i class="fa fa-trash" aria-hidden="true"></i></button>
                    &nbsp;
                    <button type="button" class="btn btn-primary btn-xs view_payment" data-href="<?php echo e(action('TransactionPaymentController@viewPayment', [$payment->id])); ?>">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </button>
                  <?php endif; ?>
                  <?php if(!empty($payment->document_path)): ?>
                    &nbsp;
                    <a href="<?php echo e($payment->document_path); ?>" class="btn btn-success btn-xs" download="<?php echo e($payment->document_name); ?>"><i class="fa fa-download" data-toggle="tooltip" title="<?php echo e(__('purchase.download_document')); ?>"></i></a>
                  <?php endif; ?>
                  </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr class="text-center">
                  <td colspan="6"><?php echo e(app('translator')->getFromJson('purchase.no_records_found')); ?></td>
                </tr>
            <?php endif; ?>
          </table>
        </div>

      </div>
    </div>

    <div class="modal-footer">
      <button type="button" class="btn btn-primary no-print" 
          aria-label="Print" 
            onclick="$(this).closest('div.modal').printThis();">
          <i class="fa fa-print"></i> <?php echo e(app('translator')->getFromJson( 'messages.print' )); ?>
      </button>
      <button type="button" class="btn btn-default no-print" data-dismiss="modal"><?php echo e(app('translator')->getFromJson( 'messages.close' )); ?></button>
    </div>

  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->