<!-- Modal -->
<div class="modal-dialog" role="document">
    <div class="modal-content edit-subscription-modal">
     <?php echo Form::open(['url' => action('\Modules\Superadmin\Http\Controllers\SuperadminSubscriptionsController@updateSubscription'), 'method' => 'POST', 'id' => 'edit_subscription_form']); ?>

      <?php echo Form::hidden('subscription_id', $subscription->id);; ?>

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo e(app('translator')->getFromJson( "superadmin::lang.edit_subscription")); ?></h4>
      </div>
      <div class="modal-body">
             <div class="form-group">
                <?php echo Form::label('start_date', __( "superadmin::lang.start_date")); ?>


                <?php echo Form::text('start_date', !empty($subscription->start_date) ? \Carbon::createFromTimestamp(strtotime($subscription->start_date))->format(session('business.date_format')) : null, ['class' => 'form-control datepicker', 'readonly']);; ?>

              </div>

              <div class="form-group">
                <?php echo Form::label('end_date', __("superadmin::lang.end_date")); ?>


                <?php echo Form::text('end_date', !empty($subscription->end_date) ? \Carbon::createFromTimestamp(strtotime($subscription->end_date))->format(session('business.date_format')) : null, ['class' => 'form-control datepicker', 'readonly']);; ?>

              </div>

              <div class="form-group">
                <?php echo Form::label('trial_end_date', __("superadmin::lang.trial_end_date")); ?>


                <?php echo Form::text('trial_end_date', !empty($subscription->trial_end_date) ? \Carbon::createFromTimestamp(strtotime($subscription->trial_end_date))->format(session('business.date_format')) : null, ['class' => 'form-control datepicker', 'readonly']);; ?>

              </div>
      </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"><?php echo e(app('translator')->getFromJson( "superadmin::lang.update")); ?></button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(app('translator')->getFromJson( "superadmin::lang.close")); ?></button>
      </div>
      <?php echo Form::close(); ?>

    </div>
</div>
