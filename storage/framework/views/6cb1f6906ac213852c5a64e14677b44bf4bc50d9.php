<?php $__env->startSection('title', __('superadmin::lang.superadmin') . ' | Superadmin Settings'); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(app('translator')->getFromJson('superadmin::lang.super_admin_settings')); ?><small><?php echo e(app('translator')->getFromJson('superadmin::lang.edit_super_admin_settings')); ?></small></h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">
    <?php echo Form::open(['action' => '\Modules\Superadmin\Http\Controllers\SuperadminSettingsController@update', 'method' => 'put']); ?>

    <div class="row">
        <div class="col-xs-12">
           <!--  <pos-tab-container> -->
            <div class="col-xs-12 pos-tab-container">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 pos-tab-menu">
                    <div class="list-group">
                        <a href="#" class="list-group-item text-center active"><?php echo e(app('translator')->getFromJson('superadmin::lang.super_admin_settings')); ?></a>
                        <a href="#" class="list-group-item text-center"><?php echo e(app('translator')->getFromJson('superadmin::lang.application_settings')); ?></a>
                        <a href="#" class="list-group-item text-center"><?php echo e(app('translator')->getFromJson('superadmin::lang.email_smtp_settings')); ?></a>
                        <a href="#" class="list-group-item text-center"><?php echo e(app('translator')->getFromJson('superadmin::lang.payment_gateways')); ?></a>
                        <a href="#" class="list-group-item text-center"><?php echo e(app('translator')->getFromJson('superadmin::lang.backup')); ?></a>
                        <a href="#" class="list-group-item text-center"><?php echo e(app('translator')->getFromJson('superadmin::lang.cron')); ?></a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 pos-tab">
                    <?php echo $__env->make('superadmin::superadmin_settings.partials.super_admin_settings', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('superadmin::superadmin_settings.partials.application_settings', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('superadmin::superadmin_settings.partials.email_smtp_settings', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('superadmin::superadmin_settings.partials.payment_gateways', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('superadmin::superadmin_settings.partials.backup', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('superadmin::superadmin_settings.partials.cron', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
            <!--  </pos-tab-container> -->
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="form-group pull-right">
            <?php echo e(Form::submit('update', ['class'=>"btn btn-danger"])); ?>

            </div>
        </div>
    </div>
    <?php echo Form::close(); ?>

</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
    $(document).on('change', '#BACKUP_DISK', function() {
        if($(this).val() == 'dropbox'){
            $('div#dropbox_access_token_div').removeClass('hide');
        } else {
            $('div#dropbox_access_token_div').addClass('hide');
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>