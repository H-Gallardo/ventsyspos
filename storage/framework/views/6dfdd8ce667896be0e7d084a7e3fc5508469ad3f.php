<div class="pos-tab-content">
    <div class="row">
    	<div class="col-xs-4">
            <div class="form-group">
            	<?php echo Form::label('woocommerce_app_url',  __('woocommerce::lang.woocommerce_app_url') . ':'); ?>

            	<?php echo Form::text('woocommerce_app_url', $default_settings['woocommerce_app_url'], ['class' => 'form-control','placeholder' => __('woocommerce::lang.woocommerce_app_url')]);; ?>

            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                <?php echo Form::label('woocommerce_consumer_key',  __('woocommerce::lang.woocommerce_consumer_key') . ':'); ?>

                <?php echo Form::text('woocommerce_consumer_key', $default_settings['woocommerce_consumer_key'], ['class' => 'form-control','placeholder' => __('woocommerce::lang.woocommerce_consumer_key')]);; ?>

            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
            	<?php echo Form::label('woocommerce_consumer_secret', __('woocommerce::lang.woocommerce_consumer_secret') . ':'); ?>

                <input type="password" name="woocommerce_consumer_secret" value="<?php echo e($default_settings['woocommerce_consumer_secret']); ?>" id="woocommerce_consumer_secret" class="form-control">
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-xs-4">
            <div class="form-group">
                <?php echo Form::label('location_id',  __('business.business_locations') . ':'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('woocommerce::lang.location_dropdown_help') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                <?php echo Form::select('location_id', $locations, $default_settings['location_id'], ['class' => 'form-control']);; ?>

            </div>
        </div>
        <div class="col-xs-4">
            <div class="checkbox">
                <label>
                    <br/>
                    <?php echo Form::checkbox('enable_auto_sync', 1, !empty($default_settings['enable_auto_sync']), ['class' => 'input-icheck'] );; ?> <?php echo e(app('translator')->getFromJson('woocommerce::lang.enable_auto_sync')); ?>
                </label>
                <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('woocommerce::lang.auto_sync_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
            </div>
        </div>
    </div>
</div>