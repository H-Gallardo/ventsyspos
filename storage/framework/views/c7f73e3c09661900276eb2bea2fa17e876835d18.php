<?php $__env->startSection('title', __('report.stock_expiry_report')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(__('report.stock_expiry_report')); ?></h1>
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
                  <?php echo Form::open(['url' => action('ReportController@getStockExpiryReport'), 'method' => 'get', 'id' => 'stock_report_filter_form' ]); ?>

                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo Form::label('location_id',  __('purchase.business_location') . ':'); ?>

                            <?php echo Form::select('location_id', $business_locations, null, ['class' => 'form-control select2', 'style' => 'width:100%']);; ?>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo Form::label('category_id','Category:'); ?>

                            <?php echo Form::select('category', $categories, null, ['placeholder' => 'All', 'class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'category_id']);; ?>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo Form::label('sub_category_id','Sub Category:'); ?>

                            <?php echo Form::select('sub_category', array(), null, ['placeholder' => 'All', 'class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'sub_category_id']);; ?>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo Form::label('brand','Brand:'); ?>

                            <?php echo Form::select('brand', $brands, null, ['placeholder' => 'All', 'class' => 'form-control select2', 'style' => 'width:100%']);; ?>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo Form::label('unit','Unit:'); ?>

                            <?php echo Form::select('unit', $units, null, ['placeholder' => 'All', 'class' => 'form-control select2', 'style' => 'width:100%']);; ?>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo Form::label('view_stock_filter', __('report.view_stocks') . ':'); ?>

                            <?php echo Form::select('view_stock_filter', $view_stock_filter, null, ['placeholder' => __('messages.all'), 'class' => 'form-control select2', 'style' => 'width:100%']);; ?>

                        </div>
                    </div>
                    <?php echo Form::close(); ?>

                </div>
              </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="stock_expiry_report_table">
                        <thead>
                            <tr>
                                <th><?php echo e(app('translator')->getFromJson('business.product')); ?></th>
                                <th>SKU</th>
                                <th><?php echo e(app('translator')->getFromJson('purchase.ref_no')); ?></th>
                                <th><?php echo e(app('translator')->getFromJson('business.location')); ?></th>
                                <th><?php echo e(app('translator')->getFromJson('report.stock_left')); ?></th>
                                <th><?php echo e(app('translator')->getFromJson('lang_v1.lot_number')); ?></th>
                                <th><?php echo e(app('translator')->getFromJson('product.exp_date')); ?></th>
                                <th><?php echo e(app('translator')->getFromJson('product.mfg_date')); ?></th>
                                <th><?php echo e(app('translator')->getFromJson('messages.edit')); ?></th>
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

<div class="modal fade exp_update_modal" tabindex="-1" role="dialog">
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script src="<?php echo e(asset('js/report.js?v=' . $asset_v)); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>