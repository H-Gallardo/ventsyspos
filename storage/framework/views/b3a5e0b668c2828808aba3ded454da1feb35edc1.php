<div class="table-responsive">
<table class="table table-bordered table-striped" id="sr_expenses_report">
    <thead>
        <tr>
            <th><?php echo e(app('translator')->getFromJson('messages.date')); ?></th>
            <th><?php echo e(app('translator')->getFromJson('purchase.ref_no')); ?></th>
            <th><?php echo e(app('translator')->getFromJson('expense.expense_category')); ?></th>
            <th><?php echo e(app('translator')->getFromJson('business.location')); ?></th>
            <th><?php echo e(app('translator')->getFromJson('sale.payment_status')); ?></th>
            <th><?php echo e(app('translator')->getFromJson('sale.total_amount')); ?></th>
            <th><?php echo e(app('translator')->getFromJson('expense.expense_for')); ?></th>
            <th><?php echo e(app('translator')->getFromJson('expense.expense_note')); ?></th>
        </tr>
    </thead>
</table>
</div>