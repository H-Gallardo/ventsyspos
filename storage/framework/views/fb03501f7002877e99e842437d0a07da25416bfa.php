<?php $__env->startSection('title', __('report.sales_representative')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(__('report.sales_representative')); ?></h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary" id="accordion">
              <div class="box-header with-border">
                <h3 class="box-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseFilter">
                    <i class="fa fa-filter" aria-hidden="true"></i> <?php echo e(app('translator')->getFromJson('report.filters')); ?>
                  </a>
                </h3>
              </div>
              <div id="collapseFilter" class="panel-collapse active collapse in" aria-expanded="true">
                <div class="box-body">
                  <?php echo Form::open(['url' => action('ReportController@getStockReport'), 'method' => 'get', 'id' => 'sales_representative_filter_form' ]); ?>

                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo Form::label('sr_id',  __('report.user') . ':'); ?>

                            <?php echo Form::select('sr_id', $users, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('report.all_users')]);; ?>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo Form::label('sr_business_id',  __('business.business_location') . ':'); ?>

                            <?php echo Form::select('sr_business_id', $business_locations, null, ['class' => 'form-control select2', 'style' => 'width:100%']);; ?>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">

                            <?php echo Form::label('sr_date_filter', __('report.date_range') . ':'); ?>

                            <?php echo Form::text('date_range', null, ['placeholder' => __('lang_v1.select_a_date_range'), 'class' => 'form-control', 'id' => 'sr_date_filter', 'readonly']);; ?>

                        </div>
                    </div>

                    <?php echo Form::close(); ?>

                </div>
              </div>
            </div>
        </div>
    </div>

    <!-- Summary -->
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo e(__('report.summary')); ?></h3>
                </div>

                <div class="box-body">
                    <h3 class="text-muted">
                        <?php echo e(__('report.total_sell')); ?>: 
                        <span id="sr_total_sales">
                            <i class="fa fa-refresh fa-spin fa-fw"></i>
                        </span>
                    </h3>
                    <div class="hide" id="total_commission_div">
                        <h3 class="text-muted">
                            <?php echo e(__('lang_v1.total_sale_commission')); ?>: 
                            <span id="sr_total_commission">
                                <i class="fa fa-refresh fa-spin fa-fw"></i>
                            </span>
                        </h3>
                    </div>
                    <h3 class="text-muted">
                        <?php echo e(__('report.total_expense')); ?>: 
                        <span id="sr_total_expenses">
                            <i class="fa fa-refresh fa-spin fa-fw"></i>
                        </span>
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#sr_sales_tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-cog" aria-hidden="true"></i> <?php echo e(app('translator')->getFromJson('lang_v1.sales_added')); ?></a>
                    </li>

                    <li>
                        <a href="#sr_commission_tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-cog" aria-hidden="true"></i> <?php echo e(app('translator')->getFromJson('lang_v1.sales_with_commission')); ?></a>
                    </li>

                    <li>
                        <a href="#sr_expenses_tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-cog" aria-hidden="true"></i> <?php echo e(app('translator')->getFromJson('expense.expenses')); ?></a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="sr_sales_tab">
                        <?php echo $__env->make('report.partials.sales_representative_sales', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>

                    <div class="tab-pane" id="sr_commission_tab">
                        <?php echo $__env->make('report.partials.sales_representative_commission', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>

                    <div class="tab-pane" id="sr_expenses_tab">
                        <?php echo $__env->make('report.partials.sales_representative_expenses', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>
<!-- /.content -->
<div class="modal fade view_register" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script src="<?php echo e(asset('js/report.js?v=' . $asset_v)); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>