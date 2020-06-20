<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalCenterTitle">
            <?php echo e(app('translator')->getFromJson('essentials::lang.reminder_details')); ?>
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
                <strong> <?php echo e(app('translator')->getFromJson('essentials::lang.event_name')); ?> : </strong> <?php echo e($reminder->name); ?>

            </div>
            <div class="col-md-4">
                <strong> <?php echo e(app('translator')->getFromJson('essentials::lang.date')); ?> : </strong> <?php echo e(\Carbon::createFromTimestamp(strtotime($reminder->date))->format(session('business.date_format'))); ?>

            </div>
            <div class="col-md-4">
                <strong> <?php echo e(app('translator')->getFromJson('essentials::lang.time')); ?> : </strong> <?php echo e($time); ?>

            </div>
          </div>
          <br>
          <hr>
          <div class="row">
              <div class="col-md-9">
                  <?php echo Form::open(['url' => action('\Modules\Essentials\Http\Controllers\ReminderController@update', [$reminder->id]), 'method' => 'PUT', 'id' => 'update_reminder_repeat' ]); ?>

                    <div class="input-group">
                      <!-- /btn-group -->
                      <?php echo Form::select('repeat', $repeat, $reminder->repeat, ['class' => 'form-control', 'required']); ?>

                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-primary change_reminder_repeat"><?php echo e(app('translator')->getFromJson('messages.update')); ?></button>
                      </div>
                   </div>
                  <?php echo Form::close(); ?>

              </div>
              <div class="col-md-3">
                <button type="button" class="btn btn-danger" id="delete_reminder" data-href="<?php echo e(action('\Modules\Essentials\Http\Controllers\ReminderController@destroy', [$reminder->id])); ?>">
                  <?php echo e(app('translator')->getFromJson('essentials::lang.delete_reminder')); ?>
                </button>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          <?php echo e(app('translator')->getFromJson( 'messages.close' )); ?>
        </button>
      </div>
    </div>
</div>