<?php $__env->startSection('title', __('business.business_settings')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(app('translator')->getFromJson('business.business_settings')); ?></h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">
<?php echo Form::open(['url' => action('BusinessController@postBusinessSettings'), 'method' => 'post', 'id' => 'bussiness_edit_form',
           'files' => true ]); ?>

    <div class="row">
        <div class="col-xs-12">
       <!--  <pos-tab-container> -->
        <div class="col-xs-12 pos-tab-container">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 pos-tab-menu">
                <div class="list-group">
                    <a href="#" class="list-group-item text-center active"><?php echo e(app('translator')->getFromJson('business.business')); ?></a>
                    <a href="#" class="list-group-item text-center"><?php echo e(app('translator')->getFromJson('business.tax')); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.business_tax') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></a>
                    <a href="#" class="list-group-item text-center"><?php echo e(app('translator')->getFromJson('business.product')); ?></a>
                    <a href="#" class="list-group-item text-center"><?php echo e(app('translator')->getFromJson('business.sale')); ?></a>
                    <a href="#" class="list-group-item text-center"><?php echo e(app('translator')->getFromJson('purchase.purchases')); ?></a>
                    <?php if(!config('constants.disable_expiry', true)): ?>
                    <a href="#" class="list-group-item text-center"><?php echo e(app('translator')->getFromJson('business.dashboard')); ?></a>
                    <?php endif; ?>
                    <a href="#" class="list-group-item text-center"><?php echo e(app('translator')->getFromJson('business.system')); ?></a>
                    <a href="#" class="list-group-item text-center"><?php echo e(app('translator')->getFromJson('lang_v1.prefixes')); ?></a>
                    <a href="#" class="list-group-item text-center"><?php echo e(app('translator')->getFromJson('lang_v1.email_settings')); ?></a>
                    <a href="#" class="list-group-item text-center"><?php echo e(app('translator')->getFromJson('lang_v1.sms_settings')); ?></a>
                    <a href="#" class="list-group-item text-center"><?php echo e(app('translator')->getFromJson('sale.pos_sale')); ?></a>
                    <a href="#" class="list-group-item text-center"><?php echo e(app('translator')->getFromJson('lang_v1.modules')); ?></a>
                </div>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 pos-tab">
                <!-- tab 1 start -->
                <?php echo $__env->make('business.partials.settings_business', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <!-- tab 1 end -->
                <!-- tab 2 start -->
                <?php echo $__env->make('business.partials.settings_tax', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <!-- tab 2 end -->
                <!-- tab 3 start -->
                <?php echo $__env->make('business.partials.settings_product', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <!-- tab 3 end -->
                <!-- tab 4 start -->
                <?php echo $__env->make('business.partials.settings_sales', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <!-- tab 4 end -->
                <!-- tab 5 start -->
                <?php echo $__env->make('business.partials.settings_purchase', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <!-- tab 5 end -->
                <!-- tab 6 start -->
                <?php if(!config('constants.disable_expiry', true)): ?>
                    <?php echo $__env->make('business.partials.settings_dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endif; ?>
                <!-- tab 6 end -->
                <!-- tab 7 start -->
                <?php echo $__env->make('business.partials.settings_system', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <!-- tab 7 end -->
                <!-- tab 8 start -->
                <?php echo $__env->make('business.partials.settings_prefixes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <!-- tab 8 end -->
                <!-- tab 9 start -->
                <?php echo $__env->make('business.partials.settings_email', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <!-- tab 9 end -->
                <!-- tab 10 start -->
                <?php echo $__env->make('business.partials.settings_sms', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <!-- tab 10 end -->
                <!-- tab 11 start -->
                <?php echo $__env->make('business.partials.settings_pos', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <!-- tab 11 end -->
                <!-- tab 12 start -->
                <?php echo $__env->make('business.partials.settings_modules', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <!-- tab 12 end -->
            </div>
        </div>
        <!--  </pos-tab-container> -->
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <button class="btn btn-danger pull-right" type="submit"><?php echo e(app('translator')->getFromJson('business.update_settings')); ?></button>
        </div>
    </div>
<?php echo Form::close(); ?>

</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>