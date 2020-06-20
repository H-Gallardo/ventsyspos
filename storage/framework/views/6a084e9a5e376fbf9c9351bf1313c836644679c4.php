<?php $__env->startSection('title', 'Update Confirmation'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <h1 class="page-header text-center"><?php echo e(config('app.name', 'POS')); ?></h1>

        <?php echo $__env->make('install.partials.e_license', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="col-md-8 col-md-offset-2">
        	<form action="<?php echo e(route('install.update')); ?>" method="POST">
        		<?php echo e(csrf_field()); ?>

        		<button type="submit" class="btn btn-success pull-right">I Agree, Proceed to update</button>
        	</form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', ['no_header' => 1], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>