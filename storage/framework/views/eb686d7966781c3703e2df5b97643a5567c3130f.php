<div class="pos-tab-content">
    <div class="row">
        <div class="col-xs-4">
            <div class="form-group">
                <?php echo Form::label('email_settings[mail_driver]', __('lang_v1.mail_driver') . ':'); ?>

                <?php echo Form::select('email_settings[mail_driver]', $mail_drivers, !empty($email_settings['mail_driver']) ? $email_settings['mail_driver'] : 'smtp', ['class' => 'form-control']);; ?>

            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
            	<?php echo Form::label('email_settings[mail_host]', __('lang_v1.mail_host') . ':'); ?>

            	<?php echo Form::text('email_settings[mail_host]', $email_settings['mail_host'], ['class' => 'form-control','placeholder' => __('lang_v1.mail_host')]);; ?>

            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
            	<?php echo Form::label('email_settings[mail_port]', __('lang_v1.mail_port') . ':'); ?>

            	<?php echo Form::text('email_settings[mail_port]', $email_settings['mail_port'], ['class' => 'form-control','placeholder' => __('lang_v1.mail_port')]);; ?>

            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                <?php echo Form::label('email_settings[mail_username]', __('lang_v1.mail_username') . ':'); ?>

                <?php echo Form::text('email_settings[mail_username]', $email_settings['mail_username'], ['class' => 'form-control','placeholder' => __('lang_v1.mail_username')]);; ?>

            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                <?php echo Form::label('email_settings[mail_password]', __('lang_v1.mail_password') . ':'); ?>

                <input type="password" name="email_settings[mail_password]" value="<?php echo e($email_settings['mail_password']); ?>" class="form-control" placeholder="<?php echo e(__('lang_v1.mail_password')); ?>">
            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                <?php echo Form::label('email_settings[mail_encryption]', __('lang_v1.mail_encryption') . ':'); ?>

                <?php echo Form::text('email_settings[mail_encryption]', $email_settings['mail_encryption'], ['class' => 'form-control','placeholder' => __('lang_v1.mail_encryption_place')]);; ?>

            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                <?php echo Form::label('email_settings[mail_from_address]', __('lang_v1.mail_from_address') . ':'); ?>

                <?php echo Form::email('email_settings[mail_from_address]', $email_settings['mail_from_address'], ['class' => 'form-control','placeholder' => __('lang_v1.mail_from_address') ]);; ?>

            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                <?php echo Form::label('email_settings[mail_from_name]', __('lang_v1.mail_from_name') . ':'); ?>

                <?php echo Form::text('email_settings[mail_from_name]', $email_settings['mail_from_name'], ['class' => 'form-control','placeholder' => __('lang_v1.mail_from_name')]);; ?>

            </div>
        </div>
    </div>
</div>