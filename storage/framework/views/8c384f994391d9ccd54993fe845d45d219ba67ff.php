<div class="modal-dialog" role="document">
  <div class="modal-content">

    <?php echo Form::open(['url' => action('PaymentAccountController@store'), 'method' => 'post', 'id' => 'payment_account_form' ]); ?>


    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo app('translator')->getFromJson( 'lang_v1.payment_account' ); ?></h4>
    </div>

    <div class="modal-body">
            <div class="form-group">
                <?php echo Form::label('name', __( 'lang_v1.name' ) .":*"); ?>

                <?php echo Form::text('name', null, ['class' => 'form-control', 'required','placeholder' => __( 'lang_v1.name' ) ]);; ?>

            </div>

            <div class="form-group">
                <?php echo Form::label('type', __( 'lang_v1.payment_type' ) . ':*'); ?>

                <?php echo Form::select('type', $type,'', ['class' => 'form-control', 'required']);; ?>

            </div>

        
            <div class="form-group">
                <?php echo Form::label('note', __( 'purchase.payment_note' )); ?>

                <?php echo Form::text('note', null, ['class' => 'form-control', 'placeholder' => __( 'lang_v1.payment_note' )]);; ?>

            </div>
    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary"><?php echo app('translator')->getFromJson( 'messages.save' ); ?></button>
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->getFromJson( 'messages.close' ); ?></button>
    </div>

    <?php echo Form::close(); ?>


  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->