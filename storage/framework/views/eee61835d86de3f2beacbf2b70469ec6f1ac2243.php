<?php $__env->startSection('title', __('expense.edit_expense')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(app('translator')->getFromJson('expense.edit_expense')); ?></h1>
</section>

<!-- Main content -->
<section class="content">
  <?php echo Form::open(['url' => action('ExpenseController@update', [$expense->id]), 'method' => 'PUT', 'id' => 'add_expense_form', 'files' => true ]); ?>

  <div class="box box-solid">
    <div class="box-body">
      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <?php echo Form::label('location_id', __('purchase.business_location').':*'); ?>

            <?php echo Form::select('location_id', $business_locations, $expense->location_id, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'required']);; ?>

          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <?php echo Form::label('expense_category_id', __('expense.expense_category').':'); ?>

            <?php echo Form::select('expense_category_id', $expense_categories, $expense->expense_category_id, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select')]);; ?>

          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <?php echo Form::label('ref_no', __('purchase.ref_no').':*'); ?>

            <?php echo Form::text('ref_no', $expense->ref_no, ['class' => 'form-control', 'required']);; ?>

          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <?php echo Form::label('transaction_date', __('messages.date') . ':*'); ?>

            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </span>
              <?php echo Form::text('transaction_date', date('m/d/Y', strtotime($expense->transaction_date)), ['class' => 'form-control', 'readonly', 'required', 'id' => 'expense_transaction_date']);; ?>

            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <?php echo Form::label('payment_status','Payment status:*'); ?>

            <?php echo Form::select('payment_status',[ 'paid' => __('lang_v1.paid'), 'due' => __('lang_v1.due')], $expense->payment_status, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'required']);; ?>

          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <?php echo Form::label('final_total', __('sale.total_amount') . ':*'); ?>

            <?php echo Form::text('final_total', number_format($expense->final_total, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), ['class' => 'form-control input_number', 'placeholder' => __('sale.total_amount'), 'required']);; ?>

          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <?php echo Form::label('expense_for', __('expense.expense_for').':'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.expense_for') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
            <?php echo Form::select('expense_for', $users, $expense->expense_for, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select')]);; ?>

          </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('document', __('purchase.attach_document') . ':'); ?>

                <?php echo Form::file('document', ['id' => 'upload_document']);; ?>

                <p class="help-block"><?php echo e(app('translator')->getFromJson('purchase.max_file_size', ['size' => (config('constants.document_size_limit') / 1000000)])); ?></p>
            </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <?php echo Form::label('additional_notes', __('expense.expense_note') . ':'); ?>

                <?php echo Form::textarea('additional_notes', $expense->additional_notes, ['class' => 'form-control', 'rows' => 3]);; ?>

          </div>
        </div>
        <div class="col-sm-12">
          <button type="submit" class="btn btn-primary pull-right"><?php echo e(app('translator')->getFromJson('messages.update')); ?></button>
        </div>
      </div>
    </div>
  </div> <!--box end-->

<?php echo Form::close(); ?>

</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>