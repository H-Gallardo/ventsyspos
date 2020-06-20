<?php $request = app('Illuminate\Http\Request'); ?>

<div class="container-fluid">

	<!-- Language changer -->
	<div class="row">
		<div class="col-md-12">
			<div class="header-left-div">
		        <select class="form-control input-sm" id="change_lang">
		            <?php $__currentLoopData = config('constants.langs'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                <option value="<?php echo e($key); ?>" 
		                	<?php if( (empty(request()->lang) && config('app.locale') == $key) 
		                	|| request()->lang == $key): ?> 
		                		selected 
		                	<?php endif; ?>
		                >
		                	<?php echo e($val['full_name']); ?>

		                </option>
		            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		        </select>
	    	</div>
		</div>
	</div>

	<div class="row">
	    <h1 class="text-center  page-header"><?php echo e(config('app.name', 'ultimatePOS')); ?></h1>

        <div class="header-right-div">
        	<?php if(!($request->segment(1) == 'business' && $request->segment(2) == 'register')): ?>

        		<!-- Register Url -->
	        	<?php if(env('ALLOW_REGISTRATION', false)): ?>
	            	<a 
	            		href="<?php echo e(route('business.getRegister')); ?><?php if(!empty(request()->lang)): ?><?php echo e('?lang=' . request()->lang); ?> <?php endif; ?>"
	            		class="" 
	            	><b><?php echo e(__('')); ?></b> <?php echo e(__('')); ?></a>

	            	<!-- pricing url -->
		            <?php if(Route::has('pricing') && config('app.env') != 'demo' && $request->segment(1) != 'pricing'): ?>
	                	<a href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\PricingController@index')); ?>"><?php echo e(app('translator')->getFromJson('superadmin::lang.pricing')); ?></a>
	            	<?php endif; ?>
	            <?php endif; ?>
	        <?php endif; ?>

	        <?php if(!($request->segment(1) == 'business' && $request->segment(2) == 'register') && $request->segment(1) != 'login'): ?>
	        	<?php echo e(__('business.already_registered')); ?> <a href="<?php echo e(action('Auth\LoginController@login')); ?><?php if(!empty(request()->lang)): ?><?php echo e('?lang=' . request()->lang); ?> <?php endif; ?>"><?php echo e(__('business.sign_in')); ?></a>
	        <?php endif; ?>
        </div>
	</div>
</div>