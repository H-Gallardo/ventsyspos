<div class="modal-dialog" role="document">
  <div class="modal-content">

    <?php echo Form::open(['url' => action('ExpenseCategoryController@store'), 'method' => 'post', 'id' => 'expense_category_add_form' ]); ?>

    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo e(app('translator')->getFromJson( 'expense.add_expense_category' )); ?></h4>
    </div>

    <div class="modal-body">
      <div class="form-group">
        <?php echo Form::label('name', __( 'expense.category_name' ) . ':*'); ?>

          <?php echo Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => __( 'expense.category_name' )]);; ?>

      </div>

      <div class="form-group">
        <?php echo Form::label('code', __( 'expense.category_code' ) . ':'); ?>

          <?php echo Form::text('code', null, ['class' => 'form-control', 'placeholder' => __( 'expense.category_code' )]);; ?>

      </div>
    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary"><?php echo e(app('translator')->getFromJson( 'messages.save' )); ?></button>
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(app('translator')->getFromJson( 'messages.close' )); ?></button>
    </div>

    <?php echo Form::close(); ?>


  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->