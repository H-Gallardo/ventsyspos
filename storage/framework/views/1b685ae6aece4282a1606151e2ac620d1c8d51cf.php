<?php $__env->startSection('title', __( 'unit.units' )); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(app('translator')->getFromJson( 'unit.units' )); ?>
        <small><?php echo e(app('translator')->getFromJson( 'unit.manage_your_units' )); ?></small>
    </h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">

	<div class="box">
        <div class="box-header">
        	<h3 class="box-title"><?php echo e(app('translator')->getFromJson( 'unit.all_your_units' )); ?></h3>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('unit.create')): ?>
        	<div class="box-tools">
                <button type="button" class="btn btn-block btn-primary btn-modal" 
                	data-href="<?php echo e(action('UnitController@create')); ?>" 
                	data-container=".unit_modal">
                	<i class="fa fa-plus"></i> <?php echo e(app('translator')->getFromJson( 'messages.add' )); ?></button>
            </div>
            <?php endif; ?>
        </div>
        <div class="box-body">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('unit.view')): ?>
            <div class="table-responsive">
        	<table class="table table-bordered table-striped" id="unit_table">
        		<thead>
        			<tr>
        				<th><?php echo e(app('translator')->getFromJson( 'unit.name' )); ?></th>
        				<th><?php echo e(app('translator')->getFromJson( 'unit.short_name' )); ?></th>
        				<th><?php echo e(app('translator')->getFromJson( 'unit.allow_decimal' )); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.unit_allow_decimal') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></th>
                        <th><?php echo e(app('translator')->getFromJson( 'messages.action' )); ?></th>
        			</tr>
        		</thead>
        	</table>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="modal fade unit_modal" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
    </div>

</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>