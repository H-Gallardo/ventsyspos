<?php $__env->startSection('title', 'Brands'); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(app('translator')->getFromJson( 'brand.brands' )); ?>
        <small><?php echo e(app('translator')->getFromJson( 'brand.manage_your_brands' )); ?></small>
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
        	<h3 class="box-title"><?php echo e(app('translator')->getFromJson( 'brand.all_your_brands' )); ?></h3>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('brand.create')): ?>
            	<div class="box-tools">
                    <button type="button" class="btn btn-block btn-primary btn-modal" 
                    	data-href="<?php echo e(action('BrandController@create')); ?>" 
                    	data-container=".brands_modal">
                    	<i class="fa fa-plus"></i> <?php echo e(app('translator')->getFromJson( 'messages.add' )); ?></button>
                </div>
            <?php endif; ?>
        </div>
        <div class="box-body">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('brand.view')): ?>
                <div class="table-responsive">
            	<table class="table table-bordered table-striped" id="brands_table">
            		<thead>
            			<tr>
            				<th><?php echo e(app('translator')->getFromJson( 'brand.brands' )); ?></th>
            				<th><?php echo e(app('translator')->getFromJson( 'brand.note' )); ?></th>
            				<th><?php echo e(app('translator')->getFromJson( 'messages.action' )); ?></th>
            			</tr>
            		</thead>
            	</table>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="modal fade brands_modal" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
    </div>

</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>