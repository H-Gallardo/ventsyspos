<div class="modal-dialog" role="document">
  <div class="modal-content">

    <?php echo Form::open(['url' => action('SalesCommissionAgentController@store'), 'method' => 'post', 'id' => 'sale_commission_agent_form' ]); ?>


    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo e(app('translator')->getFromJson( 'lang_v1.add_sales_commission_agent' )); ?></h4>
    </div>

    <div class="modal-body">
      <div class="row">
        <div class="col-md-2">
        <div class="form-group">
          <?php echo Form::label('surname', __( 'business.prefix' ) . ':'); ?>

            <?php echo Form::text('surname', null, ['class' => 'form-control', 'placeholder' => __( 'business.prefix_placeholder' ) ]);; ?>

        </div>
      </div>
      <div class="col-md-5">
        <div class="form-group">
          <?php echo Form::label('first_name', __( 'business.first_name' ) . ':*'); ?>

            <?php echo Form::text('first_name', null, ['class' => 'form-control', 'required', 'placeholder' => __( 'business.first_name' ) ]);; ?>

        </div>
      </div>
      <div class="col-md-5">
        <div class="form-group">
          <?php echo Form::label('last_name', __( 'business.last_name' ) . ':'); ?>

            <?php echo Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => __( 'business.last_name' ) ]);; ?>

        </div>
      </div>
      <div class="clearfix"></div>
      <div class="col-md-6">
        <div class="form-group">
          <?php echo Form::label('email', __( 'business.email' ) . ':'); ?>

            <?php echo Form::text('email', null, ['class' => 'form-control', 'placeholder' => __( 'business.email' ) ]);; ?>

        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <?php echo Form::label('contact_no', __( 'lang_v1.contact_no' ) . ':'); ?>

            <?php echo Form::text('contact_no', null, ['class' => 'form-control', 'placeholder' => __( 'lang_v1.contact_no' ) ]);; ?>

        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <?php echo Form::label('address', __( 'business.address' ) . ':'); ?>

            <?php echo Form::textarea('address', null, ['class' => 'form-control', 'placeholder' => __( 'business.address'), 'rows' => 3 ]);; ?>

        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <?php echo Form::label('cmmsn_percent', __( 'lang_v1.cmmsn_percent' ) . ':'); ?>

            <?php echo Form::number('cmmsn_percent', null, ['class' => 'form-control', 'placeholder' => __( 'lang_v1.cmmsn_percent' ), 'step' => 0.01, 'required' ]);; ?>

        </div>
      </div>

      </div>
    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary"><?php echo e(app('translator')->getFromJson( 'messages.save' )); ?></button>
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(app('translator')->getFromJson( 'messages.close' )); ?></button>
    </div>

    <?php echo Form::close(); ?>


  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->