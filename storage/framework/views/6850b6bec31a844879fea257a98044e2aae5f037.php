<?php $__env->startSection('title', __('restaurant.table_report')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(__('restaurant.table_report')); ?></h1>
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
                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo Form::label('tr_location_id',  __('purchase.business_location') . ':'); ?>

                            <?php echo Form::select('tr_location_id', $business_locations, null, ['class' => 'form-control select2', 'style' => 'width:100%']);; ?>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo Form::label('tr_date_range', __('report.date_range') . ':'); ?>

                            <?php echo Form::text('date_range', \Carbon::createFromTimestamp(strtotime('first day of this month'))->format(session('business.date_format')) . ' ~ ' . \Carbon::createFromTimestamp(strtotime('last day of this month'))->format(session('business.date_format')), ['placeholder' => __('lang_v1.select_a_date_range'), 'class' => 'form-control', 'id' => 'tr_date_range', 'readonly']);; ?>

                        </div>
                    </div>
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
                    <table class="table table-bordered table-striped" id="table_report">
                        <thead>
                            <tr>
                                <th><?php echo e(app('translator')->getFromJson('restaurant.table')); ?></th>
                                <th><?php echo e(app('translator')->getFromJson('report.total_sell')); ?></th>
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
    
    <script type="text/javascript">
        $(document).ready(function(){
            if($('#tr_date_range').length == 1){
                $('#tr_date_range').daterangepicker({
                    ranges: ranges,
                    autoUpdateInput: false,
                    startDate: moment().startOf('month'),
                    endDate: moment().endOf('month'),
                    locale: {
                        format: moment_date_format
                    }
                });
                $('#tr_date_range').on('apply.daterangepicker', function(ev, picker) {
                    $(this).val(picker.startDate.format(moment_date_format) + ' ~ ' + picker.endDate.format(moment_date_format));
                    table_report.ajax.reload();
                });

                $('#tr_date_range').on('cancel.daterangepicker', function(ev, picker) {
                    $(this).val('');
                    table_report.ajax.reload();
                });
            }

            table_report = $('#table_report').DataTable({
                            processing: true,
                            serverSide: true,
                            "ajax": {
                                "url": "/reports/table-report",
                                "data": function ( d ) {
                                    d.location_id = $('#tr_location_id').val();
                                    d.start_date = $('#tr_date_range').data('daterangepicker').startDate.format('YYYY-MM-DD');
                                    d.end_date = $('#tr_date_range').data('daterangepicker').endDate.format('YYYY-MM-DD');
                                }
                            },
                            columns: [
                                {data: 'table', name: 'res_tables.name'},
                                {data: 'total_sell', name: 'total_sell', searchable: false}
                            ],
                            "fnDrawCallback": function (oSettings) {
                                __currency_convert_recursively($('#table_report'));
                            }
                        });
            //Customer Group report filter
            $('select#tr_location_id, #tr_date_range').change( function(){
                table_report.ajax.reload();
            });
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>