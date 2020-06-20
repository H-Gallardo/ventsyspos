<div class="modal-dialog" role="document">
  <div class="modal-content">

    <?php echo Form::open(['url' => action('TransactionPaymentController@store'), 'method' => 'post', 'id' => 'transaction_payment_add_form', 'files' => true ]); ?>

    <?php echo Form::hidden('transaction_id', $transaction->id);; ?>


    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo e(app('translator')->getFromJson( 'purchase.add_payment' )); ?></h4>
    </div>

    <div class="modal-body">
      <div class="row">
      <?php if(!empty($transaction->contact)): ?>
        <div class="col-md-4">
          <div class="well">
            <strong>
            <?php if(in_array($transaction->type, ['purchase', 'purchase_return'])): ?>
              <?php echo e(app('translator')->getFromJson('purchase.supplier')); ?> 
            <?php elseif(in_array($transaction->type, ['sell', 'sell_return'])): ?>
              <?php echo e(app('translator')->getFromJson('contact.customer')); ?> 
            <?php endif; ?>
            </strong>:<?php echo e($transaction->contact->name); ?><br>
            <?php if($transaction->type == 'purchase'): ?>
            <strong><?php echo e(app('translator')->getFromJson('business.business')); ?>: </strong><?php echo e($transaction->contact->supplier_business_name); ?>

            <?php endif; ?>
          </div>
        </div>
        <?php endif; ?>
        <div class="col-md-4">
          <div class="well">
          <?php if(in_array($transaction->type, ['sell', 'sell_return'])): ?>
            <strong><?php echo e(app('translator')->getFromJson('sale.invoice_no')); ?>: </strong><?php echo e($transaction->invoice_no); ?>

          <?php else: ?>
            <strong><?php echo e(app('translator')->getFromJson('purchase.ref_no')); ?>: </strong><?php echo e($transaction->ref_no); ?>

          <?php endif; ?>
            <br>
            <strong><?php echo e(app('translator')->getFromJson('purchase.location')); ?>: </strong><?php echo e($transaction->location->name); ?>

          </div>
        </div>
        <div class="col-md-4">
          <div class="well">
            <strong><?php echo e(app('translator')->getFromJson('sale.total_amount')); ?>: </strong><span class="display_currency" data-currency_symbol="true"><?php echo e($transaction->final_total); ?></span><br>
            <strong><?php echo e(app('translator')->getFromJson('purchase.payment_note')); ?>: </strong>
            <?php if(!empty($transaction->additional_notes)): ?>
            <?php echo e($transaction->additional_notes); ?>

            <?php else: ?>
              --
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="row payment_row">
        <div class="col-md-4">
          <div class="form-group">
            <?php echo Form::label("amount" ,'Amount:*'); ?>

            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-money"></i>
              </span>
              <?php echo Form::text("amount", number_format($payment_line->amount, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), ['class' => 'form-control input_number', 'required', 'placeholder' => 'Amount', 'data-rule-max-value' => $payment_line->amount, 'data-msg-max-value' => __('lang_v1.max_amount_to_be_paid_is', ['amount' => $amount_formated])]);; ?>

            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <?php echo Form::label("paid_on" ,'Paid on:*'); ?>

            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </span>
              <?php echo Form::text('paid_on', date('m/d/Y', strtotime($payment_line->paid_on) ), ['class' => 'form-control', 'readonly', 'required']);; ?>

            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <?php echo Form::label("method" ,'Pay Via:*'); ?>

            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-money"></i>
              </span>
              <?php echo Form::select("method", $payment_types, $payment_line->method, ['class' => 'form-control select2 payment_types_dropdown', 'required', 'style' => 'width:100%;']);; ?>

            </div>
          </div>
        </div>
        <?php if(!empty($accounts)): ?>
          <div class="col-md-6">
            <div class="form-group">
              <?php echo Form::label("account_id" , __('lang_v1.payment_account') . ':'); ?>

              <div class="input-group">
                <span class="input-group-addon">
                  <i class="fa fa-money"></i>
                </span>
                <?php echo Form::select("account_id", $accounts, !empty($payment_line->account_id) ? $payment_line->account_id : '' , ['class' => 'form-control select2', 'id' => "account_id", 'style' => 'width:100%;']);; ?>

              </div>
            </div>
          </div>
        <?php endif; ?>
        <div class="col-md-4">
          <div class="form-group">
            <?php echo Form::label('document', __('purchase.attach_document') . ':'); ?>

            <?php echo Form::file('document');; ?>

          </div>
        </div>
        <div class="clearfix"></div>
          <?php echo $__env->make('transaction_payment.payment_type_details', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="col-md-12">
          <div class="form-group">
            <?php echo Form::label("note",'Payment Note:'); ?>

            <?php echo Form::textarea("note", $payment_line->note, ['class' => 'form-control', 'rows' => 3]);; ?>

          </div>
        </div>
      </div>
    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary"><?php echo e(app('translator')->getFromJson( 'messages.save' )); ?></button>
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(app('translator')->getFromJson( 'messages.close' )); ?></button>
    </div>

    <?php echo Form::close(); ?>


  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->