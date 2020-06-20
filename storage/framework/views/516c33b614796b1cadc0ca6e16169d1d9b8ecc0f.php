<div class="pos-tab-content">
    <div class="row">
    	<h4>Stripe:</h4>
    	<div class="col-xs-4">
            <div class="form-group">
            	<?php echo Form::label('STRIPE_PUB_KEY', __('superadmin::lang.stripe_pub_key') . ':'); ?>

            	<?php echo Form::text('STRIPE_PUB_KEY', $default_values['STRIPE_PUB_KEY'], ['class' => 'form-control','placeholder' => __('superadmin::lang.stripe_pub_key')]);; ?>

            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
            	<?php echo Form::label('STRIPE_SECRET_KEY', __('superadmin::lang.stripe_secret_key') . ':'); ?>

            	<?php echo Form::text('STRIPE_SECRET_KEY', $default_values['STRIPE_SECRET_KEY'], ['class' => 'form-control','placeholder' => __('superadmin::lang.stripe_secret_key')]);; ?>

            </div>
        </div>

        <div class="clearfix"></div>
        
        <h4>Paypal:</h4>
        <div class="col-xs-6">
            <div class="form-group">
            	<?php echo Form::label('PAYPAL_MODE', __('superadmin::lang.paypal_mode') . ':'); ?>

            	<?php echo Form::select('PAYPAL_MODE',['live' => 'Live', 'sandbox' => 'Sandbox'],  $default_values['PAYPAL_MODE'], ['class' => 'form-control','placeholder' => __('messages.please_select')]);; ?>

            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-xs-4">
            <div class="form-group">
            	<?php echo Form::label('PAYPAL_SANDBOX_API_USERNAME', __('superadmin::lang.paypal_sandbox_api_username') . ':'); ?>

            	<?php echo Form::text('PAYPAL_SANDBOX_API_USERNAME', $default_values['PAYPAL_SANDBOX_API_USERNAME'], ['class' => 'form-control','placeholder' => __('superadmin::lang.paypal_sandbox_api_username')]);; ?>

            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
            	<?php echo Form::label('PAYPAL_SANDBOX_API_PASSWORD', __('superadmin::lang.paypal_sandbox_api_password') . ':'); ?>

            	<?php echo Form::text('PAYPAL_SANDBOX_API_PASSWORD', $default_values['PAYPAL_SANDBOX_API_PASSWORD'], ['class' => 'form-control','placeholder' => __('superadmin::lang.paypal_sandbox_api_password')]);; ?>

            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
            	<?php echo Form::label('PAYPAL_SANDBOX_API_SECRET', __('superadmin::lang.paypal_sandbox_api_secret') . ':'); ?>

            	<?php echo Form::text('PAYPAL_SANDBOX_API_SECRET', $default_values['PAYPAL_SANDBOX_API_SECRET'], ['class' => 'form-control','placeholder' => __('superadmin::lang.paypal_sandbox_api_secret')]);; ?>

            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-xs-4">
            <div class="form-group">
            	<?php echo Form::label('PAYPAL_LIVE_API_USERNAME', __('superadmin::lang.paypal_live_api_username') . ':'); ?>

            	<?php echo Form::text('PAYPAL_LIVE_API_USERNAME', $default_values['PAYPAL_LIVE_API_USERNAME'], ['class' => 'form-control','placeholder' => __('superadmin::lang.paypal_live_api_username')]);; ?>

            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
            	<?php echo Form::label('PAYPAL_LIVE_API_PASSWORD', __('superadmin::lang.paypal_live_api_password') . ':'); ?>

            	<?php echo Form::text('PAYPAL_LIVE_API_PASSWORD', $default_values['PAYPAL_LIVE_API_PASSWORD'], ['class' => 'form-control','placeholder' => __('superadmin::lang.paypal_live_api_password')]);; ?>

            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
            	<?php echo Form::label('PAYPAL_LIVE_API_SECRET', __('superadmin::lang.paypal_live_api_secret') . ':'); ?>

            	<?php echo Form::text('PAYPAL_LIVE_API_SECRET', $default_values['PAYPAL_LIVE_API_SECRET'], ['class' => 'form-control','placeholder' => __('superadmin::lang.paypal_live_api_secret')]);; ?>

            </div>
        </div>

        <div class="clearfix"></div>
        <div class="col-xs-12">
            <br/>
            <p class="help-block"><i><?php echo e(app('translator')->getFromJson('superadmin::lang.payment_gateway_help')); ?></i></p>
        </div>
    </div>
</div>