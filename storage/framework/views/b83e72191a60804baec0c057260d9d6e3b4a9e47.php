<div class="col-md-12">
	<form action="<?php echo e(action('\Modules\Superadmin\Http\Controllers\SubscriptionController@confirm', [$package->id])); ?>" method="POST">
	 	<?php echo e(csrf_field()); ?>

	 	<input type="hidden" name="gateway" value="<?php echo e($k); ?>">

	 	<button type="submit" class="btn btn-success"> <i class="fa fa-hand-grab-o"></i> <?php echo e($v); ?></button>
	</form>
	<p class="help-block"><?php echo e(app('translator')->getFromJson('superadmin::lang.offline_pay_helptext')); ?></p>
</div>