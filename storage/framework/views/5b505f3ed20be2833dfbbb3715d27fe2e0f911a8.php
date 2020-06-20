<?php $__env->startSection('title', __( 'report.tax_report' )); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(app('translator')->getFromJson( 'report.tax_report' )); ?>
        <small><?php echo e(app('translator')->getFromJson( 'report.tax_report_msg' )); ?></small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="print_section"><h2><?php echo e(session()->get('business.name')); ?> - <?php echo e(app('translator')->getFromJson( 'report.tax_report' )); ?></h2></div>
    <div class="row no-print">
        <div class="col-md-12">
            <div class="form-group">
                <div class="input-group pull-right">
                  <button type="button" class="btn btn-primary" id="tax_report_date_filter">
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
                    <h3 class="box-title"><?php echo e(__('report.input_tax')); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.input_tax') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></h3>
                </div>

                <div class="box-body">
                    <div class="input_tax">
                        <i class="fa fa-refresh fa-spin fa-fw"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-6">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo e(__('report.output_tax')); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.output_tax') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></h3>
                </div>

                <div class="box-body">
                    <div class="output_tax">
                        <i class="fa fa-refresh fa-spin fa-fw"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo e(__('report.tax_overall')); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.tax_overall') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></h3>
                </div>

                <div class="box-body">

                    <h3 class="text-muted">
                        <?php echo e(__('lang_v1.output_tax_minus_input_tax')); ?>: 
                        <span class="tax_diff">
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