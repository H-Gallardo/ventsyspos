<div class="pos-tab-content active">
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('name',__('business.business_name') . ':*'); ?>

                <?php echo Form::text('name', $business->name, ['class' => 'form-control', 'required',
                'placeholder' => __('business.business_name')]);; ?>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('start_date', __('business.start_date') . ':'); ?>

                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </span>
                    <?php
                        $start_date = null;
                        if(!empty($business->start_date)){
                            $start_date = date('m/d/Y', strtotime($business->start_date));
                        }
                    ?>
                    <?php echo Form::text('start_date', $start_date, ['class' => 'form-control start-date-picker','placeholder' => __('business.start_date'), 'readonly']);; ?>

                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('default_profit_percent', __('business.default_profit_percent') . ':*'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.default_profit_percent') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-plus-circle"></i>
                    </span>
                    <?php echo Form::number('default_profit_percent', $business->default_profit_percent, ['class' => 'form-control', 'min' => 0, 
                    'step' => 0.01, 'max' => 100]);; ?>

                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('currency_id', __('business.currency') . ':'); ?>

                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-money"></i>
                    </span>
                    <?php echo Form::select('currency_id', $currencies, $business->currency_id, ['class' => 'form-control select2','placeholder' => __('business.currency'), 'required']);; ?>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <?php echo Form::label('currency_symbol_placement', __('lang_v1.currency_symbol_placement') . ':'); ?>

                <?php echo Form::select('currency_symbol_placement', ['before' => __('lang_v1.before_amount'), 'after' => __('lang_v1.after_amount')], $business->currency_symbol_placement, ['class' => 'form-control select2', 'required']);; ?>

            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <?php echo Form::label('time_zone', __('business.time_zone') . ':'); ?>

                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                    </span>
                    <?php echo Form::select('time_zone', $timezone_list, $business->time_zone, ['class' => 'form-control select2', 'required']);; ?>

                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('business_logo', __('business.upload_logo') . ':'); ?>

                    <?php echo Form::file('business_logo', ['accept' => 'image/*']);; ?>

                    <p class="help-block"><i> <?php echo e(app('translator')->getFromJson('business.logo_help')); ?></i></p>
            </div>
        </div>
        <div class="col-md-4">
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
                    <?php echo Form::select('fy_start_month', $months, $business->fy_start_month, ['class' => 'form-control select2', 'required']);; ?>

                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('accounting_method', __('business.accounting_method') . ':*'); ?>

                <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.accounting_method') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-calculator"></i>
                    </span>
                    <?php echo Form::select('accounting_method', $accounting_methods, $business->accounting_method, ['class' => 'form-control select2', 'required']);; ?>

                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('transaction_edit_days', __('business.transaction_edit_days') . ':*'); ?>

                <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.transaction_edit_days') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-edit"></i>
                    </span>
                    <?php echo Form::number('transaction_edit_days', $business->transaction_edit_days, ['class' => 'form-control','placeholder' => __('business.transaction_edit_days'), 'required']);; ?>

                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('date_format', __('lang_v1.date_format') . ':*'); ?>

                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </span>
                    <?php echo Form::select('date_format', $date_formats, $business->date_format, ['class' => 'form-control select2', 'required']);; ?>

                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('time_format', __('lang_v1.time_format') . ':*'); ?>

                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                    </span>
                    <?php echo Form::select('time_format', [12 => __('lang_v1.12_hour'), 24 => __('lang_v1.24_hour')], $business->time_format, ['class' => 'form-control select2', 'required']);; ?>

                </div>
            </div>
        </div>
    </div>
</div>