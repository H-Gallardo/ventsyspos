<?php $__env->startSection('title', __('lang_v1.register')); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title text-center"><?php echo e(app('translator')->getFromJson('business.register_and_get_started_in_minutes')); ?></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <?php echo Form::open(['url' => route('business.postRegister'), 'method' => 'post', 
                            'id' => 'business_register_form','files' => true ]); ?>

                                <?php echo $__env->make('business.partials.register_form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <?php echo Form::hidden('package_id', $package_id);; ?>

                            <?php echo Form::close(); ?>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        $('#change_lang').change( function(){
            window.location = "<?php echo e(route('business.getRegister')); ?>?lang=" + $(this).val();
        });
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>