<?php $__env->startSection('title', __('lang_v1.stock_transfers')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header no-print">
    <h1><?php echo e(app('translator')->getFromJson('lang_v1.stock_transfers')); ?>
        <small></small>
    </h1>
</section>

<!-- Main content -->
<section class="content no-print">

	<div class="box">
        <div class="box-header">
        	<h3 class="box-title"><?php echo e(app('translator')->getFromJson('lang_v1.all_stock_transfers')); ?></h3>
            <div class="box-tools">
                <a class="btn btn-block btn-primary" href="<?php echo e(action('StockTransferController@create')); ?>">
                <i class="fa fa-plus"></i> <?php echo e(app('translator')->getFromJson('messages.add')); ?></a>
            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive">
        	<table class="table table-bordered table-striped" id="stock_transfer_table">
        		<thead>
        			<tr>
        				<th><?php echo e(app('translator')->getFromJson('messages.date')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('purchase.ref_no')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('lang_v1.location_from')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('lang_v1.location_to')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('lang_v1.shipping_charges')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('stock_adjustment.total_amount')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('purchase.additional_notes')); ?></th>
						<th><?php echo e(app('translator')->getFromJson('messages.action')); ?></th>
        			</tr>
        		</thead>
        	</table>
            </div>
        </div>
    </div>

</section>

<section id="receipt_section" class="print_section"></section>

<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
	<script src="<?php echo e(asset('js/stock_transfer.js?v=' . $asset_v)); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>