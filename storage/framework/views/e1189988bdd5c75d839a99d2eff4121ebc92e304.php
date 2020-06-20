<?php $__env->startSection('title', __('superadmin::lang.pricing')); ?>

<?php $__env->startSection('content'); ?>

<div class="container">
    <?php echo $__env->make('superadmin::layouts.partials.currency', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="row">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title text-center"><?php echo e(app('translator')->getFromJson('superadmin::lang.packages')); ?></h3>
            </div>

            <div class="box-body">
                <?php echo $__env->make('superadmin::subscription.partials.packages', ['action_type' => 'register'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        $('#change_lang').change( function(){
            window.location = "<?php echo e(route('pricing')); ?>?lang=" + $(this).val();
        });
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>