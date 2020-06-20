<?php $__env->startSection('title', __('lang_v1.sell_payment_report')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(__('lang_v1.sell_payment_report')); ?></h1>
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
                  <?php echo Form::open(['url' => '#', 'method' => 'get', 'id' => 'sell_payment_report_form' ]); ?>

                    <div class="col-md-4">
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
                    <div class="col-md-4">
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
                    <div class="col-md-4">
                        <div class="form-group">

                            <?php echo Form::label('spr_date_filter', __('report.date_range') . ':'); ?>

                            <?php echo Form::text('date_range', null, ['placeholder' => __('lang_v1.select_a_date_range'), 'class' => 'form-control', 'id' => 'spr_date_filter', 'readonly']);; ?>

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
                    <table class="table table-bordered table-striped" 
                    id="sell_payment_report_table">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th><?php echo e(app('translator')->getFromJson('purchase.ref_no')); ?></th>
                                <th><?php echo e(app('translator')->getFromJson('lang_v1.paid_on')); ?></th>
                                <th><?php echo e(app('translator')->getFromJson('sale.amount')); ?></th>
                                <th><?php echo e(app('translator')->getFromJson('contact.customer')); ?></th>
                                <th><?php echo e(app('translator')->getFromJson('lang_v1.payment_method')); ?></th>
                                <th><?php echo e(app('translator')->getFromJson('sale.sale')); ?></th>
                                <th><?php echo e(app('translator')->getFromJson('messages.action')); ?></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-gray font-17 footer-total text-center">
                                <td colspan="3"><strong><?php echo e(app('translator')->getFromJson('sale.total')); ?>:</strong></td>
                                <td><span class="display_currency" id="footer_total_amount" data-currency_symbol ="true"></span></td>
                                <td colspan="4"></td>
                            </tr>
                        </tfoot>
                    </table>
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
    <script src="<?php echo e(asset('js/payment.js?v=' . $asset_v)); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>