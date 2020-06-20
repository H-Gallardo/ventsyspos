<?php $__env->startSection('title', __('lang_v1.product_sell_report')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header no-print">
    <h1><?php echo e(__('lang_v1.product_sell_report')); ?></h1>
</section>

<!-- Main content -->
<section class="content no-print">
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
                  <?php echo Form::open(['url' => action('ReportController@getStockReport'), 'method' => 'get', 'id' => 'product_sell_report_form' ]); ?>

                    <div class="col-md-3">
                        <div class="form-group">
                        <?php echo Form::label('search_product', __('lang_v1.search_product') . ':'); ?>

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-search"></i>
                                </span>
                                <input type="hidden" value="" id="variation_id">
                                <?php echo Form::text('search_product', null, ['class' => 'form-control', 'id' => 'search_product', 'placeholder' => __('lang_v1.search_product_placeholder'), 'autofocus']);; ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo Form::label('customer_id', __('contact.customer') . ':'); ?>

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </span>
                                <?php echo Form::select('customer_id', $customers, null, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'required']);; ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo Form::label('location_id', __('purchase.business_location').':'); ?>

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-map-marker"></i>
                                </span>
                                <?php echo Form::select('location_id', $business_locations, null, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'required']);; ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">

                            <?php echo Form::label('product_sr_date_filter', __('report.date_range') . ':'); ?>

                            <?php echo Form::text('date_range', null, ['placeholder' => __('lang_v1.select_a_date_range'), 'class' => 'form-control', 'id' => 'product_sr_date_filter', 'readonly']);; ?>

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
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#psr_detailed_tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list" aria-hidden="true"></i> <?php echo e(app('translator')->getFromJson('lang_v1.detailed')); ?></a>
                    </li>

                    <li>
                        <a href="#psr_grouped_tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-bars" aria-hidden="true"></i> <?php echo e(app('translator')->getFromJson('lang_v1.grouped')); ?></a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="psr_detailed_tab">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" 
                            id="product_sell_report_table">
                                <thead>
                                    <tr>
                                        <th><?php echo e(app('translator')->getFromJson('sale.product')); ?></th>
                                        <th><?php echo e(app('translator')->getFromJson('sale.customer_name')); ?></th>
                                        <th><?php echo e(app('translator')->getFromJson('sale.invoice_no')); ?></th>
                                        <th><?php echo e(app('translator')->getFromJson('messages.date')); ?></th>
                                        <th><?php echo e(app('translator')->getFromJson('sale.qty')); ?></th>
                                        <th><?php echo e(app('translator')->getFromJson('sale.unit_price')); ?></th>
                                        <th><?php echo e(app('translator')->getFromJson('sale.discount')); ?></th>
                                        <th><?php echo e(app('translator')->getFromJson('sale.tax')); ?></th>
                                        <th><?php echo e(app('translator')->getFromJson('sale.price_inc_tax')); ?></th>
                                        <th><?php echo e(app('translator')->getFromJson('sale.total')); ?></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr class="bg-gray font-17 footer-total text-center">
                                        <td colspan="4"><strong><?php echo e(app('translator')->getFromJson('sale.total')); ?>:</strong></td>
                                        <td id="footer_total_sold"></td>
                                        <td></td>
                                        <td></td>
                                        <td id="footer_tax"></td>
                                        <td></td>
                                        <td><span class="display_currency" id="footer_subtotal" data-currency_symbol ="true"></span></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane" id="psr_grouped_tab">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" 
                            id="product_sell_grouped_report_table" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th><?php echo e(app('translator')->getFromJson('sale.product')); ?></th>
                                        <th><?php echo e(app('translator')->getFromJson('messages.date')); ?></th>
                                        <th><?php echo e(app('translator')->getFromJson('report.current_stock')); ?></th>
                                        <th><?php echo e(app('translator')->getFromJson('report.total_unit_sold')); ?></th>
                                        <th><?php echo e(app('translator')->getFromJson('sale.total')); ?></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr class="bg-gray font-17 footer-total text-center">
                                        <td colspan="3"><strong><?php echo e(app('translator')->getFromJson('sale.total')); ?>:</strong></td>
                                        <td id="footer_total_grouped_sold"></td>
                                        <td><span class="display_currency" id="footer_grouped_subtotal" data-currency_symbol ="true"></span></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
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