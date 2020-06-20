<?php $__env->startSection('title', __('purchase.purchases')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header no-print">
    <h1><?php echo e(app('translator')->getFromJson('purchase.purchases')); ?>
        <small></small>
    </h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content no-print">

	<div class="box">
        <div class="box-header">
        	<h3 class="box-title"><?php echo e(app('translator')->getFromJson('purchase.all_purchases')); ?></h3>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase.create')): ?>
            	<div class="box-tools">
                    <a class="btn btn-block btn-primary" href="<?php echo e(action('PurchaseController@create')); ?>">
    				<i class="fa fa-plus"></i> <?php echo e(app('translator')->getFromJson('messages.add')); ?></a>
                </div>
            <?php endif; ?>
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
            	<table class="table table-bordered table-striped ajax_view" id="purchase_table">
            		<thead>
            			<tr>
            				<th><?php echo e(app('translator')->getFromJson('messages.date')); ?></th>
    						<th><?php echo e(app('translator')->getFromJson('purchase.ref_no')); ?></th>
                            <th><?php echo e(app('translator')->getFromJson('purchase.location')); ?></th>
    						<th><?php echo e(app('translator')->getFromJson('purchase.supplier')); ?></th>
            				<th><?php echo e(app('translator')->getFromJson('purchase.purchase_status')); ?></th>
                            <th><?php echo e(app('translator')->getFromJson('purchase.payment_status')); ?></th>
    						<th><?php echo e(app('translator')->getFromJson('purchase.grand_total')); ?></th>
                            <th><?php echo e(app('translator')->getFromJson('purchase.payment_due')); ?> &nbsp;&nbsp;<i class="fa fa-info-circle text-info" data-toggle="tooltip" data-placement="bottom" data-html="true" data-original-title="<?php echo e(__('messages.purchase_due_tooltip')); ?>" aria-hidden="true"></i></th>
    						<th><?php echo e(app('translator')->getFromJson('messages.action')); ?></th>
            			</tr>
            		</thead>
                    <tfoot>
                        <tr class="bg-gray font-17 text-center footer-total">
                            <td colspan="4"><strong><?php echo e(app('translator')->getFromJson('sale.total')); ?>:</strong></td>
                            <td id="footer_status_count"></td>
                            <td id="footer_payment_status_count"></td>
                            <td><span class="display_currency" id="footer_purchase_total" data-currency_symbol ="true"></span></td>
                            <td class="text-left"><small><?php echo e(app('translator')->getFromJson('report.purchase_due')); ?> - <span class="display_currency" id="footer_total_due" data-currency_symbol ="true"></span><br>
                            <?php echo e(app('translator')->getFromJson('lang_v1.purchase_return')); ?> - <span class="display_currency" id="footer_total_purchase_return_due" data-currency_symbol ="true"></span>
                            </small></td>
                            <td></td>
                        </tr>
                    </tfoot>
            	</table>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="modal fade product_modal" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
    </div>

    <div class="modal fade payment_modal" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel">
    </div>

    <div class="modal fade edit_payment_modal" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel">
    </div>

</section>

<section id="receipt_section" class="print_section"></section>

<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script src="<?php echo e(asset('js/purchase.js?v=' . $asset_v)); ?>"></script>
<script src="<?php echo e(asset('js/payment.js?v=' . $asset_v)); ?>"></script>
<script>
        //Date range as a button
    $('#daterange-btn').daterangepicker(
        dateRangeSettings,
        function (start, end) {
            $('#daterange-btn span').html(start.format(moment_date_format) + ' ~ ' + end.format(moment_date_format));
            purchase_table.ajax.url( '/purchases?start_date=' + start.format('YYYY-MM-DD') +
                '&end_date=' + end.format('YYYY-MM-DD') ).load();
        }
    );
    $('#daterange-btn').on('cancel.daterangepicker', function(ev, picker) {
        purchase_table.ajax.url( '/purchases').load();
        $('#daterange-btn span').html('<i class="fa fa-calendar"></i> <?php echo e(__("messages.filter_by_date")); ?>');
    });
</script>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>