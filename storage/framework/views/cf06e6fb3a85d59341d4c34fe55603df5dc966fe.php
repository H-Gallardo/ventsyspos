<div class="well">
<ul class="text-danger">
	<?php $__currentLoopData = $log_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<li>
			<?php if($details->error_type == 'order_product_not_found'): ?>
				<?php echo __('woocommerce::lang.product_not_found_error', ['product' => $details->product, 'order_number' => $details->order_number]); ?>

			<?php elseif($details->error_type == 'order_insuficient_product_qty'): ?>
				<?php echo __('woocommerce::lang.qty_mismatch_error', ['msg' => $details->msg, 'order_number' => $details->order_number]); ?>

			<?php elseif($details->error_type == 'order_customer_empty'): ?>
				<?php echo __('woocommerce::lang.order_customer_empty', ['order_number' => $details->order_number]); ?>

			<?php endif; ?>
		</li>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
</div>