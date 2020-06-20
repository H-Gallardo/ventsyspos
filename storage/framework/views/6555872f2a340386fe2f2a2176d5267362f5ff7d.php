<?php $__env->startSection('title', __('superadmin::lang.superadmin') . ' | ' . __('superadmin::lang.packages')); ?>

<?php $__env->startSection('content'); ?>


<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(app('translator')->getFromJson('superadmin::lang.packages')); ?> <small><?php echo e(app('translator')->getFromJson('superadmin::lang.add_package')); ?></small></h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">

	<!-- Page level currency setting -->
	<input type="hidden" id="p_code" value="<?php echo e($currency->code); ?>">
	<input type="hidden" id="p_symbol" value="<?php echo e($currency->symbol); ?>">
	<input type="hidden" id="p_thousand" value="<?php echo e($currency->thousand_separator); ?>">
	<input type="hidden" id="p_decimal" value="<?php echo e($currency->decimal_separator); ?>">

	<?php echo Form::open(['url' => action('\Modules\Superadmin\Http\Controllers\PackagesController@store'), 'method' => 'post', 'id' => 'add_package_form']); ?>


	<div class="box box-solid">
		<div class="box-body">
			<div class="row">
				
				<div class="col-sm-6">
					<div class="form-group">
						<?php echo Form::label('name', __('messages.name').':'); ?>

						<?php echo Form::text('name', null, ['class' => 'form-control', 'required']);; ?>

					</div>
				</div>

				<div class="col-sm-6">
					<div class="form-group">
						<?php echo Form::label('description', __('superadmin::lang.description').':'); ?>

						<?php echo Form::text('description', null, ['class' => 'form-control']);; ?>

					</div>
				</div>

				<div class="clearfix"></div>
				<div class="col-sm-6">
					<div class="form-group">
						<?php echo Form::label('location_count', __('superadmin::lang.location_count').':'); ?>

						<?php echo Form::number('location_count', null, ['class' => 'form-control', 'required', 'min' => 0]);; ?>


						<span class="help-block">
							<?php echo e(app('translator')->getFromJson('superadmin::lang.infinite_help')); ?>
						</span>
					</div>
				</div>

				<div class="col-sm-6">
					<div class="form-group">
						<?php echo Form::label('user_count', __('superadmin::lang.user_count').':'); ?>

						<?php echo Form::number('user_count', null, ['class' => 'form-control', 'required', 'min' => 0]);; ?>


						<span class="help-block">
							<?php echo e(app('translator')->getFromJson('superadmin::lang.infinite_help')); ?>
						</span>
					</div>
				</div>
				<div class="clearfix"></div>

				<div class="col-sm-6">
					<div class="form-group">
						<?php echo Form::label('product_count', __('superadmin::lang.product_count').':'); ?>

						<?php echo Form::number('product_count', null, ['class' => 'form-control', 'required', 'min' => 0]);; ?>


						<span class="help-block">
							<?php echo e(app('translator')->getFromJson('superadmin::lang.infinite_help')); ?>
						</span>
					</div>
				</div>

				<div class="col-sm-6">
					<div class="form-group">
						<?php echo Form::label('invoice_count', __('superadmin::lang.invoice_count').':'); ?>

						<?php echo Form::number('invoice_count', null, ['class' => 'form-control', 'required', 'min' => 0]);; ?>


						<span class="help-block">
							<?php echo e(app('translator')->getFromJson('superadmin::lang.infinite_help')); ?>
						</span>
					</div>
				</div>
				<div class="clearfix"></div>

				<div class="col-sm-6">
					<div class="form-group">
						<?php echo Form::label('interval', __('superadmin::lang.interval').':'); ?>


						<?php echo Form::select('interval', $intervals, null, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'required']);; ?>

					</div>
				</div>

				<div class="col-sm-6">
					<div class="form-group">
						<?php echo Form::label('interval_count	', __('superadmin::lang.interval_count').':'); ?>

						<?php echo Form::number('interval_count', null, ['class' => 'form-control', 'required', 'min' => 1]);; ?>

					</div>
				</div>
				<div class="clearfix"></div>

				<div class="col-sm-6">
					<div class="form-group">
						<?php echo Form::label('trial_days	', __('superadmin::lang.trial_days').':'); ?>

						<?php echo Form::number('trial_days', null, ['class' => 'form-control', 'required', 'min' => 0]);; ?>

					</div>
				</div>

				<div class="col-sm-6">
					<div class="form-group">
						<?php echo Form::label('price', __('superadmin::lang.price').':'); ?>

						<?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('superadmin::lang.tooltip_pkg_price') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>

						<div class="input-group">
							<span class="input-group-addon" id="basic-addon3"><b><?php echo e($currency->code); ?> <?php echo e($currency->symbol); ?></b></span>
							<?php echo Form::text('price', null, ['class' => 'form-control input_number', 'required']);; ?>

						</div>
						<span class="help-block">
							0 = <?php echo e(app('translator')->getFromJson('superadmin::lang.free_package')); ?>
						</span>
					</div>
				</div>
				<div class="clearfix"></div>

				<div class="col-sm-6">
					<div class="form-group">
						<?php echo Form::label('sort_order	', __('superadmin::lang.sort_order').':'); ?>

						<?php echo Form::number('sort_order', 1, ['class' => 'form-control', 'required']);; ?>

					</div>
				</div>

				<div class="clearfix"></div>
				<div class="col-sm-6">
					<div class="checkbox">
					<label>
						<?php echo Form::checkbox('is_private', 1, false, ['class' => 'input-icheck']);; ?>

                        <?php echo e(__('superadmin::lang.private_superadmin_only')); ?>

					</label>
					</div>
				</div>

				<div class="col-sm-6">
					<div class="checkbox">
					<label>
						<?php echo Form::checkbox('is_one_time', 1, false, ['class' => 'input-icheck']);; ?>

                        <?php echo e(__('superadmin::lang.one_time_only_subscription')); ?>

					</label>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="col-sm-4">
					<div class="checkbox">
					<label>
						<?php echo Form::checkbox('enable_custom_link', 1, false, ['class' => 'input-icheck', 'id' => 'enable_custom_link']);; ?>

                        <?php echo e(__('superadmin::lang.enable_custom_subscription_link')); ?>

					</label>
					</div>
				</div>
				<div id="custom_link_div" class="hide">
					<div class="col-sm-4">
						<div class="form-group">
							<?php echo Form::label('custom_link', __('superadmin::lang.custom_link').':'); ?>

							<?php echo Form::text('custom_link', null, ['class' => 'form-control']);; ?>

						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<?php echo Form::label('custom_link_text', __('superadmin::lang.custom_link_text').':'); ?>

							<?php echo Form::text('custom_link_text', null, ['class' => 'form-control']);; ?>

						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				<?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module => $module_permissions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php $__currentLoopData = $module_permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="col-sm-3">
						<div class="checkbox">
						<label>
							<?php echo Form::checkbox("custom_permissions[$permission[name]]", 1, $permission['default'], ['class' => 'input-icheck']);; ?>

	                        <?php echo e($permission['label']); ?>

						</label>
						</div>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

				<div class="col-sm-3">
					<div class="checkbox">
					<label>
						<?php echo Form::checkbox('is_active', 1, true, ['class' => 'input-icheck']);; ?>

                        <?php echo e(__('superadmin::lang.is_active')); ?>

					</label>
					</div>
				</div>

				
			</div>

			<div class="row">
				<div class="col-sm-12">
					<button type="submit" class="btn btn-primary pull-right btn-flat"><?php echo e(app('translator')->getFromJson('messages.save')); ?></button>
				</div>
			</div>

		</div>
	</div>

	<?php echo Form::close(); ?>

</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
	<script type="text/javascript">
		$(document).ready(function(){
			$('form#add_package_form').validate();
		});
		$('#enable_custom_link').on('ifChecked', function(event){
		   $("div#custom_link_div").removeClass('hide');
		});
		$('#enable_custom_link').on('ifUnchecked', function(event){
		   $("div#custom_link_div").addClass('hide');
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>