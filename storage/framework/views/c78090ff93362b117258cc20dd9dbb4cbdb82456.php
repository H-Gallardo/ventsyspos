<?php $__env->startSection('title', __('lang_v1.email_settings')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->

<!-- Main content -->
<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo app('translator')->getFromJson( 'lang_v1.email_settings' ); ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php echo Form::open(['url' => action('BusinessEmailController@store'), 'method' => 'post' ]); ?>

              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <?php $__currentLoopData = $email_settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="panel box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo e('collapse_' . $loop->iteration); ?>" aria-expanded="true" class="">
                                 <?php echo e($value['email_type_name']); ?>

                                </a>
                            </h4>
                        </div>
                        <div id="<?php echo e('collapse_' . $loop->iteration); ?>" class="panel-collapse collapse <?php if($loop->index == 0): ?> in <?php endif; ?>" aria-expanded="true">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                        <?php echo Form::checkbox('email_settings[' . $key . '][is_enabled]', 1, $value['is_enabled'] , 
                                        [ 'class' => 'input-icheck']);; ?> <?php echo e(__( 'lang_v1.enable_this_email_notification' )); ?>

                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php echo Form::label('email_settings[' . $key . '][subject]', __('lang_v1.subject') . ':'); ?>

                                    <?php echo Form::text('email_settings[' . $key . '][subject]', $value['subject'], ['class' => 'form-control', 'placeholder' => __('lang_v1.subject') ]);; ?>

                                </div>
                                <div class="form-group">
                                    <?php echo Form::label('email_settings[' . $key . '][body]', __('lang_v1.message_body') . ':'); ?>

                                    <?php echo Form::textarea('email_settings[' . $key . '][body]', $value['body'], ['class' => 'form-control', 'placeholder' => __('lang_v1.message_body'), 'rows' => 6 ]);; ?>

                                    <br>
                                    <p class="text-muted"><?php echo app('translator')->getFromJson('lang_v1.available_tags'); ?>: <?php echo e(implode(', ', $value['tags'])); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
                <div class="row">
                    <div class="col-sm-12">
                        <button class="btn btn-primary pull-right" type="submit"><?php echo app('translator')->getFromJson('messages.save'); ?></button>
                    </div>
                </div>
            <?php echo Form::close(); ?>

            </div>
            <!-- /.box-body -->
          </div>
    </div>
</div>
</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>