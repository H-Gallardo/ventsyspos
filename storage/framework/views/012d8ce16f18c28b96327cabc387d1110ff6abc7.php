<?php $__env->startSection('title', __('expense.expense_categories')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(app('translator')->getFromJson( 'expense.expense_categories' )); ?>
        <small><?php echo e(app('translator')->getFromJson( 'expense.manage_your_expense_categories' )); ?></small>
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
        	<h3 class="box-title"><?php echo e(app('translator')->getFromJson( 'expense.all_your_expense_categories' )); ?></h3>
        	<div class="box-tools">
                <button type="button" class="btn btn-block btn-primary btn-modal" 
                	data-href="<?php echo e(action('ExpenseCategoryController@create')); ?>" 
                	data-container=".expense_category_modal">
                	<i class="fa fa-plus"></i> <?php echo e(app('translator')->getFromJson( 'messages.add' )); ?></button>
            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive">
        	<table class="table table-bordered table-striped" id="expense_category_table">
        		<thead>
        			<tr>
        				<th><?php echo e(app('translator')->getFromJson( 'expense.category_name' )); ?></th>
        				<th><?php echo e(app('translator')->getFromJson( 'expense.category_code' )); ?></th>
                        <th><?php echo e(app('translator')->getFromJson( 'messages.action' )); ?></th>
        			</tr>
        		</thead>
        	</table>
            </div>
        </div>
    </div>

    <div class="modal fade expense_category_modal" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
    </div>

</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>