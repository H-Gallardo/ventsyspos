<?php if(empty($is_admin)): ?>
    <h3><?php echo e(app('translator')->getFromJson('business.business')); ?></h3>
<?php endif; ?>
<?php echo Form::hidden('language', request()->lang);; ?>


<fieldset>
<legend><?php echo e(app('translator')->getFromJson('business.business_details')); ?>:</legend>
<div class="col-md-12">
    <div class="form-group">
        <?php echo Form::label('name', __('business.business_name') . ':' ); ?>

        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-suitcase"></i>
            </span>
            <?php echo Form::text('name', null, ['class' => 'form-control','placeholder' => __('business.business_name'), 'required']);; ?>

        </div>
    </div>
</div>
        
<div class="col-md-6">
    <div class="form-group">
    <?php echo Form::label('start_date', __('business.start_date') . ':'); ?>

    <div class="input-group">
        <span class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </span>
        <?php echo Form::text('start_date', null, ['class' => 'form-control start-date-picker','placeholder' => __('business.start_date'), 'readonly']);; ?>

    </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
    <?php echo Form::label('currency_id', __('business.currency') . ':'); ?>

    <div class="input-group">
        <span class="input-group-addon">
            <i class="fa fa-money"></i>
        </span>
        <?php echo Form::select('currency_id', $currencies, '', ['class' => 'form-control select2_register','placeholder' => __('business.currency_placeholder'), 'required']);; ?>

    </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="col-md-6">
    <div class="form-group">
        <?php echo Form::label('business_logo', __('business.upload_logo') . ':'); ?>

        <?php echo Form::file('business_logo', ['accept' => 'image/*']);; ?>

    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <?php echo Form::label('website', __('lang_v1.website') . ':'); ?>

        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-globe"></i>
            </span>
            <?php echo Form::text('website', null, ['class' => 'form-control','placeholder' => __('lang_v1.website')]);; ?>

        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="col-md-6">
    <div class="form-group">
    <?php echo Form::label('mobile', __('lang_v1.business_telephone') . ':'); ?>

    <div class="input-group">
        <span class="input-group-addon">
            <i class="fa fa-phone"></i>
        </span>
        <?php echo Form::text('mobile', null, ['class' => 'form-control','placeholder' => __('lang_v1.business_telephone')]);; ?>

    </div>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <?php echo Form::label('alternate_number', __('business.alternate_number') . ':'); ?>

        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-phone"></i>
            </span>
            <?php echo Form::text('alternate_number', null, ['class' => 'form-control','placeholder' => __('business.alternate_number')]);; ?>

        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="col-md-6">
    <div class="form-group">
    <?php echo Form::label('country', __('business.country') . ':'); ?>

    <div class="input-group">
        <span class="input-group-addon">
            <i class="fa fa-globe"></i>
        </span>
        <?php echo Form::text('country', null, ['class' => 'form-control','placeholder' => __('business.country'), 'required']);; ?>

    </div>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
    <?php echo Form::label('state',__('business.state') . ':'); ?>

    <div class="input-group">
        <span class="input-group-addon">
            <i class="fa fa-map-marker"></i>
        </span>
        <?php echo Form::text('state', null, ['class' => 'form-control','placeholder' => __('business.state'), 'required']);; ?>

    </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="col-md-6">
    <div class="form-group">
    <?php echo Form::label('city',__('business.city'). ':'); ?>

    <div class="input-group">
        <span class="input-group-addon">
            <i class="fa fa-map-marker"></i>
        </span>
        <?php echo Form::text('city', null, ['class' => 'form-control','placeholder' => __('business.city'), 'required']);; ?>

    </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
    <?php echo Form::label('zip_code', __('business.zip_code') . ':'); ?>

    <div class="input-group">
        <span class="input-group-addon">
            <i class="fa fa-map-marker"></i>
        </span>
        <?php echo Form::text('zip_code', null, ['class' => 'form-control','placeholder' => __('business.zip_code_placeholder'), 'required']);; ?>

    </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="col-md-6">
    <div class="form-group">
    <?php echo Form::label('landmark', __('business.landmark') . ':'); ?>

    <div class="input-group">
        <span class="input-group-addon">
            <i class="fa fa-map-marker"></i>
        </span>
        <?php echo Form::text('landmark', null, ['class' => 'form-control','placeholder' => __('business.landmark'), 'required']);; ?>

    </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <?php echo Form::label('time_zone', __('business.time_zone') . ':'); ?>

        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-clock-o"></i>
            </span>
            <?php echo Form::select('time_zone', $timezone_list, 'Asia/Kolkata', ['class' => 'form-control select2_register','placeholder' => __('business.time_zone'), 'required']);; ?>

        </div>
    </div>
