<?php $__env->startSection('title', __( 'lang_v1.customer_groups' )); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(app('translator')->getFromJson( 'lang_v1.customer_groups' )); ?></h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">

	<div class="box">
        <div class="box-header">
        	<h3 class="box-title"><?php echo e(app('translator')->getFromJson( 'lang_v1.all_your_customer_groups' )); ?></h3>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('lang_v1.create')): ?>
            	<div class="box-tools">
                    <button type="button" class="btn btn-block btn-primary btn-modal" 
                    	data-href="<?php echo e(action('CustomerGroupController@create')); ?>" 
                    	data-container=".customer_groups_modal">
                    	<i class="fa fa-plus"></i> <?php echo e(app('translator')->getFromJson( 'messages.add' )); ?></button>
                </div>
            <?php endif; ?>
        </div>
        <div class="box-body">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('lang_v1.view')): ?>
                <div class="table-responsive">
            	<table class="table table-bordered table-striped" id="customer_groups_table">
            		<thead>
            			<tr>
            				<th><?php echo e(app('translator')->getFromJson( 'lang_v1.customer_group_name' )); ?></th>
            				<th><?php echo e(app('translator')->getFromJson( 'lang_v1.calculation_percentage' )); ?></th>
            				<th><?php echo e(app('translator')->getFromJson( 'messages.action' )); ?></th>
            			</tr>
            		</thead>
            	</table>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="modal fade customer_groups_modal" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
    </div>

</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>