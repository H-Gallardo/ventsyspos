<div class="row">
	<div class="col-md-10 col-md-offset-1 col-xs-12">
		<div class="table-responsive">
			<table class="table table-condensed bg-gray">
				<tr>
					<th>SKU</th>
					<th>Variation</th>
					<th><?php echo e(app('translator')->getFromJson('sale.unit_price')); ?></th>
					<th><?php echo e(app('translator')->getFromJson('report.current_stock')); ?></th>
					<th><?php echo e(app('translator')->getFromJson('report.total_unit_sold')); ?></th>
				</tr>
				<?php $__currentLoopData = $product_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($details->sub_sku); ?></td>
						<td>
							<?php echo e($details->product . '-' . $details->product_variation . 
							'-' .  $details->variation); ?>

						</td>
						<td><span class="display_currency" data-currency_symbol=true><?php echo e($details->sell_price_inc_tax); ?></span></td>
						<td>
							<?php if($details->stock): ?>
								<span class="display_currency" data-currency_symbol=false><?php echo e((float)$details->stock); ?></span> <?php echo e($details->unit); ?>

							<?php else: ?>
							 0
							<?php endif; ?>
						</td>
						<td>
							<?php if($details->total_sold): ?>
								<span class="display_currency" data-currency_symbol=false><?php echo e((float)$details->total_sold); ?></span> <?php echo e($details->unit); ?>

							<?php else: ?>
							 0
							<?php endif; ?>
						</td>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</table>
		</div>
	</div>
</div>