</div>
</fieldset>

<!-- tax details -->
<?php if(empty($is_admin)): ?>
    <h3><?php echo e(app('translator')->getFromJson('business.business_settings')); ?></h3>

    <fieldset>
    <legend><?php echo e(app('translator')->getFromJson('business.business_settings')); ?>:</legend>
    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('tax_label_1', __('business.tax_1_name') . ':'); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-info"></i>
                </span>
                <?php echo Form::text('tax_label_1', null, ['class' => 'form-control','placeholder' => __('business.tax_1_placeholder')]);; ?>

            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('tax_number_1', __('business.tax_1_no') . ':'); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-info"></i>
                </span>
                <?php echo Form::text('tax_number_1', null, ['class' => 'form-control']);; ?>

            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('tax_label_2',__('business.tax_2_name') . ':'); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-info"></i>
                </span>
                <?php echo Form::text('tax_label_2', null, ['class' => 'form-control','placeholder' => __('business.tax_1_placeholder')]);; ?>

            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('tax_number_2',__('business.tax_2_no') . ':'); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-info"></i>
                </span>
                <?php echo Form::text('tax_number_2', null, ['class' => 'form-control',]);; ?>

            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('fy_start_month', __('business.fy_start_month') . ':'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.fy_start_month') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </span>
                <?php echo Form::select('fy_start_month', $months, null, ['class' => 'form-control select2_register', 'required', 'style' => 'width:100%;']);; ?>

            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <?php echo Form::label('accounting_method', __('business.accounting_method') . ':'); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-calculator"></i>
                </span>
                <?php echo Form::select('accounting_method', $accounting_methods, null, ['class' => 'form-control select2_register', 'required', 'style' => 'width:100%;']);; ?>

            </div>
        </div>
    </div>
    </fieldset>
<?php endif; ?>

<!-- Owner Information -->
<?php if(empty($is_admin)): ?>
    <h3><?php echo e(app('translator')->getFromJson('business.owner')); ?></h3>
<?php endif; ?>

<fieldset>
<legend><?php echo e(app('translator')->getFromJson('business.owner_info')); ?></legend>
<div class="col-md-4">
    <div class="form-group">
        <?php echo Form::label('surname', __('business.prefix') . ':'); ?>

        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-info"></i>
            </span>
            <?php echo Form::text('surname', null, ['class' => 'form-control','placeholder' => __('business.prefix_placeholder')]);; ?>

        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="form-group">
        <?php echo Form::label('first_name', __('business.first_name') . ':'); ?>

        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-info"></i>
            </span>
            <?php echo Form::text('first_name', null, ['class' => 'form-control','placeholder' => __('business.first_name'), 'required']);; ?>

        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="form-group">
        <?php echo Form::label('last_name', __('business.last_name') . ':'); ?>

        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-info"></i>
            </span>
            <?php echo Form::text('last_name', null, ['class' => 'form-control','placeholder' =>  __('business.last_name')]);; ?>

        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="col-md-6">
    <div class="form-group">
        <?php echo Form::label('username', __('business.username') . ':'); ?>

        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-user"></i>
            </span>
            <?php echo Form::text('username', null, ['class' => 'form-control','placeholder' => __('business.username'), 'required']);; ?>

        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <?php echo Form::label('email', __('business.email') . ':'); ?>

        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-envelope"></i>
            </span>
            <?php echo Form::text('email', null, ['class' => 'form-control','placeholder' => __('business.email')]);; ?>

        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="col-md-6">
    <div class="form-group">
        <?php echo Form::label('password', __('business.password') . ':'); ?>

        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-lock"></i>
            </span>
            <?php echo Form::password('password', ['class' => 'form-control','placeholder' => __('business.password'), 'required']);; ?>

        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <?php echo Form::label('confirm_password', __('business.confirm_password') . ':'); ?>

        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-lock"></i>
            </span>
            <?php echo Form::password('confirm_password', ['class' => 'form-control','placeholder' => __('business.confirm_password'), 'required']);; ?>

        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="col-md-6">
    <?php if(!empty($system_settings['superadmin_enable_register_tc'])): ?>
        <div class="checkbox">
            <?php echo Form::checkbox('accept_tc', 0, false, ['required']);; ?>

            <label>
                <a class="terms_condition" data-toggle="modal" data-target="#tc_modal">
                    <?php echo e(app('translator')->getFromJson('lang_v1.accept_terms_and_conditions')); ?>
                </a>
            </label>
        </div>
        <?php echo $__env->make('business.partials.terms_conditions', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>
</div>
<div class="clearfix"></div>
</fieldset>