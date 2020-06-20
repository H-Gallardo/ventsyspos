<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('subscribe')): ?>
	<li class="<?php echo e($request->segment(1) == 'subscription' ? 'active' : ''); ?>">
		<a href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\SubscriptionController@index')); ?>">
			<i class="fa fa-refresh"></i>
			<span class="title">
				<?php echo e(app('translator')->getFromJson('superadmin::lang.subscription')); ?>
			</span>
		</a>
	</li>
<?php endif; ?>