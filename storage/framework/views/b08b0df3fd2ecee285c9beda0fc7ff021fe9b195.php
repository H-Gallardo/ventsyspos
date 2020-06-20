<div class="table-responsive">
<table class="table table-bordered table-striped" id="sr_sales_with_commission_table">
    <thead>
        <tr>
            <th><?php echo e(app('translator')->getFromJson('messages.date')); ?></th>
            <th><?php echo e(app('translator')->getFromJson('sale.invoice_no')); ?></th>
            <th><?php echo e(app('translator')->getFromJson('sale.customer_name')); ?></th>
            <th><?php echo e(app('translator')->getFromJson('sale.location')); ?></th>
            <th><?php echo e(app('translator')->getFromJson('sale.payment_status')); ?></th>
            <th><?php echo e(app('translator')->getFromJson('sale.total_amount')); ?></th>
            <th><?php echo e(app('translator')->getFromJson('sale.total_paid')); ?></th>
            <th><?php echo e(app('translator')->getFromJson('sale.total_remaining')); ?></th>
        </tr>
    </thead>
</table>
</div>