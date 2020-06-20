<?php $__env->startSection('title', __('report.reports')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(__('report.customer')); ?> & <?php echo e(__('report.supplier')); ?> <?php echo e(__('report.reports')); ?></h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">

	<div class="box">
        
        <div class="box-body">
            <div class="table-responsive">
        	<table class="table table-bordered table-striped" id="supplier_report_tbl">
        		<thead>
        			<tr>
        				<th><?php echo e(app('translator')->getFromJson('report.contact')); ?></th>
        				<th><?php echo e(app('translator')->getFromJson('report.total_purchase')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('lang_v1.total_purchase_return')); ?></th>
        				<th><?php echo e(app('translator')->getFromJson('report.total_sell')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('lang_v1.total_sell_return')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('lang_v1.opening_balance_due')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('report.total_due')); ?> &nbsp;&nbsp;<i class="fa fa-info-circle text-info" data-toggle="tooltip" data-placement="bottom" data-html="true" data-original-title="<?php echo e(__('messages.due_tooltip')); ?>" aria-hidden="true"></i></th>
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
    <script src="<?php echo e(asset('js/report.js?v=' . $asset_v)); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>