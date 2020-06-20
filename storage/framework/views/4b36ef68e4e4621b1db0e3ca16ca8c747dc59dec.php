<?php $__env->startSection('title', __( 'report.purchase_sell' )); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(app('translator')->getFromJson( 'report.purchase_sell' )); ?>
        <small><?php echo e(app('translator')->getFromJson( 'report.purchase_sell_msg' )); ?></small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="print_section"><h2><?php echo e(session()->get('business.name')); ?> - <?php echo e(app('translator')->getFromJson( 'report.purchase_sell' )); ?></h2></div>
    <div class="row no-print">
        <div class="col-md-3 col-md-offset-7 col-xs-6">
            <div class="input-group">
                <span class="input-group-addon bg-light-blue"><i class="fa fa-map-marker"></i></span>
                 <select class="form-control select2" id="purchase_sell_location_filter">
                    <?php $__currentLoopData = $business_locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <div class="col-md-2 col-xs-6">
            <div class="form-group pull-right">
                <div class="input-group">
                  <button type="button" class="btn btn-primary" id="purchase_sell_date_filter">
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
        <div class="col-xs-6">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo e(__('purchase.purchases')); ?></h3>
                </div>

                <div class="box-body">
                    <table class="table table-striped">
                        <tr>
                            <th><?php echo e(__('report.total_purchase')); ?>:</th>
                            <td>
                                <span class="total_purchase">
                                    <i class="fa fa-refresh fa-spin fa-fw"></i>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th><?php echo e(__('report.purchase_inc_tax')); ?>:</th>
                            <td>
                                 <span class="purchase_inc_tax">
                                    <i class="fa fa-refresh fa-spin fa-fw"></i>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th><?php echo e(__('lang_v1.total_purchase_return_inc_tax')); ?>:</th>
                            <td>
                                 <span class="purchase_return_inc_tax">
                                    <i class="fa fa-refresh fa-spin fa-fw"></i>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th><?php echo e(__('report.purchase_due')); ?>: <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.purchase_due') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></th>
                            <td>
                                 <span class="purchase_due">
                                    <i class="fa fa-refresh fa-spin fa-fw"></i>
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-xs-6">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo e(__('sale.sells')); ?></h3>
                </div>

                <div class="box-body">
                    <table class="table table-striped">
                        <tr>
                            <th><?php echo e(__('report.total_sell')); ?>:</th>
                            <td>
                                <span class="total_sell">
                                    <i class="fa fa-refresh fa-spin fa-fw"></i>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th><?php echo e(__('report.sell_inc_tax')); ?>:</th>
                            <td>
                                 <span class="sell_inc_tax">
                                    <i class="fa fa-refresh fa-spin fa-fw"></i>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th><?php echo e(__('lang_v1.total_sell_return_inc_tax')); ?>:</th>
                            <td>
                                 <span class="total_sell_return">
                                    <i class="fa fa-refresh fa-spin fa-fw"></i>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th><?php echo e(__('report.sell_due')); ?>: <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.sell_due') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></th>
                            <td>
                                <span class="sell_due">
                                    <i class="fa fa-refresh fa-spin fa-fw"></i>
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo e(__('lang_v1.purchase_sell_report_formula')); ?>  <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.over_all_sell_purchase') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></h3>
                </div>

                <div class="box-body">

                    <h3 class="text-muted">
                        <?php echo e(__('report.sell_minus_purchase')); ?>: 
                        <span class="sell_minus_purchase">
                            <i class="fa fa-refresh fa-spin fa-fw"></i>
                        </span>
                    </h3>

                    <h3 class="text-muted">
                        <?php echo e(__('report.difference_due')); ?>: 
                        <span class="difference_due">
                            <i class="fa fa-refresh fa-spin fa-fw"></i>
                        </span>
                    </h3>

                </div>
            </div>
        </div>
    </div>
    <div class="row no-print">
        <div class="col-sm-12">
            <button type="button" class="btn btn-primary pull-right" 
            aria-label="Print" onclick="window.print();"
            ><i class="fa fa-print"></i> <?php echo e(app('translator')->getFromJson( 'messages.print' )); ?></button>
        </div>
    </div>
	

</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script src="<?php echo e(asset('js/report.js?v=' . $asset_v)); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>