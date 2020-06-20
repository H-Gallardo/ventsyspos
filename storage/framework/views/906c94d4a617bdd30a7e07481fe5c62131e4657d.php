<div class="modal-dialog" role="document">
  <div class="modal-content">

    <?php echo Form::open(['url' => action('UnitController@store'), 'method' => 'post', 'id' => $quick_add ? 'quick_add_unit_form' : 'unit_add_form' ]); ?>


    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo e(app('translator')->getFromJson( 'unit.add_unit' )); ?></h4>
    </div>

    <div class="modal-body">
      <div class="form-group">
        <?php echo Form::label('actual_name', __( 'unit.name' ) . ':*'); ?>

          <?php echo Form::text('actual_name', null, ['class' => 'form-control', 'required', 'placeholder' => __( 'unit.name' )]);; ?>

      </div>

      <div class="form-group">
        <?php echo Form::label('short_name', __( 'unit.short_name' ) . ':*'); ?>

          <?php echo Form::text('short_name', null, ['class' => 'form-control', 'placeholder' => __( 'unit.short_name' ), 'required']);; ?>

      </div>

      <div class="form-group">
        <?php echo Form::label('allow_decimal', __( 'unit.allow_decimal' ) . ':*'); ?>

          <?php echo Form::select('allow_decimal', ['1' => __('messages.yes'), '0' => __('messages.no')], null, ['placeholder' => __( 'messages.please_select' ), 'required', 'class' => 'form-control']);; ?>

      </div>

    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary"><?php echo e(app('translator')->getFromJson( 'messages.save' )); ?></button>
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(app('translator')->getFromJson( 'messages.close' )); ?></button>
    </div>

    <?php echo Form::close(); ?>


  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->