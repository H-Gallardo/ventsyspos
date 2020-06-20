<tr class="product_row" data-row_index="<?php echo e($row_count); ?>">
	<td>
		<?php
			$product_name = $product->product_name . '<br/>' . $product->sub_sku ;
			if(!empty($product->brand)){ $product_name .= ' ' . $product->brand ;}
		?>

		<?php if(auth()->user()->can('edit_product_price_from_sale_screen') || auth()->user()->can('edit_product_discount_from_sale_screen') ): ?>
		<div data-toggle="tooltip" data-placement="bottom" title="<?php echo e(app('translator')->getFromJson('lang_v1.pos_edit_product_price_help')); ?>">
		<span class="text-link text-info cursor-pointer" data-toggle="modal" data-target="#row_edit_product_price_modal_<?php echo e($row_count); ?>">
			<?php echo $product_name; ?>

			&nbsp;<i class="fa fa-info-circle"></i>
		</span>
		</div>
		<?php else: ?>
			<?php echo $product_name; ?>

		<?php endif; ?>
		<input type="hidden" class="enable_sr_no" value="<?php echo e($product->enable_sr_no); ?>">
		<div data-toggle="tooltip" data-placement="bottom" title="<?php echo e(app('translator')->getFromJson('lang_v1.add_description')); ?>">
			<i class="fa fa-commenting cursor-pointer text-primary add-pos-row-description" data-toggle="modal" data-target="#row_description_modal_<?php echo e($row_count); ?>"></i>
		</div>

		<?php
			$hide_tax = 'hide';
	        if(session()->get('business.enable_inline_tax') == 1){
	            $hide_tax = '';
	        }
	        
			$tax_id = $product->tax_id;
			$item_tax = !empty($product->item_tax) ? $product->item_tax : 0;
			$unit_price_inc_tax = $product->sell_price_inc_tax;
			if($hide_tax == 'hide'){
				$tax_id = null;
				$unit_price_inc_tax = $product->default_sell_price;
			}
		?>

		<div class="modal fade row_edit_product_price_model" id="row_edit_product_price_modal_<?php echo e($row_count); ?>" tabindex="-1" role="dialog">
			<?php echo $__env->make('sale_pos.partials.row_edit_product_price_modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>

		<!-- Description modal start -->
		<div class="modal fade row_description_modal" id="row_description_modal_<?php echo e($row_count); ?>" tabindex="-1" role="dialog">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel"><?php echo e($product->product_name); ?> - <?php echo e($product->sub_sku); ?></h4>
		      </div>
		      <div class="modal-body">
		      	<div class="form-group">
		      		<label><?php echo e(app('translator')->getFromJson('lang_v1.description')); ?></label>
		      		<?php
		      			$sell_line_note = '';
		      			if(!empty($product->sell_line_note)){
		      				$sell_line_note = $product->sell_line_note;
		      			}
		      		?>
		      		<textarea class="form-control" name="products[<?php echo e($row_count); ?>][sell_line_note]" rows="3"><?php echo e($sell_line_note); ?></textarea>
		      		<p class="help-block"><?php echo e(app('translator')->getFromJson('lang_v1.sell_line_description_help')); ?></p>
		      	</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(app('translator')->getFromJson('messages.close')); ?></button>
		      </div>
		    </div>
		  </div>
		</div>
		<!-- Description modal end -->
		<?php if(in_array('modifiers' , $enabled_modules)): ?>
			<div class="modifiers_html">
				<?php if(!empty($product->product_ms)): ?>
					<?php echo $__env->make('restaurant.product_modifier_set.modifier_for_product', array('edit_modifiers' => true, 'row_count' => $loop->index, 'product_ms' => $product->product_ms ) , array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php
			$max_qty_rule = $product->qty_available;
			$max_qty_msg = __('validation.custom-messages.quantity_not_available', ['qty'=> $product->formatted_qty_available, 'unit' => $product->unit  ]);
		?>

		<?php if( session()->get('business.enable_lot_number') == 1 || session()->get('business.enable_product_expiry') == 1): ?>
		<?php
			$lot_enabled = session()->get('business.enable_lot_number');
			$exp_enabled = session()->get('business.enable_product_expiry');
			$lot_no_line_id = '';
			if(!empty($product->lot_no_line_id)){
				$lot_no_line_id = $product->lot_no_line_id;
			}
		?>
		<?php if(!empty($product->lot_numbers)): ?>
			<select class="form-control lot_number" name="products[<?php echo e($row_count); ?>][lot_no_line_id]" <?php if(!empty($product->transaction_sell_lines_id)): ?> disabled <?php endif; ?>>
				<option value=""><?php echo e(app('translator')->getFromJson('lang_v1.lot_n_expiry')); ?></option>
				<?php $__currentLoopData = $product->lot_numbers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lot_number): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php
						$selected = "";
						if($lot_number->purchase_line_id == $lot_no_line_id){
							$selected = "selected";

							$max_qty_rule = $lot_number->qty_available;
							$max_qty_msg = __('lang_v1.quantity_error_msg_in_lot', ['qty'=> $lot_number->qty_formated, 'unit' => $product->unit  ]);
						}

						$expiry_text = '';
						if($exp_enabled == 1 && !empty($lot_number->exp_date)){
							if( \Carbon::now()->gt(\Carbon::createFromFormat('Y-m-d', $lot_number->exp_date)) ){
								$expiry_text = '(' . __('report.expired') . ')';
							}
						}
					?>
					<option value="<?php echo e($lot_number->purchase_line_id); ?>" data-qty_available="<?php echo e($lot_number->qty_available); ?>" data-msg-max="<?php echo e(app('translator')->getFromJson('lang_v1.quantity_error_msg_in_lot', ['qty'=> $lot_number->qty_formated, 'unit' => $product->unit  ])); ?>" <?php echo e($selected); ?>><?php if(!empty($lot_number->lot_number) && $lot_enabled == 1): ?><?php echo e($lot_number->lot_number); ?> <?php endif; ?> <?php if($lot_enabled == 1 && $exp_enabled == 1): ?> - <?php endif; ?> <?php if($exp_enabled == 1 && !empty($lot_number->exp_date)): ?> <?php echo e(app('translator')->getFromJson('product.exp_date')); ?>: <?php echo e(\Carbon::createFromTimestamp(strtotime($lot_number->exp_date))->format(session('business.date_format'))); ?> <?php endif; ?> <?php echo e($expiry_text); ?></option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</select>
		<?php endif; ?>
	<?php endif; ?>

	</td>

	<td>
		
		<?php if(!empty($product->transaction_sell_lines_id)): ?>
			<input type="hidden" name="products[<?php echo e($row_count); ?>][transaction_sell_lines_id]" class="form-control" value="<?php echo e($product->transaction_sell_lines_id); ?>">
		<?php endif; ?>

		<input type="hidden" name="products[<?php echo e($row_count); ?>][product_id]" class="form-control product_id" value="<?php echo e($product->product_id); ?>">

		<input type="hidden" value="<?php echo e($product->variation_id); ?>" 
			name="products[<?php echo e($row_count); ?>][variation_id]" class="row_variation_id">

		<input type="hidden" value="<?php echo e($product->enable_stock); ?>" 
			name="products[<?php echo e($row_count); ?>][enable_stock]">
		
		<?php if(empty($product->quantity_ordered)): ?>
			<?php
				$product->quantity_ordered = 1;
			?>
		<?php endif; ?>
		<div class="input-group input-number">
			<span class="input-group-btn"><button type="button" class="btn btn-default btn-flat quantity-down"><i class="fa fa-minus text-danger"></i></button></span>
		<input type="text" data-min="1" class="form-control pos_quantity input_number mousetrap" value="<?php echo e(number_format($product->quantity_ordered, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator'])); ?>" name="products[<?php echo e($row_count); ?>][quantity]" 
		<?php if($product->unit_allow_decimal == 1): ?> data-decimal=1 <?php else: ?> data-decimal=0 data-rule-abs_digit="true" data-msg-abs_digit="<?php echo e(app('translator')->getFromJson('lang_v1.decimal_value_not_allowed')); ?>" <?php endif; ?>
		data-rule-required="true" data-msg-required="<?php echo e(app('translator')->getFromJson('validation.custom-messages.this_field_is_required')); ?>" <?php if($product->enable_stock): ?> data-rule-max-value="<?php echo e($max_qty_rule); ?>" data-qty_available="<?php echo e($product->qty_available); ?>" data-msg-max-value="<?php echo e($max_qty_msg); ?>" data-msg_max_default="<?php echo e(app('translator')->getFromJson('validation.custom-messages.quantity_not_available', ['qty'=> $product->formatted_qty_available, 'unit' => $product->unit  ])); ?>" <?php endif; ?> >
		<span class="input-group-btn"><button type="button" class="btn btn-default btn-flat quantity-up"><i class="fa fa-plus text-success"></i></button></span>
		</div>
		<?php echo e($product->unit); ?>

		
	</td>
	<td class="<?php echo e($hide_tax); ?>">
		<input type="text" name="products[<?php echo e($row_count); ?>][unit_price_inc_tax]" class="form-control pos_unit_price_inc_tax input_number" value="<?php echo e(number_format($unit_price_inc_tax, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator'])); ?>" <?php if(!auth()->user()->can('edit_product_price_from_sale_screen')): ?> readonly <?php endif; ?> <?php if(!empty($pos_settings['enable_msp'])): ?> data-rule-min-value="<?php echo e($unit_price_inc_tax); ?>" data-msg-min-value="<?php echo e(__('lang_v1.minimum_selling_price_error_msg', ['price' => number_format($unit_price_inc_tax, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator'])])); ?>" <?php endif; ?>>
	</td>
	<td class="text-center v-center">
		<?php
			$subtotal_type = !empty($pos_settings['is_pos_subtotal_editable']) ? 'text' : 'hidden';

		?>
		<input type="<?php echo e($subtotal_type); ?>" class="form-control pos_line_total <?php if(!empty($pos_settings['is_pos_subtotal_editable'])): ?> input_number <?php endif; ?>" value="<?php echo e(number_format($product->quantity_ordered*$unit_price_inc_tax, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator'])); ?>">
		<span class="display_currency pos_line_total_text <?php if(!empty($pos_settings['is_pos_subtotal_editable'])): ?> hide <?php endif; ?>" data-currency_symbol="true"><?php echo e($product->quantity_ordered*$unit_price_inc_tax); ?></span>
	</td>
	<td class="text-center">
		<i class="fa fa-close text-danger pos_remove_row cursor-pointer" aria-hidden="true"></i>
	</td>
</tr>