<?php $__env->startSection('title', __( 'sale.list_pos')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header no-print">
    <h1>POS
    </h1>
</section>

<!-- Main content -->
<section class="content no-print">
	<div class="box">
        <div class="box-header">
        	<h3 class="box-title"><?php echo e(app('translator')->getFromJson( 'sale.list_pos')); ?></h3>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sell.create')): ?>
            	<div class="box-tools">
                    <a class="btn btn-block btn-primary" href="<?php echo e(action('SellPosController@create')); ?>">
    				<i class="fa fa-plus"></i> <?php echo e(app('translator')->getFromJson('messages.add')); ?></a>
                </div>
            <?php endif; ?>
        </div>
        <div class="box-body">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sell.view')): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="input-group">
                              <button type="button" class="btn btn-primary" id="sell_date_filter">
                                <span>
                                  <i class="fa fa-calendar"></i> <?php echo e(__('messages.filter_by_date')); ?>

                                </span>
                                <i class="fa fa-caret-down"></i>
                              </button>
                            </div>
                          </div>
                    </div>
                </div>
                <div class="table-responsive">
            	<table class="table table-bordered table-striped ajax_view" id="sell_table">
            		<thead>
            			<tr>
            				<th><?php echo e(app('translator')->getFromJson('messages.date')); ?></th>
                            <th><?php echo e(app('translator')->getFromJson('sale.invoice_no')); ?></th>
    						<th><?php echo e(app('translator')->getFromJson('sale.customer_name')); ?></th>
                            <th><?php echo e(app('translator')->getFromJson('sale.location')); ?></th>
                            <th><?php echo e(app('translator')->getFromJson('sale.payment_status')); ?></th>
    						<th><?php echo e(app('translator')->getFromJson('sale.total_amount')); ?></th>
                            <th><?php echo e(app('translator')->getFromJson('sale.total_paid')); ?></th>
                            <th><?php echo e(app('translator')->getFromJson('purchase.payment_due')); ?></th>
    						<th><?php echo e(app('translator')->getFromJson('messages.action')); ?></th>
            			</tr>
            		</thead>
                    <tfoot>
                        <tr class="bg-gray font-17 footer-total text-center">
                            <td colspan="4"><strong><?php echo e(app('translator')->getFromJson('sale.total')); ?>:</strong></td>
                            <td id="footer_payment_status_count"></td>
                            <td><span class="display_currency" id="footer_sale_total" data-currency_symbol ="true"></span></td>
                            <td><span class="display_currency" id="footer_total_paid" data-currency_symbol ="true"></span></td>
                            <td class="text-left"><small><?php echo e(app('translator')->getFromJson('lang_v1.sell_due')); ?> - <span class="display_currency" id="footer_total_remaining" data-currency_symbol ="true"></span><br><?php echo e(app('translator')->getFromJson('lang_v1.sell_return_due')); ?> - <span class="display_currency" id="footer_total_sell_return_due" data-currency_symbol ="true"></span></small></td>
                            <td></td>
                        </tr>
                    </tfoot>
            	</table>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- /.content -->
<div class="modal fade payment_modal" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>

<div class="modal fade edit_payment_modal" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>

<div class="modal fade register_details_modal" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>
<div class="modal fade close_register_modal" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>

<!-- This will be printed -->
<!-- <section class="invoice print_section" id="receipt_section">
</section> -->


<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
$(document).ready( function(){
    //Date range as a button
    $('#sell_date_filter').daterangepicker(
        dateRangeSettings,
        function (start, end) {
            $('#sell_date_filter span').html(start.format(moment_date_format) + ' ~ ' + end.format(moment_date_format));
            sell_table.ajax.reload();
        }
    );
    $('#sell_date_filter').on('cancel.daterangepicker', function(ev, picker) {
        $('#sell_date_filter').html('<i class="fa fa-calendar"></i> <?php echo e(__("messages.filter_by_date")); ?>');
        sell_table.ajax.reload();
    });
    
    sell_table = $('#sell_table').DataTable({
        processing: true,
        serverSide: true,
        aaSorting: [[0, 'desc']],
        "ajax": {
            "url": "/sells",
            "data": function ( d ) {
                var start = $('#sell_date_filter').data('daterangepicker').startDate.format('YYYY-MM-DD');
                var end = $('#sell_date_filter').data('daterangepicker').endDate.format('YYYY-MM-DD');
                d.start_date = start;
                d.end_date = end;
                d.is_direct_sale = 0;
            }
        },
        columnDefs: [ {
            "targets": 8,
            "orderable": false,
            "searchable": false
        } ],
        columns: [
            { data: 'transaction_date', name: 'transaction_date'  },
            { data: 'invoice_no', name: 'invoice_no'},
            { data: 'name', name: 'contacts.name'},
            { data: 'business_location', name: 'bl.name'},
            { data: 'payment_status', name: 'payment_status'},
            { data: 'final_total', name: 'final_total'},
            { data: 'total_paid', name: 'total_paid'},
            { data: 'total_remaining', name: 'total_remaining'},
            { data: 'action', name: 'action'}
        ],
        columnDefs: [
                {
                    'searchable'    : false, 
                    'targets'       : [6] 
                },
            ],
        "fnDrawCallback": function (oSettings) {
            
            $('#footer_sale_total').text(sum_table_col($('#sell_table'), 'final-total'));

            $('#footer_total_paid').text(sum_table_col($('#sell_table'), 'total-paid'));

            $('#footer_total_remaining').text(sum_table_col($('#sell_table'), 'payment_due'));
            $('#footer_total_sell_return_due').text(sum_table_col($('#sell_table'), 'sell_return_due'));

            $('#footer_payment_status_count ').html(__sum_status_html($('#sell_table'), 'payment-status-label'));
            __currency_convert_recursively($('#sell_table'));
        },
        createdRow: function( row, data, dataIndex ) {
            $( row ).find('td:eq(4)').attr('class', 'clickable_td');
        }
    });
});

</script>
<script src="<?php echo e(asset('js/payment.js?v=' . $asset_v)); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>