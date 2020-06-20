<div class="pos-tab-content">
    <div class="row">
        <div class="col-xs-4">
            <div class="form-group">
                <?php echo Form::label('default_tax_class',  __('woocommerce::lang.default_tax_class') . ':'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('woocommerce::lang.default_tax_class_help') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                <?php echo Form::text('default_tax_class',$default_settings['default_tax_class'], ['class' => 'form-control']);; ?>

            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                <?php echo Form::label('product_tax_type',  __('woocommerce::lang.sync_product_price') . ':'); ?>

                <?php echo Form::select('product_tax_type', ['inc' => __('woocommerce::lang.inc_tax'), 'exc' => __('woocommerce::lang.exc_tax') ], $default_settings['product_tax_type'], ['class' => 'form-control']);; ?>

            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                <?php echo Form::label('default_selling_price_group',  __('woocommerce::lang.default_selling_price_group') . ':'); ?>

                <?php echo Form::select('default_selling_price_group', $price_groups, $default_settings['default_selling_price_group'], ['class' => 'form-control select2', 'style' => 'width: 100%;']);; ?>

            </div>
        </div>
        <div class="col-xs-12">
            <hr>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="#"><?php echo e(app('translator')->getFromJson('woocommerce::lang.product_fields_to_be_synced_for_create')); ?>:</label><br>
                    <label class="checkbox-inline">
                      <?php echo Form::checkbox('product_fields_for_create[]', 'name', true, ['class' => 'input-icheck', 'disabled'] );; ?>

                      <?php echo e(app('translator')->getFromJson('product.product_name')); ?>,
                    </label>
                    <label class="checkbox-inline">
                      <?php echo Form::checkbox('product_fields_for_create[]', 'price', true, ['class' => 'input-icheck', 'disabled'] );; ?>

                      <?php echo e(app('translator')->getFromJson('woocommerce::lang.price')); ?>,
                    </label>
                    <label class="checkbox-inline">
                        <?php echo Form::checkbox('product_fields_for_create[]', 'category', in_array('category', $default_settings['product_fields_for_create']), ['class' => 'input-icheck'] );; ?> <?php echo e(app('translator')->getFromJson('product.category')); ?>,
                    </label>
                    <label class="checkbox-inline">
                        <?php echo Form::checkbox('product_fields_for_create[]', 'quantity', in_array('quantity', $default_settings['product_fields_for_create']), ['class' => 'input-icheck'] );; ?> <?php echo e(app('translator')->getFromJson('sale.qty')); ?>
                    </label>
                    <label class="checkbox-inline">
                        <?php echo Form::checkbox('product_fields_for_create[]', 'weight', in_array('weight', $default_settings['product_fields_for_create']), ['class' => 'input-icheck'] );; ?> <?php echo e(app('translator')->getFromJson('lang_v1.weight')); ?>
                    </label>
            </div>
        </div>
        <div class="col-xs-12">
            <br/>
            <div class="form-group">
                <label for="#"><?php echo e(app('translator')->getFromJson('woocommerce::lang.product_fields_to_be_synced_for_update')); ?>:</label><br>
                    <label class="checkbox-inline">
                        <?php echo Form::checkbox('product_fields_for_update[]', 'name', in_array('name', $default_settings['product_fields_for_update']), ['class' => 'input-icheck'] );; ?>

                      <?php echo e(app('translator')->getFromJson('product.product_name')); ?>,
                    </label>
                    <label class="checkbox-inline">
                        <?php echo Form::checkbox('product_fields_for_update[]', 'price', in_array('price', $default_settings['product_fields_for_update']), ['class' => 'input-icheck'] );; ?>

                      <?php echo e(app('translator')->getFromJson('woocommerce::lang.price')); ?>,
                    </label>
                    <label class="checkbox-inline">
                        <?php echo Form::checkbox('product_fields_for_update[]', 'category', in_array('category', $default_settings['product_fields_for_update']), ['class' => 'input-icheck'] );; ?> <?php echo e(app('translator')->getFromJson('product.category')); ?>,
                    </label>
                    <label class="checkbox-inline">
                        <?php echo Form::checkbox('product_fields_for_update[]', 'quantity', in_array('quantity', $default_settings['product_fields_for_update']), ['class' => 'input-icheck'] );; ?> <?php echo e(app('translator')->getFromJson('sale.qty')); ?>
                    </label>
                    <label class="checkbox-inline">
                        <?php echo Form::checkbox('product_fields_for_update[]', 'weight', in_array('weight', $default_settings['product_fields_for_update']), ['class' => 'input-icheck'] );; ?> <?php echo e(app('translator')->getFromJson('lang_v1.weight')); ?>
                    </label>
            </div>
            <br>
        </div>
    </div>
</div>