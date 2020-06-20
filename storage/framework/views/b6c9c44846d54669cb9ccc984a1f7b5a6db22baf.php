<?php $__env->startSection('title',  __('cash_register.open_cash_register')); ?>

<?php $__env->startSection('content'); ?>
<style type="text/css">



</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(app('translator')->getFromJson('cash_register.open_cash_register')); ?></h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">
<?php echo Form::open(['url' => action('CashRegisterController@store'), 'method' => 'post', 
'id' => 'add_cash_register_form' ]); ?>

  <div class="box box-solid">
    <div class="box-body">
      <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
          <div class="form-group">
            <?php echo Form::label('amount', __('cash_register.cash_in_hand') . ':'); ?>

              <?php echo Form::text('amount', null, ['class' => 'form-control input_number',
              'placeholder' => __('cash_register.enter_amount')]);; ?>

          </div>
        </div>
        <div class="col-sm-8 col-sm-offset-2">
          <button type="submit" class="btn btn-primary pull-right"><?php echo e(app('translator')->getFromJson('cash_register.open_register')); ?></button>
        </div>
      </div>
    </div>
  </div>
  <?php echo Form::close(); ?>

</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>