<?php $__env->startSection('title', __('report.register_report')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(__('report.register_report')); ?></h1>
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
                  <?php echo Form::open(['url' => action('ReportController@getStockReport'), 'method' => 'get', 'id' => 'register_report_filter_form' ]); ?>

                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo Form::label('register_user_id',  __('report.user') . ':'); ?>

                            <?php echo Form::select('register_user_id', $users, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('report.all_users')]);; ?>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo Form::label('register_status',  __('sale.status') . ':'); ?>

                            <?php echo Form::select('register_status', ['open' => __('cash_register.open'), 'close' => __('cash_register.close')], null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('report.all')]);; ?>

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
                    <table class="table table-bordered table-striped" id="register_report_table">
                        <thead>
                            <tr>
                                <th><?php echo e(app('translator')->getFromJson('report.open_time')); ?></th>
                                <th><?php echo e(app('translator')->getFromJson('report.close_time')); ?></th>
                                <th><?php echo e(app('translator')->getFromJson('report.user')); ?></th>
                                <th><?php echo e(app('translator')->getFromJson('cash_register.total_card_slips')); ?></th>
                                <th><?php echo e(app('translator')->getFromJson('cash_register.total_cheques')); ?></th>
                                <th><?php echo e(app('translator')->getFromJson('cash_register.total_cash')); ?></th>
                                <th><?php echo e(app('translator')->getFromJson('messages.action')); ?></th>
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
<div class="modal fade view_register" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script src="<?php echo e(asset('js/report.js?v=' . $asset_v)); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>