<?php $__env->startSection('title', __('expense.expenses')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(app('translator')->getFromJson('expense.expenses')); ?>
        <small></small>
    </h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
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
                            <?php echo Form::label('location_id',  __('purchase.business_location') . ':'); ?>

                            <?php echo Form::select('location_id', $business_locations, null, ['class' => 'form-control select2', 'style' => 'width:100%']);; ?>

                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <?php echo Form::label('expense_for', __('expense.expense_for').':'); ?>

                            <?php echo Form::select('expense_for', $users, null, ['class' => 'form-control select2']);; ?>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo Form::label('expense_category_id',__('expense.expense_category').':'); ?>

                            <?php echo Form::select('expense_category_id', $categories, null, ['placeholder' =>
                            __('report.all'), 'class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'expense_category_id']);; ?>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo Form::label('expense_date_range', __('report.date_range') . ':'); ?>

                            <?php echo Form::text('date_range', \Carbon::createFromTimestamp(strtotime('first day of this month'))->format(session('business.date_format')) . ' ~ ' . \Carbon::createFromTimestamp(strtotime('last day of this month'))->format(session('business.date_format')) , ['placeholder' => __('lang_v1.select_a_date_range'), 'class' => 'form-control', 'id' => 'expense_date_range', 'readonly']);; ?>

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
                <div class="box-header">
                	<h3 class="box-title"><?php echo e(app('translator')->getFromJson('expense.all_expenses')); ?></h3>
                    <div class="box-tools">
                        <a class="btn btn-block btn-primary" href="<?php echo e(action('ExpenseController@create')); ?>">
                        <i class="fa fa-plus"></i> <?php echo e(app('translator')->getFromJson('messages.add')); ?></a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                	<table class="table table-bordered table-striped" id="expense_table">
                		<thead>
                			<tr>
                				<th><?php echo e(app('translator')->getFromJson('messages.date')); ?></th>
        						<th><?php echo e(app('translator')->getFromJson('purchase.ref_no')); ?></th>
                                <th><?php echo e(app('translator')->getFromJson('expense.expense_category')); ?></th>
                                <th><?php echo e(app('translator')->getFromJson('business.location')); ?></th>
                                <th><?php echo e(app('translator')->getFromJson('sale.payment_status')); ?></th>
                                <th><?php echo e(app('translator')->getFromJson('sale.total_amount')); ?></th>
                                <th><?php echo e(app('translator')->getFromJson('purchase.payment_due')); ?>
                                <th><?php echo e(app('translator')->getFromJson('expense.expense_for')); ?></th>
                                <th><?php echo e(app('translator')->getFromJson('expense.expense_note')); ?></th>
        						<th><?php echo e(app('translator')->getFromJson('messages.action')); ?></th>
                			</tr>
                		</thead>
                        <tfoot>
                            <tr class="bg-gray font-17 text-center footer-total">
                                <td colspan="4"><strong><?php echo e(app('translator')->getFromJson('sale.total')); ?>:</strong></td>
                                <td id="footer_payment_status_count"></td>
                                <td><span class="display_currency" id="footer_expense_total" data-currency_symbol ="true"></span></td>
                                <td><span class="display_currency" id="footer_total_due" data-currency_symbol ="true"></span></td>
                                <td colspan="3"></td>
                            </tr>
                        </tfoot>
                	</table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->
<!-- /.content -->
<div class="modal fade payment_modal" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>

<div class="modal fade edit_payment_modal" tabindex="-1" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
 <script src="<?php echo e(asset('js/payment.js?v=' . $asset_v)); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>