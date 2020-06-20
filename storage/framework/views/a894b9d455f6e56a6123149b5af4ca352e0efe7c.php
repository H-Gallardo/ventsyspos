<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><?php echo e($product->product_name); ?> - <?php echo e($product->sub_sku); ?></h4>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="form-group col-xs-12 <?php if(!auth()->user()->can('edit_product_price_from_sale_screen')): ?> hide <?php endif; ?>">
					<label><?php echo e(app('translator')->getFromJson('sale.unit_price')); ?></label>
						<input type="text" name="products[<?php echo e($row_count); ?>][unit_price]" class="form-control pos_unit_price input_number mousetrap" value="<?php echo e(number_format(!empty($product->unit_price_before_discount) ? $product->unit_price_before_discount : $product->default_sell_price, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator'])); ?>">
				</div>
				<?php
					$discount_type = !empty($product->line_discount_type) ? $product->line_discount_type : 'fixed';
					$discount_amount = !empty($product->line_discount_amount) ? $product->line_discount_amount : 0;
				?>
				<div class="form-group col-xs-12 col-sm-6 <?php if(!auth()->user()->can('edit_product_discount_from_sale_screen')): ?> hide <?php endif; ?>">
					<label><?php echo e(app('translator')->getFromJson('sale.discount_type')); ?></label>
						<?php echo Form::select("products[$row_count][line_discount_type]", ['fixed' => __('lang_v1.fixed'), 'percentage' => __('lang_v1.percentage')], $discount_type , ['class' => 'form-control row_discount_type']);; ?>

				</div>
				<div class="form-group col-xs-12 col-sm-6 <?php if(!auth()->user()->can('edit_product_discount_from_sale_screen')): ?> hide <?php endif; ?>">
					<label><?php echo e(app('translator')->getFromJson('sale.discount_amount')); ?></label>
						<?php echo Form::text("products[$row_count][line_discount_amount]", number_format($discount_amount, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), ['class' => 'form-control input_number row_discount_amount']);; ?>

				</div>
				<div class="form-group col-xs-12 <?php echo e($hide_tax); ?>">
					<label><?php echo e(app('translator')->getFromJson('sale.tax')); ?></label>

					<?php echo Form::hidden("products[$row_count][item_tax]", number_format($item_tax, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), ['class' => 'item_tax']);; ?>

		
					<?php echo Form::select("products[$row_count][tax_id]", $tax_dropdown['tax_rates'], $tax_id, ['placeholder' => 'Select', 'class' => 'form-control tax_id'], $tax_dropdown['attributes']);; ?>

				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(app('translator')->getFromJson('messages.close')); ?></button>
		</div>
	</div>
</div>