<?php $__env->startSection('title', __('report.trending_products')); ?>

<?php $__env->startSection('css'); ?>
    <?php echo Charts::styles(['highcharts']); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(__('report.trending_products')); ?></h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row no-print">
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
                  <?php echo Form::open(['url' => action('ReportController@getTrendingProducts'), 'method' => 'get' ]); ?>

                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo Form::label('location_id',  __('purchase.business_location') . ':'); ?>

                            <?php echo Form::select('location_id', $business_locations, null, ['class' => 'form-control select2', 'style' => 'width:100%']);; ?>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo Form::label('category_id', __('product.category') . ':'); ?>

                            <?php echo Form::select('category', $categories, null, ['placeholder' => __('messages.all'), 'class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'category_id']);; ?>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo Form::label('sub_category_id', __('product.sub_category') . ':'); ?>

                            <?php echo Form::select('sub_category', array(), null, ['placeholder' => __('messages.all'), 'class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'sub_category_id']);; ?>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo Form::label('brand', __('product.brand') . ':'); ?>

                            <?php echo Form::select('brand', $brands, null, ['placeholder' => __('messages.all'), 'class' => 'form-control select2', 'style' => 'width:100%']);; ?>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo Form::label('unit', __('product.unit') . ':'); ?>

                            <?php echo Form::select('unit', $units, null, ['placeholder' => __('messages.all'), 'class' => 'form-control select2', 'style' => 'width:100%']);; ?>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo Form::label('trending_product_date_range',__('report.date_range') .  ':'); ?>

                            <?php echo Form::text('date_range', null, ['placeholder' => __('lang_v1.select_a_date_range'), 'class' => 'form-control', 'id' => 'trending_product_date_range', 'readonly']);; ?>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo Form::label('limit', __('lang_v1.no_of_products') . ':'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.no_of_products_for_trending_products') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                            <?php echo Form::number('limit', 5, ['placeholder' => __('lang_v1.no_of_products'), 'class' => 'form-control', 'min' => 1]);; ?>

                        </div>
                    </div>
                    <div class="col-sm-12">
                      <button type="submit" class="btn btn-primary pull-right"><?php echo e(app('translator')->getFromJson('report.apply_filters')); ?></button>
                    </div> 
                    <?php echo Form::close(); ?>

                </div>
              </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-solid">
                <div class="box-header">
                    <h3 class="box-title"><?php echo e(app('translator')->getFromJson('report.top_trending_products')); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.top_trending_products') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></h3>
                </div>
                <div class="box-body">
                    <?php echo $chart->html(); ?>

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
    <?php echo Charts::assets(['highcharts']); ?>

    <?php echo $chart->script(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>