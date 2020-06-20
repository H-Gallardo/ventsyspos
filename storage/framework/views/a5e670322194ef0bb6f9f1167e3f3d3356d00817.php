<?php if(!$model->container): ?>

	<?php echo $__env->make('charts::_partials.loader.container-top', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<div id="<?php echo e($model->id); ?>" style="<?php echo $__env->make('charts::_partials.dimension.css', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>"></div>
	<?php echo $__env->make('charts::_partials.loader.container-bottom', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>
