<?php if($pos_settings['hide_product_suggestion'] == 0): ?>
	<?php echo $__env->make('sale_pos.partials.product_list_box', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>

<?php if($pos_settings['hide_recent_trans'] == 0): ?>
	<?php echo $__env->make('sale_pos.partials.recent_transactions_box', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>