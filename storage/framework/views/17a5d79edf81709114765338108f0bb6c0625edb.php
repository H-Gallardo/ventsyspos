<div class="modal-dialog" role="document">
  <div class="modal-content">

    <?php echo Form::open(['url' => action('\Modules\Account\Http\Controllers\AccountController@update',$account->id), 'method' => 'PUT', 'id' => 'edit_payment_account_form' ]); ?>


    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo e(app('translator')->getFromJson( 'account::lang.edit_account' )); ?></h4>
    </div>

    <div class="modal-body">
            <div class="form-group">
                <?php echo Form::label('name', __( 'lang_v1.name' ) .":*"); ?>

                <?php echo Form::text('name', $account->name, ['class' => 'form-control', 'required','placeholder' => __( 'lang_v1.name' ) ]);; ?>

            </div>

             <div class="form-group">
                <?php echo Form::label('account_number', __( 'account::lang.account_number' ) .":*"); ?>

                <?php echo Form::text('account_number', $account->account_number, ['class' => 'form-control', 'required','placeholder' => __( 'account::lang.account_number' ) ]);; ?>

            </div>

            <div class="form-group">
                <?php echo Form::label('account_type', __( 'account::lang.account_type' ) .":"); ?>

                <?php echo Form::select('account_type', $account_types, $account->account_type, ['class' => 'form-control']);; ?>

            </div>

            <div class="form-group">
                <?php echo Form::label('note', __( 'brand.note' )); ?>

                <?php echo Form::textarea('note', $account->note, ['class' => 'form-control', 'placeholder' => __( 'brand.note' ), 'rows' => 4]);; ?>

            </div>
    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary"><?php echo e(app('translator')->getFromJson( 'messages.update' )); ?></button>
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(app('translator')->getFromJson( 'messages.close' )); ?></button>
    </div>

    <?php echo Form::close(); ?>


  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->