<?php $__currentLoopData = $variations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<tr class="composite_product_row">
		<td class="text-center">
			<?php if($product->type == 'variable'): ?>
				<?php echo e($product->name); ?> (<?php echo e($variation->name); ?>) - <?php echo e($variation->sub_sku); ?>

			<?php else: ?>
				<?php echo e($product->name); ?> - <?php echo e($variation->sub_sku); ?>

			<?php endif; ?>
			<input type="hidden" name="composition_variation_id[]" value="<?php echo e($variation->id); ?>">
		</td>
		<td class="text-center">
			
			<?php echo Form::text('quantity[]', number_format(1, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), ['class' => 'form-control col-sm-4 input-sm quantity input_number mousetrap', 'required', 'style '=> "width: 77px"]);; ?> <?php echo e($product->unit->short_name); ?>

		</td>	
		<td class="text-center">
			<span class="purchase_price display_currency" data-currency_symbol="true">
				<?php echo e($variation->default_purchase_price); ?>

			</span>
			<input type="hidden" class="purchase_price" value="<?php echo e($variation->default_purchase_price); ?>">
		</td>
		<td class="text-center">
			<span class="item_level_purchase_price display_currency" data-currency_symbol="true">
			</span>
			<input type="hidden" class="item_level_purchase_price" value="">
		</td>
		<td class="text-center">
			<span>
				<i class="fa fa-times remove_composite_product_entry_row text-danger" title="Remove" style="cursor:pointer;"></i>
			</span>
		</td>
	</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
