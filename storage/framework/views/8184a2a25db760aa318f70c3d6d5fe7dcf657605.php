<?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<?php if($package->is_private == 1 && !auth()->user()->can('superadmin')): ?>
		<?php
			continue;
		?>
	<?php endif; ?>
    <div class="col-md-4">
    	
		<div class="box box-success hvr-grow-shadow">
			<div class="box-header with-border text-center">
				<h2 class="box-title"><?php echo e($package->name); ?></h2>
			</div>
			
			<!-- /.box-header -->
			<div class="box-body text-center">

				<i class="fa fa-check text-success"></i>
				<?php if($package->location_count == 0): ?>
					<?php echo e(app('translator')->getFromJson('superadmin::lang.unlimited')); ?>
				<?php else: ?>
					<?php echo e($package->location_count); ?>

				<?php endif; ?>

				<?php echo e(app('translator')->getFromJson('business.business_locations')); ?>
				<hr/>

				<i class="fa fa-check text-success"></i>
				<?php if($package->user_count == 0): ?>
					<?php echo e(app('translator')->getFromJson('superadmin::lang.unlimited')); ?>
				<?php else: ?>
					<?php echo e($package->user_count); ?>

				<?php endif; ?>

				<?php echo e(app('translator')->getFromJson('superadmin::lang.users')); ?>
				<hr/>

				<i class="fa fa-check text-success"></i>
				<?php if($package->product_count == 0): ?>
					<?php echo e(app('translator')->getFromJson('superadmin::lang.unlimited')); ?>
				<?php else: ?>
					<?php echo e($package->product_count); ?>

				<?php endif; ?>

				<?php echo e(app('translator')->getFromJson('superadmin::lang.products')); ?>
				<hr/>

				<i class="fa fa-check text-success"></i>
				<?php if($package->invoice_count == 0): ?>
					<?php echo e(app('translator')->getFromJson('superadmin::lang.unlimited')); ?>
				<?php else: ?>
					<?php echo e($package->invoice_count); ?>

				<?php endif; ?>

				<?php echo e(app('translator')->getFromJson('superadmin::lang.invoices')); ?>
				<hr/>

				<?php if(!empty($package->custom_permissions)): ?>
					<?php $__currentLoopData = $package->custom_permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(isset($permission_formatted[$permission])): ?>
							<i class="fa fa-check text-success"></i>
							<?php echo e($permission_formatted[$permission]); ?>

							<hr/>
						<?php endif; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>

				<?php if($package->trial_days != 0): ?>
					<i class="fa fa-check text-success"></i>
					<?php echo e($package->trial_days); ?> <?php echo e(app('translator')->getFromJson('superadmin::lang.trial_days')); ?>
					<hr/>
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
				<?php if($package->enable_custom_link == 1): ?>
					<a href="<?php echo e($package->custom_link); ?>" class="btn btn-block btn-success"><?php echo e($package->custom_link_text); ?></a>
				<?php else: ?>
					<?php if(isset($action_type) && $action_type == 'register'): ?>
						<a href="<?php echo e(route('business.getRegister')); ?>?package=<?php echo e($package->id); ?>" 
						class="btn btn-block btn-success">
		    				<?php if($package->price != 0): ?>
		    					<?php echo e(app('translator')->getFromJson('superadmin::lang.register_subscribe')); ?>
		    				<?php else: ?>
		    					<?php echo e(app('translator')->getFromJson('superadmin::lang.register_free')); ?>
		    				<?php endif; ?>
	    				</a>
					<?php else: ?>
	    				<a href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\SubscriptionController@pay', [$package->id])); ?>" 
						class="btn btn-block btn-success">
		    				<?php if($package->price != 0): ?>
		    					<?php echo e(app('translator')->getFromJson('superadmin::lang.pay_and_subscribe')); ?>
		    				<?php else: ?>
		    					<?php echo e(app('translator')->getFromJson('superadmin::lang.subscribe')); ?>
		    				<?php endif; ?>
	    				</a>
					<?php endif; ?>
				<?php endif; ?>

    			<?php echo e($package->description); ?>

			</div>
		</div>
		<!-- /.box -->
    </div>
    <?php if($loop->iteration%3 == 0): ?>
    	<div class="clearfix"></div>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>