<?php $__env->startSection('title', __('contact.view_contact')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header no-print">
    <h1><?php echo e(__('contact.view_contact')); ?></h1>
</section>

<!-- Main content -->
<section class="content no-print">
	<div class="box">
        <div class="box-header">
        	<h3 class="box-title">
                <i class="fa fa-user margin-r-5"></i>
                <?php if($contact->type == 'both'): ?> 
                    <?php echo e(app('translator')->getFromJson( 'contact.contact_info', ['contact' => __('contact.contact') ])); ?>
                <?php else: ?>
                    <?php echo e(app('translator')->getFromJson( 'contact.contact_info', ['contact' => ucfirst($contact->type) ])); ?>
                <?php endif; ?>
            </h3>
        </div>
        <div class="box-body">
            <span id="view_contact_page"></span>
            <div class="row">
                <div class="col-sm-3">
                    <div class="well well-sm">
                        <strong><?php echo e($contact->name); ?></strong><br><br>
                        <strong><i class="fa fa-map-marker margin-r-5"></i> <?php echo e(app('translator')->getFromJson('business.address')); ?></strong>
                        <p class="text-muted">
                            <?php if($contact->landmark): ?>
                                <?php echo e($contact->landmark); ?>

                            <?php endif; ?>

                            <?php echo e(', ' . $contact->city); ?>


                            <?php if($contact->state): ?>
                                <?php echo e(', ' . $contact->state); ?>

                            <?php endif; ?>
                            <br>
                            <?php if($contact->country): ?>
                                <?php echo e($contact->country); ?>

                            <?php endif; ?>
                        </p>
                        <?php if($contact->supplier_business_name): ?>
                            <strong><i class="fa fa-briefcase margin-r-5"></i> 
                            <?php echo e(app('translator')->getFromJson('business.business_name')); ?></strong>
                            <p class="text-muted">
                                <?php echo e($contact->supplier_business_name); ?>

                            </p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="well well-sm">
                        <strong><i class="fa fa-mobile margin-r-5"></i> <?php echo e(app('translator')->getFromJson('contact.mobile')); ?></strong>
                        <p class="text-muted">
                            <?php echo e($contact->mobile); ?>

                        </p>
                        <?php if($contact->landline): ?>
                            <strong><i class="fa fa-phone margin-r-5"></i> <?php echo e(app('translator')->getFromJson('contact.landline')); ?></strong>
                            <p class="text-muted">
                                <?php echo e($contact->landline); ?>

                            </p>
                        <?php endif; ?>
                        <?php if($contact->alternate_number): ?>
                            <strong><i class="fa fa-phone margin-r-5"></i> <?php echo e(app('translator')->getFromJson('contact.alternate_contact_number')); ?></strong>
                            <p class="text-muted">
                                <?php echo e($contact->alternate_number); ?>

                            </p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if( $contact->type != 'customer'): ?>
                    <div class="col-sm-3">
                        <div class="well well-sm">
                            <strong><i class="fa fa-info margin-r-5"></i> <?php echo e(app('translator')->getFromJson('contact.tax_no')); ?></strong>
                            <p class="text-muted">
                                <?php echo e($contact->tax_number); ?>

                            </p>
                            <?php if($contact->pay_term_type): ?>
                                <strong><i class="fa fa-calendar margin-r-5"></i> <?php echo e(app('translator')->getFromJson('contact.pay_term_period')); ?></strong>
                                <p class="text-muted">
                                    <?php echo e(ucfirst($contact->pay_term_type)); ?>

                                </p>
                            <?php endif; ?>
                            <?php if($contact->pay_term_number): ?>
                                <strong><i class="fa fa-handshake-o margin-r-5"></i> <?php echo e(app('translator')->getFromJson('contact.pay_term')); ?></strong>
                                <p class="text-muted">
                                    <?php echo e($contact->pay_term_number); ?>

                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="col-sm-3">
                    <div class="well well-sm">
                    <?php if( $contact->type == 'supplier' || $contact->type == 'both'): ?>
                        <strong><?php echo e(app('translator')->getFromJson('report.total_purchase')); ?></strong>
                        <p class="text-muted">
                        <span class="display_currency" data-currency_symbol="true">
                        <?php echo e($contact->total_purchase); ?></span>
                        </p>
                        <strong><?php echo e(app('translator')->getFromJson('contact.total_purchase_paid')); ?></strong>
                        <p class="text-muted">
                        <span class="display_currency" data-currency_symbol="true">
                        <?php echo e($contact->purchase_paid); ?></span>
                        </p>
                        <strong><?php echo e(app('translator')->getFromJson('contact.total_purchase_due')); ?></strong>
                        <p class="text-muted">
                        <span class="display_currency" data-currency_symbol="true">
                        <?php echo e($contact->total_purchase - $contact->purchase_paid); ?></span>
                        </p>
                    <?php endif; ?>
                    <?php if( $contact->type == 'customer' || $contact->type == 'both'): ?>
                        <strong><?php echo e(app('translator')->getFromJson('report.total_sell')); ?></strong>
                        <p class="text-muted">
                        <span class="display_currency" data-currency_symbol="true">
                        <?php echo e($contact->total_invoice); ?></span>
                        </p>
                        <strong><?php echo e(app('translator')->getFromJson('contact.total_sale_paid')); ?></strong>
                        <p class="text-muted">
                        <span class="display_currency" data-currency_symbol="true">
                        <?php echo e($contact->invoice_received); ?></span>
                        </p>
                        <strong><?php echo e(app('translator')->getFromJson('contact.total_sale_due')); ?></strong>
                        <p class="text-muted">
                        <span class="display_currency" data-currency_symbol="true">
                        <?php echo e($contact->total_invoice - $contact->invoice_received); ?></span>
                        </p>
                    <?php endif; ?>
                    <?php if(!empty($contact->opening_balance) && $contact->opening_balance != '0.00'): ?>
                        <strong><?php echo e(app('translator')->getFromJson('lang_v1.opening_balance')); ?></strong>
                        <p class="text-muted">
                        <span class="display_currency" data-currency_symbol="true">
                        <?php echo e($contact->opening_balance); ?></span>
                        </p>
                        <strong><?php echo e(app('translator')->getFromJson('lang_v1.opening_balance_due')); ?></strong>
                        <p class="text-muted">
                        <span class="display_currency" data-currency_symbol="true">
                        <?php echo e($contact->opening_balance - $contact->opening_balance_paid); ?></span>
                        </p>
                    <?php endif; ?>
                    </div>
                </div>
                <?php if( $contact->type == 'supplier' || $contact->type == 'both'): ?>
                    <div class="clearfix"></div>
                    <div class="col-sm-12">
                        <?php if(($contact->total_purchase - $contact->purchase_paid) > 0): ?>
                            <a href="<?php echo e(action('TransactionPaymentController@getPayContactDue', [$contact->id])); ?>?type=purchase" class="pay_purchase_due btn btn-primary btn-sm pull-right"><i class="fa fa-money" aria-hidden="true"></i> <?php echo e(app('translator')->getFromJson("contact.pay_due_amount")); ?></a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- list purchases -->
    <?php if( in_array($contact->type, ['supplier', 'both']) ): ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">
                    <i class="fa fa-money margin-r-5"></i>
                    <?php echo e(app('translator')->getFromJson( 'contact.all_purchases_linked_to_this_contact')); ?>
                </h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="input-group">
                              <button type="button" class="btn btn-primary" id="daterange-btn">
                                <span>
                                  <i class="fa fa-calendar"></i> <?php echo e(__("messages.filter_by_date")); ?>

                                </span>
                                <i class="fa fa-caret-down"></i>
                              </button>
                            </div>
                          </div>
                    </div>
                    <div class="col-sm-12">
                        <table class="table table-bordered table-striped ajax_view" id="purchase_table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Ref No.</th>
                                    <th>Supplier</th>
                                    <th>Purchase Status</th>
                                    <th>Payment Status</th>
                                    <th>Grand Total</th>
                                    <th><?php echo e(app('translator')->getFromJson('purchase.payment_due')); ?> &nbsp;&nbsp;<i class="fa fa-info-circle text-info" data-toggle="tooltip" data-placement="bottom" data-html="true" data-original-title="<?php echo e(__('messages.purchase_due_tooltip')); ?>" aria-hidden="true"></i></th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- list sales -->
    <?php if( in_array($contact->type, ['customer', 'both']) ): ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">
                    <i class="fa fa-money margin-r-5"></i>
                    <?php echo e(app('translator')->getFromJson( 'contact.all_sells_linked_to_this_contact')); ?>
                </h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="input-group">
                              <button type="button" class="btn btn-primary" id="sells-daterange-btn">
                                <span>
                                  <i class="fa fa-calendar"></i> <?php echo e(__("messages.filter_by_date")); ?>

                                </span>
                                <i class="fa fa-caret-down"></i>
                              </button>
                            </div>
                          </div>
                    </div>
                    <div class="col-sm-12">
                        <table class="table table-bordered table-striped ajax_view" id="sell_table">
                            <thead>
                                <tr>
                                    <th><?php echo e(app('translator')->getFromJson('messages.date')); ?></th>
                                    <th><?php echo e(app('translator')->getFromJson('sale.invoice_no')); ?></th>
                                    <th><?php echo e(app('translator')->getFromJson('sale.customer_name')); ?></th>
                                    <th><?php echo e(app('translator')->getFromJson('sale.payment_status')); ?></th>
                                    <th><?php echo e(app('translator')->getFromJson('sale.total_amount')); ?></th>
                                    <th><?php echo e(app('translator')->getFromJson('sale.total_paid')); ?></th>
                                    <th><?php echo e(app('translator')->getFromJson('sale.total_remaining')); ?></th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>
<!-- /.content -->
<div class="modal fade payment_modal" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel">
</div>
<div class="modal fade edit_payment_modal" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>
<div class="modal fade pay_contact_due_modal" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel"></div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
$(document).ready( function(){
    //Purchase table
    purchase_table = $('#purchase_table').DataTable({
        processing: true,
        serverSide: true,
        aaSorting: [[0, 'desc']],
        ajax: '/purchases?supplier_id=<?php echo e($contact->id); ?>',
        columnDefs: [ {
            "targets": 6,
            "orderable": false,
            "searchable": false
        } ],
        columns: [
            { data: 'transaction_date', name: 'transaction_date'  },
            { data: 'ref_no', name: 'ref_no'},
            { data: 'name', name: 'contacts.name'},
            { data: 'status', name: 'status'},
            { data: 'payment_status', name: 'payment_status'},
            { data: 'final_total', name: 'final_total'},
            { data: 'payment_due', name: 'payment_due'},
            { data: 'action', name: 'action'}
        ],
        "fnDrawCallback": function (oSettings) {
            __currency_convert_recursively($('#purchase_table'));
        },
        createdRow: function( row, data, dataIndex ) {
            $( row ).find('td:eq(4)').attr('class', 'clickable_td');
        }
    });
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        dateRangeSettings,
        function (start, end) {
            $('#daterange-btn span').html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
            purchase_table.ajax.url( '/purchases?supplier_id=<?php echo e($contact->id); ?>&start_date=' + start.format('YYYY-MM-DD') +
                '&end_date=' + end.format('YYYY-MM-DD') ).load();
        }
    );
    $('#daterange-btn').on('cancel.daterangepicker', function(ev, picker) {
        purchase_table.ajax.url( '/purchases?supplier_id=<?php echo e($contact->id); ?>').load();
        $('#daterange-btn span').html('<i class="fa fa-calendar"></i> <?php echo e(__("messages.filter_by_date")); ?>');
    });

    var sell_table = $('#sell_table').DataTable({
        processing: true,
        serverSide: true,
        aaSorting: [[0, 'desc']],
        ajax: '/sells?customer_id=<?php echo e($contact->id); ?>',
        columnDefs: [ {
            "targets": 7,
            "orderable": false,
            "searchable": false
        } ],
        columns: [
            { data: 'transaction_date', name: 'transaction_date'  },
            { data: 'invoice_no', name: 'invoice_no'},
            { data: 'name', name: 'contacts.name'},
            { data: 'payment_status', name: 'payment_status'},
            { data: 'final_total', name: 'final_total'},
            { data: 'total_paid', name: 'total_paid'},
            { data: 'total_remaining', name: 'total_remaining'},
            { data: 'action', name: 'action'}
        ],
        "fnDrawCallback": function (oSettings) {
            __currency_convert_recursively($('#purchase_table'));
        },
        createdRow: function( row, data, dataIndex ) {
            $( row ).find('td:eq(3)').attr('class', 'clickable_td');
        }
    });
    $('#sells-daterange-btn').daterangepicker(
        dateRangeSettings,
        function (start, end) {
            $('#sells-daterange-btn span').html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
            sell_table.ajax.url( '/sells?supplier_id=<?php echo e($contact->id); ?>&start_date=' + start.format('YYYY-MM-DD') +
                '&end_date=' + end.format('YYYY-MM-DD') ).load();
        }
    );
    $('#sells-daterange-btn').on('cancel.daterangepicker', function(ev, picker) {
        sell_table.ajax.url( '/sells?supplier_id=<?php echo e($contact->id); ?>').load();
        $('#daterange-btn span').html('<i class="fa fa-calendar"></i> <?php echo e(__("messages.filter_by_date")); ?>');
    });
});
</script>
<script src="<?php echo e(asset('js/payment.js?v=' . $asset_v)); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>