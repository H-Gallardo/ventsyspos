<div class="pos-tab-content">
    <div class="row">
    	<div class="col-xs-4">
            <div class="form-group">
            	<?php echo Form::label('MAIL_DRIVER', __('superadmin::lang.mail_driver') . ':'); ?>

            	<?php echo Form::select('MAIL_DRIVER', $mail_drivers, $default_values['MAIL_DRIVER'], ['class' => 'form-control']);; ?>

            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
            	<?php echo Form::label('MAIL_HOST', __('superadmin::lang.mail_host') . ':'); ?>

            	<?php echo Form::text('MAIL_HOST', $default_values['MAIL_HOST'], ['class' => 'form-control','placeholder' => __('superadmin::lang.mail_host')]);; ?>

            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
            	<?php echo Form::label('MAIL_PORT', __('superadmin::lang.mail_port') . ':'); ?>

            	<?php echo Form::text('MAIL_PORT', $default_values['MAIL_PORT'], ['class' => 'form-control','placeholder' => __('superadmin::lang.mail_port')]);; ?>

            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-xs-4">
            <div class="form-group">
                <?php echo Form::label('MAIL_USERNAME', __('superadmin::lang.mail_username') . ':'); ?>

                <?php echo Form::text('MAIL_USERNAME', $default_values['MAIL_USERNAME'], ['class' => 'form-control','placeholder' => __('superadmin::lang.mail_username')]);; ?>

            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                <?php echo Form::label('MAIL_PASSWORD', __('superadmin::lang.mail_password') . ':'); ?>

                <?php echo Form::text('MAIL_PASSWORD', $default_values['MAIL_PASSWORD'], ['class' => 'form-control','placeholder' => __('superadmin::lang.mail_password')]);; ?>

            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                <?php echo Form::label('MAIL_ENCRYPTION', __('superadmin::lang.mail_encryption') . ':'); ?>

                <?php echo Form::text('MAIL_ENCRYPTION', $default_values['MAIL_ENCRYPTION'], ['class' => 'form-control','placeholder' => __('superadmin::lang.mail_encryption_place')]);; ?>

            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-xs-4">
            <div class="form-group">
                <?php echo Form::label('MAIL_FROM_ADDRESS', __('superadmin::lang.mail_from_address') . ':'); ?>

                <?php echo Form::email('MAIL_FROM_ADDRESS', $default_values['MAIL_FROM_ADDRESS'], ['class' => 'form-control','placeholder' => __('superadmin::lang.mail_from_address')]);; ?>

            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                <?php echo Form::label('MAIL_FROM_NAME', __('superadmin::lang.mail_from_name') . ':'); ?>

                <?php echo Form::text('MAIL_FROM_NAME', $default_values['MAIL_FROM_NAME'], ['class' => 'form-control','placeholder' => __('superadmin::lang.mail_from_name')]);; ?>

            </div>
        </div>
    </div>
</div>