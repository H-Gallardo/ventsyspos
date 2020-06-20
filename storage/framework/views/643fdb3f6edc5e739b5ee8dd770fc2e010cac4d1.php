<div class="modal-dialog" role="document">
  <div class="modal-content">

    <?php echo Form::open(['url' => action('AccountReportsController@postLinkAccount'), 'method' => 'post', 'id' => 'link_account_form' ]); ?>


    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo e(app('translator')->getFromJson( 'account.link_account' )); ?> - <?php echo e(app('translator')->getFromJson( 'account.payment_ref_no' )); ?>: - <?php echo e($payment->payment_ref_no); ?></h4>
    </div>

    <div class="modal-body">
        <div class="form-group">
            <?php echo Form::hidden('transaction_payment_id', $payment->id);; ?>

            <?php echo Form::label('account_id', __( 'account.account' ) .":"); ?>

            <?php echo Form::select('account_id', $accounts, $payment->account_id, ['class' => 'form-control', 'required']);; ?>

        </div>
    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary"><?php echo e(app('translator')->getFromJson( 'messages.save' )); ?></button>
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(app('translator')->getFromJson( 'messages.close' )); ?></button>
    </div>

    <?php echo Form::close(); ?>


  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->