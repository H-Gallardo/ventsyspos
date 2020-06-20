<?php $__env->startSection('title', __( 'report.stock_adjustment_report' )); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->getFromJson( 'report.stock_adjustment_report' ); ?>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-3 col-md-offset-7 col-xs-6">
            <div class="input-group">
                <span class="input-group-addon bg-light-blue"><i class="fa fa-map-marker"></i></span>
                 <select class="form-control select2" id="stock_adjustment_location_filter">
                    <?php $__currentLoopData = $business_locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <div class="col-md-2 col-xs-6">
            <div class="form-group pull-right">
                <div class="input-group">
                  <button type="button" class="btn btn-primary" id="stock_adjustment_date_filter">
                    <span>
                      <i class="fa fa-calendar"></i> <?php echo e(__('messages.filter_by_date')); ?>

                    </span>
                    <i class="fa fa-caret-down"></i>
                  </button>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-6">
            <div class="box box-solid">
                <div class="box-body">
                    <table class="table no-border">
                        <tr>
                            <th><?php echo e(__('report.total_normal')); ?>:</th>
                            <td>
                                <span class="total_normal">
                                    <i class="fa fa-refresh fa-spin fa-fw"></i>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th><?php echo e(__('report.total_abnormal')); ?>:</th>
                            <td>
                                 <span class="total_abnormal">
                                    <i class="fa fa-refresh fa-spin fa-fw"></i>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th><?php echo e(__('report.total_stock_adjustment')); ?>:</th>
                            <td>
                                <span class="total_amount">
                                    <i class="fa fa-refresh fa-spin fa-fw"></i>
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="box box-solid">
                <div class="box-body">
                    <table class="table no-border">
                        <tr>
                            <th><?php echo e(__('report.total_recovered')); ?>:</th>
                            <td>
                                 <span class="total_recovered">
                                    <i class="fa fa-refresh fa-spin fa-fw"></i>
                                </span>
                            </td>
                        </tr>
                        <tr><td>&nbsp;</td></tr>
                        <tr><td>&nbsp;</td></tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo e(__('stock_adjustment.stock_adjustments')); ?> 
                </div>

                <div class="box-body">
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="stock_adjustment_table">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->getFromJson('messages.date'); ?></th>
                                <th><?php echo app('translator')->getFromJson('purchase.ref_no'); ?></th>
                                <th><?php echo app('translator')->getFromJson('business.location'); ?></th>
                                <th><?php echo app('translator')->getFromJson('stock_adjustment.adjustment_type'); ?></th>
                                <th><?php echo app('translator')->getFromJson('stock_adjustment.total_amount'); ?></th>
                                <th><?php echo app('translator')->getFromJson('stock_adjustment.total_amount_recovered'); ?></th>
                                <th><?php echo app('translator')->getFromJson('stock_adjustment.reason_for_stock_adjustment'); ?></th>
                                <th><?php echo app('translator')->getFromJson('messages.action'); ?></th>
                            </tr>
                        </thead>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
	

</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script src="<?php echo e(asset('js/stock_adjustment.js?v=' . $asset_v)); ?>"></script>
<script src="<?php echo e(asset('js/report.js?v=' . $asset_v)); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>