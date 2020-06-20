<div class="pos-tab-content">
	<div class="row">
	<?php if(!empty($modules)): ?>
		<h4><?php echo e(app('translator')->getFromJson('lang_v1.enable_disable_modules')); ?></h4>
		<?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-4">
                <div class="form-group">
                    <div class="checkbox">
                    <br>
                      <label>
                        <?php echo Form::checkbox('enabled_modules[]', $k,  in_array($k, $enabled_modules) , 
                        ['class' => 'input-icheck']);; ?> <?php echo e($v['name']); ?>

                      </label>
                      <?php if(!empty($v['tooltip'])): ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . $v['tooltip'] . '" data-html="true" data-trigger="hover"></i>';
                }
                ?> <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php endif; ?>
	</div>
</div>