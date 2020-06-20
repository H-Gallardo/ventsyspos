<div class="row">
	<div class="col-md-12">
		<h4><?php echo e(app('translator')->getFromJson('product.variations')); ?>:</h4>
	</div>
	<div class="col-md-12">
		<div class="table-responsive">
			<table class="table bg-gray">
				<tr class="bg-green">
					<th><?php echo e(app('translator')->getFromJson('product.variations')); ?></th>
					<th><?php echo e(app('translator')->getFromJson('product.sku')); ?></th>
					<th><?php echo e(app('translator')->getFromJson('product.default_purchase_price')); ?> (<?php echo e(app('translator')->getFromJson('product.exc_of_tax')); ?>)</th>
					<th><?php echo e(app('translator')->getFromJson('product.default_purchase_price')); ?> (<?php echo e(app('translator')->getFromJson('product.inc_of_tax')); ?>)</th>
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access_default_selling_price')): ?>
				        <th><?php echo e(app('translator')->getFromJson('product.profit_percent')); ?></th>
				        <th><?php echo e(app('translator')->getFromJson('product.default_selling_price')); ?> (<?php echo e(app('translator')->getFromJson('product.exc_of_tax')); ?>)</th>
				        <th><?php echo e(app('translator')->getFromJson('product.default_selling_price')); ?> (<?php echo e(app('translator')->getFromJson('product.inc_of_tax')); ?>)</th>
			        <?php endif; ?>
			        <?php if(!empty($allowed_group_prices)): ?>
			        	<th><?php echo e(app('translator')->getFromJson('lang_v1.group_prices')); ?></th>
			        <?php endif; ?>
				</tr>
				<?php $__currentLoopData = $product->variations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td>
						<?php echo e($variation->product_variation->name); ?> - <?php echo e($variation->name); ?>

					</td>
					<td>
						<?php echo e($variation->sub_sku); ?>

					</td>
					<td>
						<span class="display_currency" data-currency_symbol="true"><?php echo e($variation->default_purchase_price); ?></span>
					</td>
					<td>
						<span class="display_currency" data-currency_symbol="true"><?php echo e($variation->dpp_inc_tax); ?></span>
					</td>
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access_default_selling_price')): ?>
						<td>
							<?php echo e($variation->profit_percent); ?>

						</td>
						<td>
							<span class="display_currency" data-currency_symbol="true"><?php echo e($variation->default_sell_price); ?></span>
						</td>
						<td>
							<span class="display_currency" data-currency_symbol="true"><?php echo e($variation->sell_price_inc_tax); ?></span>
						</td>
					<?php endif; ?>
					<?php if(!empty($allowed_group_prices)): ?>
			        	<td class="td-full-width">
			        		<?php $__currentLoopData = $allowed_group_prices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			        			<strong><?php echo e($value); ?></strong> - <?php if(!empty($group_price_details[$variation->id][$key])): ?>
			        				<span class="display_currency" data-currency_symbol="true"><?php echo e($group_price_details[$variation->id][$key]); ?></span>
			        			<?php else: ?>
			        				0
			        			<?php endif; ?>
			        			<br>
			        		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			        	</td>
			        <?php endif; ?>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</table>
		</div>
	</div>
</div>