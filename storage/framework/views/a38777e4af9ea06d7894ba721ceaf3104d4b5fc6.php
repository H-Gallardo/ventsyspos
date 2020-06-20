<div class="pos-tab-content">
    <div class="row">
    	<div class="col-xs-4">
            <div class="form-group">
            	<?php echo Form::label('APP_NAME', __('superadmin::lang.app_name') . ':'); ?>

            	<?php echo Form::text('APP_NAME', $default_values['APP_NAME'], ['class' => 'form-control','placeholder' => __('superadmin::lang.app_name')]);; ?>

            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
            	<?php echo Form::label('APP_TITLE', __('superadmin::lang.app_title') . ':'); ?>

            	<?php echo Form::text('APP_TITLE', $default_values['APP_TITLE'], ['class' => 'form-control','placeholder' => __('superadmin::lang.app_title')]);; ?>

            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
            	<?php echo Form::label('APP_LOCALE', __('superadmin::lang.app_default_language') . ':'); ?>

            	<?php echo Form::select('APP_LOCALE', $languages, $default_values['APP_LOCALE'], ['class' => 'form-control']);; ?>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <div class="form-group">
                <div class="checkbox">
                    <label>
                    <?php echo Form::checkbox('superadmin_enable_register_tc', 1,!empty($settings["superadmin_enable_register_tc"]), 
                    [ 'class' => 'input-icheck']);; ?>

                    <?php echo e(app('translator')->getFromJson('superadmin::lang.enable_register_tc')); ?>
                    </label>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-xs-6">
            <div class="form-group">
                <?php echo Form::label('superadmin_register_tc', __('superadmin::lang.register_tc') .":"); ?>


                <?php echo Form::textarea('superadmin_register_tc', !empty($settings['superadmin_register_tc']) ? $settings['superadmin_register_tc'] : '', ['class' => 'form-control', 'rows' => 5, 'cols' => 200]); ?>

            </div>
        </div>
    </div>
</div>