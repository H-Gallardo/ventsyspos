<div class="row">
	<div class="col-md-12">
		<div class="table-responsive">
			<table class="table bg-gray composite_product_details">
				<thead>
					<tr class="bg-green">
						<th>
							<?php echo e(app('translator')->getFromJson('product.product_name')); ?>
						</th>
						<th> 
							<?php echo e(app('translator')->getFromJson('sale.qty')); ?>
						</th>
						<th>
							<?php echo e(app('translator')->getFromJson('lang_v1.purchase_price_exc_tax')); ?>
						</th>
						<th>
							<?php echo e(app('translator')->getFromJson('lang_v1.item_level_purchase_price')); ?>
						</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$item_level_purchase_price_total = 0;
					?>
					<?php $__currentLoopData = $composite_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $composite_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td> 
								<?php if($composite_product->type == 'variable'): ?>
									<?php echo e($composite_product->name); ?> (<?php echo e($composite_product->variation_name); ?>) - <?php echo e($composite_product->sub_sku); ?>

								<?php else: ?>
									<?php echo e($composite_product->name); ?> - <?php echo e($composite_product->sub_sku); ?>

								<?php endif; ?>
							</td>
							<td>
								<?php echo e($composite_product->quantity); ?> <?php echo e($composite_product->short_name); ?>

							</td>
							<td>
								<span class="display_currency" data-currency_symbol="true">
									<?php echo e($composite_product->default_purchase_price); ?>

								</span>
							</td>
							<td>
								<span class="display_currency" data-currency_symbol="true" class="item_level_purchase_price">
									<?php echo e($composite_product->quantity * $composite_product->default_purchase_price); ?>

								</span>
							</td>
						</tr>
						<?php
							$item_level_purchase_price_total += $composite_product->quantity * $composite_product->default_purchase_price;
						?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
				<tfoot>
					<tr>
						<td></td>
						<td></td>
						<td>
							<b> <?php echo e(app('translator')->getFromJson( 'purchase.net_total_amount' )); ?></b> :
						</td>
						<td>
							<span class="display_currency" data-currency_symbol="true">
								<?php echo e($item_level_purchase_price_total); ?>

							</span>						
						</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td>
							<b><?php echo e(app('translator')->getFromJson('product.default_selling_price')); ?></b> :
						</td>
						<td>
							<span class="display_currency" data-currency_symbol="true">
								<?php echo e($default_sell_price); ?>

							</span>						
						</td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>