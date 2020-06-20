<?php $__env->startSection('title', __('lang_v1.customer_groups_report')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(__('lang_v1.customer_groups_report')); ?></h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary" id="accordion">
              <div class="box-header with-border">
                <h3 class="box-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseFilter">
                    <i class="fa fa-filter" aria-hidden="true"></i> <?php echo app('translator')->getFromJson('report.filters'); ?>
                  </a>
                </h3>
              </div>
              <div id="collapseFilter" class="panel-collapse active collapse in" aria-expanded="true">
                <div class="box-body">
                  <?php echo Form::open(['url' => action('ReportController@getCustomerGroup'), 'method' => 'get', 'id' => 'cg_report_filter_form' ]); ?>


                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo Form::label('cg_customer_group_id', __( 'lang_v1.customer_group_name' ) . ':'); ?>

                            <?php echo Form::select('cg_customer_group_id', $customer_group, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'cg_customer_group_id']);; ?>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo Form::label('cg_location_id',  __('purchase.business_location') . ':'); ?>

                            <?php echo Form::select('cg_location_id', $business_locations, null, ['class' => 'form-control select2', 'style' => 'width:100%']);; ?>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo Form::label('cg_date_range', __('report.date_range') . ':'); ?>

                            <?php echo Form::text('date_range', \Carbon::createFromTimestamp(strtotime('first day of this month'))->format(session('business.date_format')) . ' ~ ' . \Carbon::createFromTimestamp(strtotime('last day of this month'))->format(session('business.date_format')), ['placeholder' => __('lang_v1.select_a_date_range'), 'class' => 'form-control', 'id' => 'cg_date_range', 'readonly']);; ?>

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
                    <table class="table table-bordered table-striped" id="cg_report_table">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->getFromJson('lang_v1.customer_group'); ?></th>
                                <th><?php echo app('translator')->getFromJson('report.total_sell'); ?></th>
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
            if($('#cg_date_range').length == 1){
                $('#cg_date_range').daterangepicker({
                    ranges: ranges,
                    autoUpdateInput: false,
                    locale: {
                        format: moment_date_format
                    }
                });
                $('#cg_date_range').on('apply.daterangepicker', function(ev, picker) {
                    $(this).val(picker.startDate.format(moment_date_format) + ' ~ ' + picker.endDate.format(moment_date_format));
                    cg_report_table.ajax.reload();
                });

                $('#cg_date_range').on('cancel.daterangepicker', function(ev, picker) {
                    $(this).val('');
                    cg_report_table.ajax.reload();
                });
            }

            cg_report_table = $('#cg_report_table').DataTable({
                            processing: true,
                            serverSide: true,
                            "ajax": {
                                "url": "/reports/customer-group",
                                "data": function ( d ) {
                                    d.location_id = $('#cg_location_id').val();
                                    d.customer_group_id = $('#cg_customer_group_id').val();
                                    d.start_date = $('#cg_date_range').data('daterangepicker').startDate.format('YYYY-MM-DD');
                                    d.end_date = $('#cg_date_range').data('daterangepicker').endDate.format('YYYY-MM-DD');
                                }
                            },
                            columns: [
                                {data: 'name', name: 'CG.name'},
                                {data: 'total_sell', name: 'total_sell', searchable: false}
                            ],
                            "fnDrawCallback": function (oSettings) {
                                __currency_convert_recursively($('#cg_report_table'));
                            }
                        });
            //Customer Group report filter
            $('select#cg_location_id, select#cg_customer_group_id, #cg_date_range').change( function(){
                cg_report_table.ajax.reload();
            });
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>