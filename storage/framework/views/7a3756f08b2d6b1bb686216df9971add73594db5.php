<?php $__env->startSection('title', __('lang_v1.notification_templates')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(__('lang_v1.notification_templates')); ?></h1>
</section>

<!-- Main content -->
<section class="content">
    <?php echo Form::open(['url' => action('NotificationTemplateController@store'), 'method' => 'post' ]); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="callout callout-warning">
                <h4><?php echo e(app('translator')->getFromJson('lang_v1.available_tags')); ?>:</h4>
                <p><?php echo e(implode(', ', $tags)); ?></p>
            </div>
            <div class="box box-solid">
                <div class="box-header">
                    <h3 class="box-title"><?php echo e(app('translator')->getFromJson('lang_v1.customer_notifications')); ?>:</h3>
                </div>
                <div class="box-body">
                    <?php echo $__env->make('notification_template.partials.tabs', ['templates' => $customer_notifications], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div> <!-- /box-body -->
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header">
                    <h3 class="box-title"><?php echo e(app('translator')->getFromJson('lang_v1.supplier_notifications')); ?>:</h3>
                </div>
                <div class="box-body">
                    <?php echo $__env->make('notification_template.partials.tabs', ['templates' => $supplier_notifications], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div> <!-- /box-body -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-danger pull-right"><?php echo e(app('translator')->getFromJson('messages.save')); ?></button>
        </div>
    </div>
    <?php echo Form::close(); ?>


</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
    $('textarea.ckeditor').each( function(){
        var editor_id = $(this).attr('id');
        CKEDITOR.replace(editor_id);
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>