<?php
    if(!empty(request()->lang)){
        \App::setLocale(request()->lang);
    }
?>

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
	                	<?php echo e($val); ?>

	                </option>
	            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	        </select>
    	</div>
	</div>
</div>