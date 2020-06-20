<div class="pos-tab-content">
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('sku_prefix', __('business.sku_prefix') . ':'); ?>

                 <?php echo Form::text('sku_prefix', $business->sku_prefix, ['class' => 'form-control text-uppercase']);; ?>

            </div>
        </div>

        <?php if(!config('constants.disable_expiry', true)): ?>
        <div class="col-sm-4">
            <?php echo Form::label('enable_product_expiry', __( 'product.enable_product_expiry' ) . ':'); ?>

            <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('lang_v1.tooltip_enable_expiry') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <?php echo Form::checkbox('enable_product_expiry', 1, $business->enable_product_expiry );; ?> 
                </span>

                <select class="form-control" id="expiry_type"
                    name="expiry_type" 
                    <?php if(!$business->enable_product_expiry): ?> disabled <?php endif; ?>>
                    <option value="add_expiry" <?php if($business->expiry_type == 'add_expiry'): ?> selected <?php endif; ?>>
                        <?php echo e(__('lang_v1.add_expiry')); ?>

                    </option>
                  <option value="add_manufacturing" <?php if($business->expiry_type == 'add_manufacturing'): ?> selected <?php endif; ?>><?php echo e(__('lang_v1.add_manufacturing_auto_expiry')); ?></option>
                </select>
            </div>
        </div>

        <div class="col-sm-4 <?php if(!$business->enable_product_expiry): ?> hide <?php endif; ?>" id="on_expiry_div">
            <div class="form-group">
                <div class="multi-input">
                    <?php echo Form::label('on_product_expiry', __('lang_v1.on_product_expiry') . ':'); ?>

                    <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('lang_v1.tooltip_on_product_expiry') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                    <br>

                    <?php echo Form::select('on_product_expiry',     ['keep_selling'=>__('lang_v1.keep_selling'), 'stop_selling'=>__('lang_v1.stop_selling') ], $business->on_product_expiry, ['class' => 'form-control pull-left', 'style' => 'width:60%;']);; ?>


                    <?php
                        $disabled = '';
                        if($business->on_product_expiry == 'keep_selling'){
                            $disabled = 'disabled';
                        }
                    ?>

                    <?php echo Form::number('stop_selling_before', $business->stop_selling_before, ['class' => 'form-control pull-left', 'placeholder' => 'stop n days before', 'style' => 'width:40%;', $disabled, 'required', 'id' => 'stop_selling_before']);; ?>

                </div>
            </div>
        </div>

        <?php endif; ?>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <div class="checkbox">
                  <label>
                    <?php echo Form::checkbox('enable_brand', 1, $business->enable_brand, 
                    [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.enable_brand' )); ?>

                  </label>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <div class="checkbox">
                  <label>
                    <?php echo Form::checkbox('enable_category', 1, $business->enable_category, [ 'class' => 'input-icheck', 'id' => 'enable_category']);; ?> <?php echo e(__( 'lang_v1.enable_category' )); ?>

                  </label>
                </div>
            </div>
        </div>

        <div class="col-sm-4 enable_sub_category <?php if($business->enable_category != 1): ?> hide <?php endif; ?>">
            <div class="form-group">
                <div class="checkbox">
                  <label>
                    <?php echo Form::checkbox('enable_sub_category', 1, $business->enable_sub_category, [ 'class' => 'input-icheck', 'id' => 'enable_sub_category']);; ?> <?php echo e(__( 'lang_v1.enable_sub_category' )); ?>

                  </label>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <div class="checkbox">
                  <label>
                    <?php echo Form::checkbox('enable_price_tax', 1, $business->enable_price_tax, [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.enable_price_tax' )); ?>

                  </label>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('default_unit', __('lang_v1.default_unit') . ':'); ?>

                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-balance-scale"></i>
                    </span>
                    <?php echo Form::select('default_unit', $units_dropdown, $business->default_unit, ['class' => 'form-control select2', 'style' => 'width: 100%;' ]);; ?>

                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="col-sm-4">
            <div class="form-group">
                <div class="checkbox">
                  <label>
                    <?php echo Form::checkbox('enable_racks', 1, $business->enable_racks, [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.enable_racks' )); ?>

                  </label>
                  <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('lang_v1.tooltip_enable_racks') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <div class="checkbox">
                  <label>
                    <?php echo Form::checkbox('enable_row', 1, $business->enable_row, [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.enable_row' )); ?>

                  </label>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <div class="checkbox">
                  <label>
                    <?php echo Form::checkbox('enable_position', 1, $business->enable_position, [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.enable_position' )); ?>

                  </label>
                </div>
            </div>
        </div>
    </div>
</div>