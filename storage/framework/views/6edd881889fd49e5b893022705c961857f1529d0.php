<div class="modal fade reminder" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
  <?php echo Form::open(['url' => action('\Modules\Essentials\Http\Controllers\ReminderController@store'), 'id' => 'reminder_form']); ?>

      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalCenterTitle">
            <?php echo e(app('translator')->getFromJson('essentials::lang.add_reminder')); ?>
          </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php
            $repeat = [
                      'one_time' => __('essentials::lang.one_time'),
                      'every_day' => __('essentials::lang.every_day'),
                      'every_week' => __('essentials::lang.every_week'),
                      'every_month' => __('essentials::lang.every_month'),
                        ];
            ?>
          <div class="row">
            <div class="col-md-6">
              <?php echo Form::label('name', __('essentials::lang.event_name') . ":*"); ?>


                      <?php echo Form::text('name', null, ['class' => 'form-control', 'required']); ?>

            </div>
            <div class="col-md-6">
              <div class="form-group">
                <?php echo Form::label('date', __('essentials::lang.date') . ':*'); ?>

                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </span>
                  <?php echo Form::text('date', \Carbon::createFromTimestamp(strtotime('today'))->format(session('business.date_format')), ['class' => 'form-control datepicker', 'required', 'readonly']);; ?>

                </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-6">
              <?php echo Form::label('repeat', __('essentials::lang.repeat') . ':*'); ?>

              <?php echo Form::select('repeat', $repeat, null, ['class' => 'form-control','required']); ?>

            </div>
            <div class="col-md-6">
              <div class="form-group">
                <?php echo Form::label('time', __('essentials::lang.time') . ':*'); ?>

                      <div class='input-group'>
                        <span class="input-group-addon">
                              <span class="glyphicon glyphicon-time"></span>
                          </span>
                <?php echo Form::text('time', \Carbon::createFromTimestamp(strtotime('now'))->format('H:i'), ['class' => 'form-control', 'required', 'id' => 'time', 'readonly']);; ?>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <?php echo e(app('translator')->getFromJson('essentials::lang.cancel')); ?>
          </button>
          <button type="submit" class="btn btn-primary save_reminder">
            <?php echo e(app('translator')->getFromJson('essentials::lang.submit')); ?>
          </button>
        </div>
      </div>
      <?php echo Form::close(); ?>

  </div>
</div>