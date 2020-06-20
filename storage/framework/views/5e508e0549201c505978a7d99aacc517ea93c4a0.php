<!-- Custom Tabs -->
<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li <?php if($loop->index == 0): ?> class="active" <?php endif; ?>>
                <a href="#cn_<?php echo e($key); ?>" data-toggle="tab" aria-expanded="true">
                <?php echo e($value['name']); ?> </a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <div class="tab-content">
        <?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="tab-pane <?php if($loop->index == 0): ?> active <?php endif; ?>" id="cn_<?php echo e($key); ?>">
                <?php if($key == 'new_booking'): ?>
                    <strong><?php echo e(app('translator')->getFromJson('lang_v1.available_tags')); ?>:</strong>
                <p class="text-primary"><?php echo e(implode(', ', $booking_tags)); ?></p>
                <?php endif; ?>
                <div class="form-group">
                    <?php echo Form::label($key . '_subject',
                    __('lang_v1.email_subject').':'); ?>

                    <?php echo Form::text('template_data[' . $key . '][subject]', 
                    $value['subject'], ['class' => 'form-control'
                    , 'placeholder' => __('lang_v1.email_subject'), 'id' => $key . '_subject']);; ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label($key . '_email_body',
                    __('lang_v1.email_body').':'); ?>

                    <?php echo Form::textarea('template_data[' . $key . '][email_body]', 
                    $value['email_body'], ['class' => 'form-control ckeditor'
                    , 'placeholder' => __('lang_v1.email_body'), 'id' => $key . '_email_body', 'rows' => 6]);; ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label($key . '_sms_body',
                    __('lang_v1.sms_body').':'); ?>

                    <?php echo Form::textarea('template_data[' . $key . '][sms_body]', 
                    $value['sms_body'], ['class' => 'form-control'
                    , 'placeholder' => __('lang_v1.sms_body'), 'id' => $key . '_sms_body', 'rows' => 6]);; ?>

                </div>
                <?php if($key == 'new_sale'): ?>
                    <div class="form-group">
                        <label class="checkbox-inline">
                            <?php echo Form::checkbox('template_data[' . $key . '][auto_send]', 1, $value['auto_send'], ['class' => 'input-icheck']);; ?> <?php echo e(app('translator')->getFromJson('lang_v1.autosend_email')); ?>
                        </label>
                        <label class="checkbox-inline">
                            <?php echo Form::checkbox('template_data[' . $key . '][auto_send_sms]', 1, $value['auto_send_sms'], ['class' => 'input-icheck']);; ?> <?php echo e(app('translator')->getFromJson('lang_v1.autosend_sms')); ?>
                        </label>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>