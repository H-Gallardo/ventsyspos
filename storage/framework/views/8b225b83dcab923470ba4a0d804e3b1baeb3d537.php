<?php
    $hide_tax = '';
    if( session()->get('business.enable_inline_tax') == 0){
        $hide_tax = 'hide';
    }
?>
<div class="table-responsive">
    <table class="table table-condensed table-bordered table-th-green text-center table-striped" 
    id="purchase_entry_table">
        <thead>
              <tr>
                <th>#</th>
                <th><?php echo e(app('translator')->getFromJson( 'product.product_name' )); ?></th>
                <th><?php echo e(app('translator')->getFromJson( 'purchase.purchase_quantity' )); ?></th>
                <th><?php echo e(app('translator')->getFromJson( 'lang_v1.unit_cost_before_discount' )); ?></th>
                <th><?php echo e(app('translator')->getFromJson( 'lang_v1.discount_percent' )); ?></th>
                <th><?php echo e(app('translator')->getFromJson( 'purchase.unit_cost_before_tax' )); ?></th>
                <th class="<?php echo e($hide_tax); ?>"><?php echo e(app('translator')->getFromJson( 'purchase.subtotal_before_tax' )); ?></th>
                <th class="<?php echo e($hide_tax); ?>"><?php echo e(app('translator')->getFromJson( 'purchase.product_tax' )); ?></th>
                <th class="<?php echo e($hide_tax); ?>"><?php echo e(app('translator')->getFromJson( 'purchase.net_cost' )); ?></th>
                <th><?php echo e(app('translator')->getFromJson( 'purchase.line_total' )); ?></th>
                <th class="<?php if(!session('business.enable_editing_product_from_purchase')): ?> hide <?php endif; ?>">
                    <?php echo e(app('translator')->getFromJson( 'lang_v1.profit_margin' )); ?>
                </th>
                <th><?php echo e(app('translator')->getFromJson( 'purchase.unit_selling_price')); ?></th>
                <?php if(session('business.enable_lot_number')): ?>
                    <th>
                        <?php echo e(app('translator')->getFromJson('lang_v1.lot_number')); ?>
                    </th>
                <?php endif; ?>
                <?php if(session('business.enable_product_expiry')): ?>
                    <th><?php echo e(app('translator')->getFromJson('product.mfg_date')); ?> / <?php echo e(app('translator')->getFromJson('product.exp_date')); ?></th>
                <?php endif; ?>
                <th>
                    <i class="fa fa-trash" aria-hidden="true"></i>
                </th>
              </tr>
        </thead>
        <tbody>
    <?php $row_count = 0; ?>
    <?php $__currentLoopData = $purchase->purchase_lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase_line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><span class="sr_number"></span></td>
            <td>
                <?php echo e($purchase_line->product->name); ?> (<?php echo e($purchase_line->variations->sub_sku); ?>)
                <?php if( $purchase_line->product->type == 'variable'): ?> 
                    <br/>(<b><?php echo e($purchase_line->variations->product_variation->name); ?></b> : <?php echo e($purchase_line->variations->name); ?>)
                <?php endif; ?>
            </td>

            <td>
                <?php echo Form::hidden('purchases[' . $loop->index . '][product_id]', $purchase_line->product_id );; ?>

                <?php echo Form::hidden('purchases[' . $loop->index . '][variation_id]', $purchase_line->variation_id );; ?>

                <?php echo Form::hidden('purchases[' . $loop->index . '][purchase_line_id]',
                $purchase_line->id);; ?>


                <?php
                    $check_decimal = 'false';
                    if($purchase_line->product->unit->allow_decimal == 0){
                        $check_decimal = 'true';
                    }
                ?>
            
                <?php echo Form::text('purchases[' . $loop->index . '][quantity]', 
                number_format($purchase_line->quantity, 2, $currency_details->decimal_separator, $currency_details->thousand_separator),
                ['class' => 'form-control input-sm purchase_quantity input_number mousetrap', 'required', 'data-rule-abs_digit' => $check_decimal, 'data-msg-abs_digit' => __('lang_v1.decimal_value_not_allowed')]);; ?> <?php echo e($purchase_line->product->unit->short_name); ?>

            </td>
            <td>
                <?php echo Form::text('purchases[' . $loop->index . '][pp_without_discount]', number_format($purchase_line->pp_without_discount/$purchase->exchange_rate, 2, $currency_details->decimal_separator, $currency_details->thousand_separator), ['class' => 'form-control input-sm purchase_unit_cost_without_discount input_number', 'required']);; ?>

            </td>
            <td>
                <?php echo Form::text('purchases[' . $loop->index . '][discount_percent]', number_format($purchase_line->discount_percent, 2, $currency_details->decimal_separator, $currency_details->thousand_separator), ['class' => 'form-control input-sm inline_discounts input_number', 'required']);; ?> <b>%</b>
            </td>
            <td>
                <?php echo Form::text('purchases[' . $loop->index . '][purchase_price]', 
                number_format($purchase_line->purchase_price/$purchase->exchange_rate, 2, $currency_details->decimal_separator, $currency_details->thousand_separator), ['class' => 'form-control input-sm purchase_unit_cost input_number', 'required']);; ?>

            </td>
            <td class="<?php echo e($hide_tax); ?>">
                <span class="row_subtotal_before_tax">
                    <?php echo e(number_format($purchase_line->quantity * $purchase_line->purchase_price/$purchase->exchange_rate, 2, $currency_details->decimal_separator, $currency_details->thousand_separator)); ?>

                </span>
                <input type="hidden" class="row_subtotal_before_tax_hidden" value="<?php echo e(number_format($purchase_line->quantity * $purchase_line->purchase_price/$purchase->exchange_rate, 2, $currency_details->decimal_separator, $currency_details->thousand_separator)); ?>">
            </td>

            <td class="<?php echo e($hide_tax); ?>">
                <div class="input-group">
                    <select name="purchases[<?php echo e($loop->index); ?>][purchase_line_tax_id]" class="form-control input-sm purchase_line_tax_id" placeholder="'Please Select'">
                        <option value="" data-tax_amount="0" <?php if( empty( $purchase_line->tax_id ) ): ?>
                        selected <?php endif; ?> ><?php echo e(app('translator')->getFromJson('lang_v1.none')); ?></option>
                        <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($tax->id); ?>" data-tax_amount="<?php echo e($tax->amount); ?>" <?php if( $purchase_line->tax_id == $tax->id): ?> selected <?php endif; ?> ><?php echo e($tax->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <span class="input-group-addon purchase_product_unit_tax_text">
                        <?php echo e(number_format($purchase_line->item_tax/$purchase->exchange_rate, 2, $currency_details->decimal_separator, $currency_details->thousand_separator)); ?>

                    </span>
                    <?php echo Form::hidden('purchases[' . $loop->index . '][item_tax]', number_format($purchase_line->item_tax/$purchase->exchange_rate, 2, $currency_details->decimal_separator, $currency_details->thousand_separator), ['class' => 'purchase_product_unit_tax']);; ?>

                </div>
            </td>
            <td class="<?php echo e($hide_tax); ?>">
                <?php echo Form::text('purchases[' . $loop->index . '][purchase_price_inc_tax]', number_format($purchase_line->purchase_price_inc_tax/$purchase->exchange_rate, 2, $currency_details->decimal_separator, $currency_details->thousand_separator), ['class' => 'form-control input-sm purchase_unit_cost_after_tax input_number', 'required']);; ?>

            </td>
            <td>
                <span class="row_subtotal_after_tax">
                <?php echo e(number_format($purchase_line->purchase_price_inc_tax * $purchase_line->quantity/$purchase->exchange_rate, 2, $currency_details->decimal_separator, $currency_details->thousand_separator)); ?>

                </span>
                <input type="hidden" class="row_subtotal_after_tax_hidden" value="<?php echo e(number_format($purchase_line->purchase_price_inc_tax * $purchase_line->quantity/$purchase->exchange_rate, 2, $currency_details->decimal_separator, $currency_details->thousand_separator)); ?>">
            </td>

            <td class="<?php if(!session('business.enable_editing_product_from_purchase')): ?> hide <?php endif; ?>">
                <?php
                    $pp = $purchase_line->purchase_price;
                    $sp = $purchase_line->variations->default_sell_price;
                ?>
                
                <?php echo Form::text('purchases[' . $loop->index . '][profit_percent]', 
                number_format((($sp - $pp) * 100 / $pp), 2, $currency_details->decimal_separator, $currency_details->thousand_separator), 
                ['class' => 'form-control input-sm input_number profit_percent', 'required']);; ?>

            </td>

            <td>
                <?php if(session('business.enable_editing_product_from_purchase')): ?>
                    <?php echo Form::text('purchases[' . $loop->index . '][default_sell_price]', number_format($purchase_line->variations->default_sell_price, 2, $currency_details->decimal_separator, $currency_details->thousand_separator), ['class' => 'form-control input-sm input_number default_sell_price', 'required']);; ?>

                <?php else: ?>
                    <?php echo e(number_format($purchase_line->variations->default_sell_price, 2, $currency_details->decimal_separator, $currency_details->thousand_separator)); ?>

                <?php endif; ?>

            </td>
            <?php if(session('business.enable_lot_number')): ?>
                <td>
                    <?php echo Form::text('purchases[' . $loop->index . '][lot_number]', $purchase_line->lot_number, ['class' => 'form-control input-sm']);; ?>

                </td>
            <?php endif; ?>

            <?php if(session('business.enable_product_expiry')): ?>
                <td style="text-align: left;">
                    <?php if(!empty($purchase_line->product->expiry_period_type)): ?>
                    <input type="hidden" class="row_product_expiry" value="<?php echo e($purchase_line->product->expiry_period); ?>">
                    <input type="hidden" class="row_product_expiry_type" value="<?php echo e($purchase_line->product->expiry_period_type); ?>">

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
                    <?php
                        $mfg_date = null;
                        $exp_date = null;
                        if(!empty($purchase_line->mfg_date)){
                            $mfg_date = $purchase_line->mfg_date;
                        }
                        if(!empty($purchase_line->exp_date)){
                            $exp_date = $purchase_line->exp_date;
                        }
                    ?>
                    <div class="input-group <?php if($hide_mfg): ?> hide <?php endif; ?>">
                        <span class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </span>
                        <?php echo Form::text('purchases[' . $loop->index . '][mfg_date]', \Carbon::createFromTimestamp(strtotime($mfg_date))->format(session('business.date_format')), ['class' => 'form-control input-sm expiry_datepicker mfg_date', 'readonly']);; ?>

                    </div>
                    <b><small><?php echo e(app('translator')->getFromJson('product.exp_date')); ?>:</small></b>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </span>
                        <?php echo Form::text('purchases[' . $loop->index . '][exp_date]', \Carbon::createFromTimestamp(strtotime($exp_date))->format(session('business.date_format')), ['class' => 'form-control input-sm expiry_datepicker exp_date', 'readonly']);; ?>

                    </div>
                    <?php else: ?>
                    <div class="text-center">
                        <?php echo e(app('translator')->getFromJson('product.not_applicable')); ?>
                    </div>
                    <?php endif; ?>
                </td>
            <?php endif; ?>

            <td><i class="fa fa-times remove_purchase_entry_row text-danger" title="Remove" style="cursor:pointer;"></i></td>
        </tr>
        <?php $row_count = $loop->index + 1 ; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<input type="hidden" id="row_count" value="<?php echo e($row_count); ?>">