<div class="modal-dialog" role="document">
  <div class="modal-content">

    <?php echo Form::open(['url' => action('TransactionPaymentController@postPayContactDue'), 'method' => 'post', 'id' => 'pay_contact_due_form' ]); ?>


    <?php echo Form::hidden("contact_id", $contact_details->contact_id);; ?>

    <?php echo Form::hidden("due_payment_type", $due_payment_type);; ?>

    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo e(app('translator')->getFromJson( 'purchase.add_payment' )); ?></h4>
    </div>

    <div class="modal-body">
      <div class="row">
        <?php if($due_payment_type == 'purchase'): ?>
        <div class="col-md-6">
          <div class="well">
            <strong><?php echo e(app('translator')->getFromJson('purchase.supplier')); ?>: </strong><?php echo e($contact_details->name); ?><br>
            <strong><?php echo e(app('translator')->getFromJson('business.business')); ?>: </strong><?php echo e($contact_details->supplier_business_name); ?><br><br>
          </div>
        </div>
        <div class="col-md-6">
          <div class="well">
            <strong><?php echo e(app('translator')->getFromJson('report.total_purchase')); ?>: </strong><span class="display_currency" data-currency_symbol="true"><?php echo e($contact_details->total_purchase); ?></span><br>
            <strong><?php echo e(app('translator')->getFromJson('contact.total_paid')); ?>: </strong><span class="display_currency" data-currency_symbol="true"><?php echo e($contact_details->total_paid); ?></span><br>
            <strong><?php echo e(app('translator')->getFromJson('contact.total_purchase_due')); ?>: </strong><span class="display_currency" data-currency_symbol="true"><?php echo e($contact_details->total_purchase - $contact_details->total_paid); ?></span><br>
             <?php if(!empty($contact_details->opening_balance) || $contact_details->opening_balance != '0.00'): ?>
                  <strong><?php echo e(app('translator')->getFromJson('lang_v1.opening_balance')); ?>: </strong>
                  <span class="display_currency" data-currency_symbol="true">
                  <?php echo e($contact_details->opening_balance); ?></span><br>
                  <strong><?php echo e(app('translator')->getFromJson('lang_v1.opening_balance_due')); ?>: </strong>
                  <span class="display_currency" data-currency_symbol="true">
                  <?php echo e($ob_due); ?></span>
              <?php endif; ?>
          </div>
        </div>
        <?php elseif($due_payment_type == 'purchase_return'): ?>
        <div class="col-md-6">
          <div class="well">
            <strong><?php echo e(app('translator')->getFromJson('purchase.supplier')); ?>: </strong><?php echo e($contact_details->name); ?><br>
            <strong><?php echo e(app('translator')->getFromJson('business.business')); ?>: </strong><?php echo e($contact_details->supplier_business_name); ?><br><br>
          </div>
        </div>
        <div class="col-md-6">
          <div class="well">
            <strong><?php echo e(app('translator')->getFromJson('lang_v1.total_purchase_return')); ?>: </strong><span class="display_currency" data-currency_symbol="true"><?php echo e($contact_details->total_purchase_return); ?></span><br>
            <strong><?php echo e(app('translator')->getFromJson('lang_v1.total_purchase_return_paid')); ?>: </strong><span class="display_currency" data-currency_symbol="true"><?php echo e($contact_details->total_return_paid); ?></span><br>
            <strong><?php echo e(app('translator')->getFromJson('lang_v1.total_purchase_return_due')); ?>: </strong><span class="display_currency" data-currency_symbol="true"><?php echo e($contact_details->total_purchase_return - $contact_details->total_return_paid); ?></span>
          </div>
        </div>
        <?php elseif(in_array($due_payment_type, ['sell'])): ?>
          <div class="col-md-6">
            <div class="well">
              <strong><?php echo e(app('translator')->getFromJson('sale.customer_name')); ?>: </strong><?php echo e($contact_details->name); ?><br>
              <br><br>
            </div>
          </div>
          <div class="col-md-6">
            <div class="well">
              <strong><?php echo e(app('translator')->getFromJson('report.total_sell')); ?>: </strong><span class="display_currency" data-currency_symbol="true"><?php echo e($contact_details->total_invoice); ?></span><br>
              <strong><?php echo e(app('translator')->getFromJson('contact.total_paid')); ?>: </strong><span class="display_currency" data-currency_symbol="true"><?php echo e($contact_details->total_paid); ?></span><br>
              <strong><?php echo e(app('translator')->getFromJson('contact.total_sale_due')); ?>: </strong><span class="display_currency" data-currency_symbol="true"><?php echo e($contact_details->total_invoice - $contact_details->total_paid); ?></span><br>
              <?php if(!empty($contact_details->opening_balance) || $contact_details->opening_balance != '0.00'): ?>
                  <strong><?php echo e(app('translator')->getFromJson('lang_v1.opening_balance')); ?>: </strong>
                  <span class="display_currency" data-currency_symbol="true">
                  <?php echo e($contact_details->opening_balance); ?></span><br>
                  <strong><?php echo e(app('translator')->getFromJson('lang_v1.opening_balance_due')); ?>: </strong>
                  <span class="display_currency" data-currency_symbol="true">
                  <?php echo e($ob_due); ?></span>
              <?php endif; ?>
            </div>
          </div>
         <?php elseif(in_array($due_payment_type, ['sell_return'])): ?>
         <div class="col-md-6">
          <div class="well">
            <strong><?php echo e(app('translator')->getFromJson('sale.customer_name')); ?>: </strong><?php echo e($contact_details->name); ?><br>
              <br><br>
          </div>
        </div>
        <div class="col-md-6">
          <div class="well">
            <strong><?php echo e(app('translator')->getFromJson('lang_v1.total_sell_return')); ?>: </strong><span class="display_currency" data-currency_symbol="true"><?php echo e($contact_details->total_sell_return); ?></span><br>
            <strong><?php echo e(app('translator')->getFromJson('lang_v1.total_sell_return_paid')); ?>: </strong><span class="display_currency" data-currency_symbol="true"><?php echo e($contact_details->total_return_paid); ?></span><br>
            <strong><?php echo e(app('translator')->getFromJson('lang_v1.total_sell_return_due')); ?>: </strong><span class="display_currency" data-currency_symbol="true"><?php echo e($contact_details->total_sell_return - $contact_details->total_return_paid); ?></span>
          </div>
        </div>
        <?php endif; ?>
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
        <div class="clearfix"></div>
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