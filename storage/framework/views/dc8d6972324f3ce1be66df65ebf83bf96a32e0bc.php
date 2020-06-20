<?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
	<div class="col-md-3 col-xs-4 product_list no-print">
		<div class="product_box bg-gray" data-toggle="tooltip" data-placement="bottom" data-variation_id="<?php echo e($product->variation_id); ?>" title="<?php echo e($product->name); ?> <?php if($product->type == 'variable'): ?>- <?php echo e($product->variation); ?> <?php endif; ?> <?php echo e('(' . $product->sub_sku . ')'); ?>">
		<div class="image-container">
			<img src="<?php echo e($product->image_url); ?>" alt="">
		</div>
			<div class="text text-muted text-uppercase">
				<small><?php echo e($product->name); ?> 
				<?php if($product->type == 'variable'): ?>
					- <?php echo e($product->variation); ?>

				<?php endif; ?>
				</small>
			</div>
			<small class="text-muted">
				(<?php echo e($product->sub_sku); ?>)
			</small>
		</div>
	</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
	<input type="hidden" id="no_products_found">
	<div class="col-md-12">
		<h4 class="text-center">
			<?php echo e(app('translator')->getFromJson('lang_v1.no_products_to_display')); ?>
		</h4>
	</div>
<?php endif; ?>