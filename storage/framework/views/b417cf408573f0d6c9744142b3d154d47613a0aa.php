<?php $__env->startSection('title', __('lang_v1.purchase_return')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header no-print">
    <h1><?php echo e(app('translator')->getFromJson('lang_v1.purchase_return')); ?>
    </h1>
</section>

<!-- Main content -->
<section class="content no-print">

	<div class="box">
        <div class="box-header">
        	<h3 class="box-title"><?php echo e(app('translator')->getFromJson('lang_v1.all_purchase_returns')); ?></h3>
        </div>
        <div class="box-body">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase.view')): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="input-group">
                              <button type="button" class="btn btn-primary" id="daterange-btn">
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
            	<table class="table table-bordered table-striped ajax_view" id="purchase_return_datatable">
            		<thead>
            			<tr>
            				<th><?php echo e(app('translator')->getFromJson('messages.date')); ?></th>
    						<th><?php echo e(app('translator')->getFromJson('purchase.ref_no')); ?></th>
                            <th><?php echo e(app('translator')->getFromJson('lang_v1.parent_purchase')); ?></th>
                            <th><?php echo e(app('translator')->getFromJson('purchase.location')); ?></th>
    						<th><?php echo e(app('translator')->getFromJson('purchase.supplier')); ?></th>
                            <th><?php echo e(app('translator')->getFromJson('purchase.payment_status')); ?></th>
    						<th><?php echo e(app('translator')->getFromJson('purchase.grand_total')); ?></th>
                            <th><?php echo e(app('translator')->getFromJson('purchase.payment_due')); ?> &nbsp;&nbsp;<i class="fa fa-info-circle text-info" data-toggle="tooltip" data-placement="bottom" data-html="true" data-original-title="<?php echo e(__('messages.purchase_due_tooltip')); ?>" aria-hidden="true"></i></th>
    						<th><?php echo e(app('translator')->getFromJson('messages.action')); ?></th>
            			</tr>
            		</thead>
                    <tfoot>
                        <tr class="bg-gray font-17 text-center footer-total">
                            <td colspan="5"><strong><?php echo e(app('translator')->getFromJson('sale.total')); ?>:</strong></td>
                            <td id="footer_payment_status_count"></td>
                            <td><span class="display_currency" id="footer_purchase_return_total" data-currency_symbol ="true"></span></td>
                            <td><span class="display_currency" id="footer_total_due" data-currency_symbol ="true"></span></td>
                            <td></td>
                        </tr>
                    </tfoot>
            	</table>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="modal fade payment_modal" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel">
    </div>

    <div class="modal fade edit_payment_modal" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel">
    </div>

</section>

<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script src="<?php echo e(asset('js/payment.js?v=' . $asset_v)); ?>"></script>
<script>
    $(document).ready( function(){
        //Purchase table
        purchase_return_table = $('#purchase_return_datatable').DataTable({
            processing: true,
            serverSide: true,
            aaSorting: [[0, 'desc']],
            ajax: '/purchase-return',
            columnDefs: [ {
                "targets": [7, 8],
                "orderable": false,
                "searchable": false
            } ],
            columns: [
                { data: 'transaction_date', name: 'transaction_date'  },
                { data: 'ref_no', name: 'ref_no'},
                { data: 'parent_purchase', name: 'T.ref_no'},
                { data: 'location_name', name: 'BS.name'},
                { data: 'name', name: 'contacts.name'},
                { data: 'payment_status', name: 'payment_status'},
                { data: 'final_total', name: 'final_total'},
                { data: 'payment_due', name: 'payment_due'},
                { data: 'action', name: 'action'}
            ],
            "fnDrawCallback": function (oSettings) {
                var total_purchase = sum_table_col($('#purchase_return_datatable'), 'final_total');
                $('#footer_purchase_return_total').text(total_purchase);
                
                $('#footer_payment_status_count').html(__sum_status_html($('#purchase_return_datatable'), 'payment-status-label'));

                var total_due = sum_table_col($('#purchase_return_datatable'), 'payment_due');
                $('#footer_total_due').text(total_due);
                
                __currency_convert_recursively($('#purchase_return_datatable'));
            },
            createdRow: function( row, data, dataIndex ) {
                $( row ).find('td:eq(5)').attr('class', 'clickable_td');
            }
        });
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            dateRangeSettings,
            function (start, end) {
                $('#daterange-btn span').html(start.format(moment_date_format) + ' ~ ' + end.format(moment_date_format));
                purchase_return_table.ajax.url( '/purchase-return?start_date=' + start.format('YYYY-MM-DD') +
                    '&end_date=' + end.format('YYYY-MM-DD') ).load();
            }
        );
        $('#daterange-btn').on('cancel.daterangepicker', function(ev, picker) {
            purchase_return_table.ajax.url( '/purchase-return').load();
            $('#daterange-btn span').html('<i class="fa fa-calendar"></i> <?php echo e(__("messages.filter_by_date")); ?>');
        });
    });
</script>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>