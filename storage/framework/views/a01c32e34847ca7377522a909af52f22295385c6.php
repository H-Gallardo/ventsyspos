<?php $__env->startSection('title', __('stock_adjustment.stock_adjustments')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(app('translator')->getFromJson('stock_adjustment.stock_adjustments')); ?>
        <small></small>
    </h1>
</section>

<!-- Main content -->
<section class="content">

	<div class="box">
        <div class="box-header">
        	<h3 class="box-title"><?php echo e(app('translator')->getFromJson('stock_adjustment.all_stock_adjustments')); ?></h3>
            <div class="box-tools">
                <a class="btn btn-block btn-primary" href="<?php echo e(action('StockAdjustmentController@create')); ?>">
                <i class="fa fa-plus"></i> <?php echo e(app('translator')->getFromJson('messages.add')); ?></a>
            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive">
        	<table class="table table-bordered table-striped" id="stock_adjustment_table">
        		<thead>
        			<tr>
        				<th><?php echo e(app('translator')->getFromJson('messages.date')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('purchase.ref_no')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('business.location')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('stock_adjustment.adjustment_type')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('stock_adjustment.total_amount')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('stock_adjustment.total_amount_recovered')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('stock_adjustment.reason_for_stock_adjustment')); ?></th>
						<th><?php echo e(app('translator')->getFromJson('messages.action')); ?></th>
        			</tr>
        		</thead>
        	</table>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
	<script src="<?php echo e(asset('js/stock_adjustment.js?v=' . $asset_v)); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>