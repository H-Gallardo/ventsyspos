<?php $__env->startSection('title', __('superadmin::lang.superadmin') . ' | ' . __('superadmin::lang.packages')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(app('translator')->getFromJson('superadmin::lang.packages')); ?> <small><?php echo e(app('translator')->getFromJson('superadmin::lang.all_packages')); ?></small></h1>
    <!-- <ol class="breadcrumb">
        <a href="#"><i class="fa fa-dashboard"></i> Level</a><br/>
        <li class="active">Here<br/>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">
	<?php echo $__env->make('superadmin::layouts.partials.currency', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div class="box">
        <div class="box-header">
            <h3 class="box-title">&nbsp;</h3>
        	<div class="box-tools">
                <a href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\PackagesController@create')); ?>" 
                    class="btn btn-block btn-primary">
                	<i class="fa fa-plus"></i> <?php echo e(app('translator')->getFromJson( 'messages.add' )); ?></a>
            </div>
        </div>

        <div class="box-body">
        	<?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">
                	
					<div class="box box-success hvr-grow-shadow">
						<div class="box-header with-border text-center">
							<h2 class="box-title"><?php echo e($package->name); ?></h2>

							<div class="row">
								<?php if($package->is_active == 1): ?>
									<span class="badge bg-green">
										<?php echo e(app('translator')->getFromJson('superadmin::lang.active')); ?>
									</span>
								<?php else: ?>
									<span class="badge bg-red">
									<?php echo e(app('translator')->getFromJson('superadmin::lang.inactive')); ?>
									</span>
								<?php endif; ?>
								
								<a href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\PackagesController@edit', [$package->id])); ?>" class="btn btn-box-tool" title="edit"><i class="fa fa-edit"></i></a>
								<a href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\PackagesController@destroy', [$package->id])); ?>" class="btn btn-box-tool link_confirmation" title="delete"><i class="fa fa-trash"></i></a>
              					
							</div>
						</div>
						<!-- /.box-header -->
						<div class="box-body text-center">

							<?php if($package->location_count == 0): ?>
								<?php echo e(app('translator')->getFromJson('superadmin::lang.unlimited')); ?>
							<?php else: ?>
								<?php echo e($package->location_count); ?>

							<?php endif; ?>

							<?php echo e(app('translator')->getFromJson('business.business_locations')); ?>
							<br/>

							<?php if($package->user_count == 0): ?>
								<?php echo e(app('translator')->getFromJson('superadmin::lang.unlimited')); ?>
							<?php else: ?>
								<?php echo e($package->user_count); ?>

							<?php endif; ?>

							<?php echo e(app('translator')->getFromJson('superadmin::lang.users')); ?>
							<br/>
						
							<?php if($package->product_count == 0): ?>
								<?php echo e(app('translator')->getFromJson('superadmin::lang.unlimited')); ?>
							<?php else: ?>
								<?php echo e($package->product_count); ?>

							<?php endif; ?>

							<?php echo e(app('translator')->getFromJson('superadmin::lang.products')); ?>
							<br/>

							<?php if($package->invoice_count == 0): ?>
								<?php echo e(app('translator')->getFromJson('superadmin::lang.unlimited')); ?>
							<?php else: ?>
								<?php echo e($package->invoice_count); ?>

							<?php endif; ?>

							<?php echo e(app('translator')->getFromJson('superadmin::lang.invoices')); ?>
							<br/>

							<?php if($package->trial_days != 0): ?>
									<?php echo e($package->trial_days); ?> <?php echo e(app('translator')->getFromJson('superadmin::lang.trial_days')); ?>
								<br/>
							<?php endif; ?>

							<?php if(!empty($package->custom_permissions)): ?>
								<?php $__currentLoopData = $package->custom_permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if(isset($permission_formatted[$permission])): ?>
										<?php echo e($permission_formatted[$permission]); ?>

										<br/>
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php endif; ?>
							
							<h3 class="text-center">
								<?php if($package->price != 0): ?>
									<span class="display_currency" data-currency_symbol="true">
										<?php echo e($package->price); ?>

									</span>

									<small>
										/ <?php echo e($package->interval_count); ?> <?php echo e(ucfirst($package->interval)); ?>

									</small>
								<?php else: ?>
									<?php echo e(app('translator')->getFromJson('superadmin::lang.free_for_duration', ['duration' => $package->interval_count . ' ' . ucfirst($package->interval)])); ?>
								<?php endif; ?>
							</h3>

						</div>
						<!-- /.box-body -->

						<div class="box-footer text-center">
							<?php echo e($package->description); ?>

						</div>
					</div>
					<!-- /.box -->
                </div>
                <?php if($loop->iteration%3 == 0): ?>
    				<div class="clearfix"></div>
    			<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <div class="col-md-12">
                <?php echo e($packages->links()); ?>

            </div>
        </div>

    </div>

    <div class="modal fade brands_modal" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
    </div>

</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>