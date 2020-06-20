<div class="modal-dialog" role="document">
  <div class="modal-content">

    <?php echo Form::open(['url' => action('VariationTemplateController@update', [$variation->id]), 'method' => 'PUT', 'id' => 'variation_edit_form', 'class' => 'form-horizontal' ]); ?>


    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo e(app('translator')->getFromJson('lang_v1.edit_variation')); ?></h4>
    </div>

    <div class="modal-body">
      <div class="form-group">
        <?php echo Form::label('name',__('lang_v1.variation_name') . ':*', ['class' => 'col-sm-3 control-label']); ?>


        <div class="col-sm-9">
          <?php echo Form::text('name', $variation->name, ['class' => 'form-control', 'required', 'placeholder' => __('lang_v1.variation_name')]);; ?>

        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label"><?php echo e(app('translator')->getFromJson('lang_v1.add_variation_values')); ?>:*</label>
        <?php $__currentLoopData = $variation->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if( $loop->first ): ?>
            <div class="col-sm-7">
              <?php echo Form::text('edit_variation_values[' . $attr->id . ']', $attr->name, ['class' => 'form-control', 'required']);; ?>

            </div>
          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="col-sm-2">
          <button type="button" class="btn btn-primary" id="add_variation_values">+</button>
        </div>
      </div>
      <div id="variation_values">
        <?php $__currentLoopData = $variation->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if( !$loop->first ): ?>
            <div class="form-group">
              <div class="col-sm-7 col-sm-offset-3">
                <?php echo Form::text('edit_variation_values[' . $attr->id . ']', $attr->name, ['class' => 'form-control', 'required']);; ?>

              </div>
            </div>
          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary"><?php echo e(app('translator')->getFromJson('messages.update')); ?></button>
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(app('translator')->getFromJson('messages.close')); ?></button>
    </div>

    <?php echo Form::close(); ?>


  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->