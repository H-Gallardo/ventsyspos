<?php $__currentLoopData = $variations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><span class="sr_number"></span></td>
        <td>
            <?php echo e($product->name); ?> (<?php echo e($variation->sub_sku); ?>)
            <?php if( $product->type == 'variable' ): ?>
                <br/>
                (<b><?php echo e($variation->product_variation->name); ?></b> : <?php echo e($variation->name); ?>)
            <?php endif; ?>
        </td>
        <td>
            <?php echo Form::hidden('purchases[' . $row_count . '][product_id]', $product->id );; ?>

            <?php echo Form::hidden('purchases[' . $row_count . '][variation_id]', $variation->id );; ?>


            <?php
                $check_decimal = 'false';
                if($product->unit->allow_decimal == 0){
                    $check_decimal = 'true';
                }
            ?>
            <?php echo Form::text('purchases[' . $row_count . '][quantity]', number_format(1, 2, $currency_details->decimal_separator, $currency_details->thousand_separator), ['class' => 'form-control input-sm purchase_quantity input_number mousetrap', 'required', 'data-rule-abs_digit' => $check_decimal, 'data-msg-abs_digit' => __('lang_v1.decimal_value_not_allowed')]);; ?> <?php echo e($product->unit->short_name); ?>

        </td>
        <td>
            <?php echo Form::text('purchases[' . $row_count . '][pp_without_discount]',
            number_format($variation->default_purchase_price, 2, $currency_details->decimal_separator, $currency_details->thousand_separator), ['class' => 'form-control input-sm purchase_unit_cost_without_discount input_number', 'required']);; ?>

        </td>
        <td>
            <?php echo Form::text('purchases[' . $row_count . '][discount_percent]', 0, ['class' => 'form-control input-sm inline_discounts input_number', 'required']);; ?>

        </td>
        <td>
            <?php echo Form::text('purchases[' . $row_count . '][purchase_price]',
            number_format($variation->default_purchase_price, 2, $currency_details->decimal_separator, $currency_details->thousand_separator), ['class' => 'form-control input-sm purchase_unit_cost input_number', 'required']);; ?>

        </td>
        <td class="<?php echo e($hide_tax); ?>">
            <span class="row_subtotal_before_tax display_currency">0</span>
            <input type="hidden" class="row_subtotal_before_tax_hidden" value=0>
        </td>
        <td class="<?php echo e($hide_tax); ?>">
            <div class="input-group">
                <select name="purchases[<?php echo e($row_count); ?>][purchase_line_tax_id]" class="form-control select2 input-sm purchase_line_tax_id" placeholder="'Please Select'">
                    <option value="" data-tax_amount="0" <?php if( $hide_tax == 'hide' ): ?>
                    selected <?php endif; ?> ><?php echo e(app('translator')->getFromJson('lang_v1.none')); ?></option>
                    <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($tax->id); ?>" data-tax_amount="<?php echo e($tax->amount); ?>" <?php if( $product->tax == $tax->id && $hide_tax != 'hide'): ?> selected <?php endif; ?> ><?php echo e($tax->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php echo Form::hidden('purchases[' . $row_count . '][item_tax]', 0, ['class' => 'purchase_product_unit_tax']);; ?>

                <span class="input-group-addon purchase_product_unit_tax_text">
                    0.00</span>
            </div>
        </td>
        <td class="<?php echo e($hide_tax); ?>">
            <?php
                $dpp_inc_tax = number_format($variation->dpp_inc_tax, 2, $currency_details->decimal_separator, $currency_details->thousand_separator);
                if($hide_tax == 'hide'){
                    $dpp_inc_tax = number_format($variation->default_purchase_price, 2, $currency_details->decimal_separator, $currency_details->thousand_separator);
                }

            ?>
            <?php echo Form::text('purchases[' . $row_count . '][purchase_price_inc_tax]', $dpp_inc_tax, ['class' => 'form-control input-sm purchase_unit_cost_after_tax input_number', 'required']);; ?>

        </td>
        <td>
            <span class="row_subtotal_after_tax display_currency">0</span>
            <input type="hidden" class="row_subtotal_after_tax_hidden" value=0>
        </td>
        <td class="<?php if(!session('business.enable_editing_product_from_purchase')): ?> hide <?php endif; ?>">
            <?php echo Form::text('purchases[' . $row_count . '][profit_percent]', number_format($variation->profit_percent, 2, $currency_details->decimal_separator, $currency_details->thousand_separator), ['class' => 'form-control input-sm input_number profit_percent', 'required']);; ?>

        </td>
        <td>
            <?php if(session('business.enable_editing_product_from_purchase')): ?>
                <?php echo Form::text('purchases[' . $row_count . '][default_sell_price]', number_format($variation->default_sell_price, 2, $currency_details->decimal_separator, $currency_details->thousand_separator), ['class' => 'form-control input-sm input_number default_sell_price', 'required']);; ?>

            <?php else: ?>
                <?php echo e(number_format($variation->default_sell_price, 2, $currency_details->decimal_separator, $currency_details->thousand_separator)); ?>

            <?php endif; ?>
        </td>
        <?php if(session('business.enable_lot_number')): ?>
            <td>
                <?php echo Form::text('purchases[' . $row_count . '][lot_number]', null, ['class' => 'form-control input-sm']);; ?>

            </td>
        <?php endif; ?>
        <?php if(session('business.enable_product_expiry')): ?>
            <td style="text-align: left;">

                
                <?php if(!empty($product->expiry_period_type)): ?>
                <input type="hidden" class="row_product_expiry" value="<?php echo e($product->expiry_period); ?>">
                <input type="hidden" class="row_product_expiry_type" value="<?php echo e($product->expiry_period_type); ?>">

                <?php if(session('business.expiry_type') == 'add_manufacturing'): ?>
                    <?php
                        $hide_mfg = false;
                    ?>
                <?php else: ?>
                    <?php
                        $hide_mfg = true;
                    ?>
                <?php endif; ?>

                <b class="<?php if($hide_mfg): ?> hide <?php endif; ?>"><small><?php echo e(app('translator')->getFromJson('product.mfg_date')); ?>:</small></b>
                <div class="input-group <?php if($hide_mfg): ?> hide <?php endif; ?>">
                    <span class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </span>
                    <?php echo Form::text('purchases[' . $row_count . '][mfg_date]', null, ['class' => 'form-control input-sm expiry_datepicker mfg_date', 'readonly']);; ?>

                </div>
                <b><small><?php echo e(app('translator')->getFromJson('product.exp_date')); ?>:</small></b>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </span>
                    <?php echo Form::text('purchases[' . $row_count . '][exp_date]', null, ['class' => 'form-control input-sm expiry_datepicker exp_date', 'readonly']);; ?>

                </div>
                <?php else: ?>
                <div class="text-center">
                    <?php echo e(app('translator')->getFromJson('product.not_applicable')); ?>
                </div>
                <?php endif; ?>
            </td>
        <?php endif; ?>
        <?php $row_count++ ;?>

        <td><i class="fa fa-times remove_purchase_entry_row text-danger" title="Remove" style="cursor:pointer;"></i></td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<input type="hidden" id="row_count" value="<?php echo e($row_count); ?>">