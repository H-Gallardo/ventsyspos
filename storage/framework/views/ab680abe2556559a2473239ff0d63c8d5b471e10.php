<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('superadmin')): ?>
	<li class="bg-red treeview <?php echo e(in_array($request->segment(1), ['superadmin']) ? 'active active-sub' : ''); ?>">
	    <a href="#">
	        <i class="fa fa-bank"></i>
	        <span class="title"><?php echo e(app('translator')->getFromJson('superadmin::lang.superadmin')); ?></span>
	        <span class="pull-right-container">
	            <i class="fa fa-angle-left pull-right"></i>
	        </span>
	    </a>

	    <ul class="treeview-menu">
			<li class="<?php echo e(empty($request->segment(2)) ? 'active active-sub' : ''); ?>">
				<a href="-<?php echo e(action('\Modules\Superadmin\Http\Controllers\SuperadminController@index')); ?>">
					<i class="fa fa-bank"></i>
					<span class="title">
						<?php echo e(app('translator')->getFromJson('superadmin::lang.superadmin')); ?>
					</span>
			  	</a>
			</li>

			<li class="<?php echo e($request->segment(2) == 'business' ? 'active active-sub' : ''); ?>">
				<a href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\BusinessController@index')); ?>">
					<i class="fa fa-bank"></i>
					<span class="title">
						<?php echo e(app('translator')->getFromJson('superadmin::lang.all_business')); ?>
					</span>
			  	</a>
			</li>
			<!-- superadmin subscription -->
			<li class="<?php echo e($request->segment(2) == 'superadmin-subscription' ? 'active active-sub' : ''); ?>">
			<a href = "<?php echo e(action('\Modules\Superadmin\Http\Controllers\SuperadminSubscriptionsController@index')); ?>"><i class="fa fa-refresh"></i>
			<span class="title"><?php echo e(app('translator')->getFromJson('superadmin::lang.subscription')); ?></span>
			</a>
			</li>

			<li class="<?php echo e($request->segment(2) == 'packages' ? 'active active-sub' : ''); ?>">
				<a href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\PackagesController@index')); ?>">
					<i class="fa fa-credit-card"></i>
					<span class="title">
						<?php echo e(app('translator')->getFromJson('superadmin::lang.subscription_packages')); ?>
					</span>
			  	</a>
			</li>

			<li class="<?php echo e($request->segment(2) == 'settings' ? 'active active-sub' : ''); ?>">
				<a href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\SuperadminSettingsController@edit')); ?>">
					<i class="fa fa-cogs"></i>
					<span class="title">
						<?php echo e(app('translator')->getFromJson('superadmin::lang.super_admin_settings')); ?>
					</span>
			  	</a>
			</li>

			<li class="<?php echo e($request->segment(2) == 'communicator' ? 'active active-sub' : ''); ?>">
				<a href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\CommunicatorController@index')); ?>">
					<i class="fa fa-envelope"></i>
					<span class="title">
						<?php echo e(app('translator')->getFromJson('superadmin::lang.communicator')); ?>
					</span>
			  	</a>
			</li>

        </ul>
	</li>
<?php endif; ?>