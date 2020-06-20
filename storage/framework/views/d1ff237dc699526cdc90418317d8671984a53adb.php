<div class="modal-dialog" role="document">
  <div class="modal-content">

    <?php echo Form::open(['url' => action('\Modules\Account\Http\Controllers\AccountController@store'), 'method' => 'post', 'id' => 'payment_account_form' ]); ?>


    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo e(app('translator')->getFromJson( 'account::lang.add_account' )); ?></h4>
    </div>

    <div class="modal-body">
            <div class="form-group">
                <?php echo Form::label('name', __( 'lang_v1.name' ) .":*"); ?>

                <?php echo Form::text('name', null, ['class' => 'form-control', 'required','placeholder' => __( 'lang_v1.name' ) ]);; ?>

            </div>

            <div class="form-group">
                <?php echo Form::label('account_number', __( 'account::lang.account_number' ) .":*"); ?>

                <?php echo Form::text('account_number', null, ['class' => 'form-control', 'required','placeholder' => __( 'account::lang.account_number' ) ]);; ?>

            </div>

            <div class="form-group">
                <?php echo Form::label('account_type', __( 'account::lang.account_type' ) .":"); ?>

                <?php echo Form::select('account_type', $account_types, null, ['class' => 'form-control']);; ?>

            </div>

            <div class="form-group">
                <?php echo Form::label('opening_balance', __( 'account::lang.opening_balance' ) .":"); ?>

                <?php echo Form::text('opening_balance', 0, ['class' => 'form-control input_number','placeholder' => __( 'account::lang.opening_balance' ) ]);; ?>

            </div>

        
            <div class="form-group">
                <?php echo Form::label('note', __( 'brand.note' )); ?>

                <?php echo Form::textarea('note', null, ['class' => 'form-control', 'placeholder' => __( 'brand.note' ), 'rows' => 4]);; ?>

            </div>
    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary"><?php echo e(app('translator')->getFromJson( 'messages.save' )); ?></button>
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(app('translator')->getFromJson( 'messages.close' )); ?></button>
    </div>

    <?php echo Form::close(); ?>


  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->