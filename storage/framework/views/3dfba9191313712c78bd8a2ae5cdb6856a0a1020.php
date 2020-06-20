<div class="modal-dialog" role="document">
  <div class="modal-content">

    <?php echo Form::open(['url' => action('CategoryController@store'), 'method' => 'post', 'id' => 'category_add_form' ]); ?>

    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo e(app('translator')->getFromJson( 'category.add_category' )); ?></h4>
    </div>

    <div class="modal-body">
      <div class="form-group">
        <?php echo Form::label('name', __( 'category.category_name' ) . ':*'); ?>

          <?php echo Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => __( 'category.category_name' )]);; ?>

      </div>

      <div class="form-group">
        <?php echo Form::label('short_code', __( 'category.code' ) . ':'); ?>

          <?php echo Form::text('short_code', null, ['class' => 'form-control', 'placeholder' => __( 'category.code' )]);; ?>

          <p class="help-block"><?php echo __('lang_v1.category_code_help'); ?></p>
      </div>
      <?php if(!empty($parent_categories)): ?>
        <div class="form-group">
            <div class="checkbox">
              <label>
                 <?php echo Form::checkbox('add_as_sub_cat', 1, false,[ 'class' => 'toggler', 'data-toggle_id' => 'parent_cat_div' ]);; ?> <?php echo e(app('translator')->getFromJson( 'category.add_as_sub_category' )); ?>
              </label>
            </div>
        </div>
        <div class="form-group hide" id="parent_cat_div">
          <?php echo Form::label('parent_id', __( 'category.select_parent_category' ) . ':'); ?>

          <?php echo Form::select('parent_id', $parent_categories, null, ['class' => 'form-control']);; ?>

        </div>
      <?php endif; ?>
    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary"><?php echo e(app('translator')->getFromJson( 'messages.save' )); ?></button>
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(app('translator')->getFromJson( 'messages.close' )); ?></button>
    </div>

    <?php echo Form::close(); ?>


  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->