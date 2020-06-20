<div class="modal-dialog" role="document">
  <div class="modal-content">

    <?php echo Form::open(['url' => action('BusinessLocationController@update', [$location->id]), 'method' => 'PUT', 'id' => 'business_location_add_form' ]); ?>


    <?php echo Form::hidden('hidden_id', $location->id, ['id' => 'hidden_id']);; ?>

    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo e(app('translator')->getFromJson( 'business.edit_business_location' )); ?></h4>
    </div>

    <div class="modal-body">
      <div class="row">
        <div class="col-sm-12">
          <div class="form-group">
            <?php echo Form::label('name', __( 'invoice.name' ) . ':*'); ?>

              <?php echo Form::text('name', $location->name, ['class' => 'form-control', 'required', 'placeholder' => __( 'invoice.name' ) ]);; ?>

          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-6">
          <div class="form-group">
            <?php echo Form::label('location_id', __( 'lang_v1.location_id' ) . ':'); ?>

              <?php echo Form::text('location_id', $location->location_id, ['class' => 'form-control', 'placeholder' => __( 'lang_v1.location_id' ) ]);; ?>

          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <?php echo Form::label('landmark', __( 'business.landmark' ) . ':'); ?>

              <?php echo Form::text('landmark', $location->landmark, ['class' => 'form-control', 'placeholder' => __( 'business.landmark' ) ]);; ?>

          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-6">
          <div class="form-group">
            <?php echo Form::label('city', __( 'business.city' ) . ':*'); ?>

              <?php echo Form::text('city', $location->city, ['class' => 'form-control', 'placeholder' => __( 'business.city'), 'required' ]);; ?>

          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <?php echo Form::label('zip_code', __( 'business.zip_code' ) . ':*'); ?>

              <?php echo Form::text('zip_code', $location->zip_code, ['class' => 'form-control', 'placeholder' => __( 'business.zip_code'), 'required' ]);; ?>

          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-6">
          <div class="form-group">
            <?php echo Form::label('state', __( 'business.state' ) . ':*'); ?>

              <?php echo Form::text('state', $location->state, ['class' => 'form-control', 'placeholder' => __( 'business.state'), 'required' ]);; ?>

          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <?php echo Form::label('country', __( 'business.country' ) . ':*'); ?>

              <?php echo Form::text('country', $location->country, ['class' => 'form-control', 'placeholder' => __( 'business.country'), 'required' ]);; ?>

          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-6">
          <div class="form-group">
            <?php echo Form::label('mobile', __( 'business.mobile' ) . ':'); ?>

            <?php echo Form::text('mobile', $location->mobile, ['class' => 'form-control', 'placeholder' => __( 'business.mobile')]);; ?>

          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <?php echo Form::label('alternate_number', __( 'business.alternate_number' ) . ':'); ?>

            <?php echo Form::text('alternate_number', $location->alternate_number, ['class' => 'form-control', 'placeholder' => __( 'business.alternate_number')]);; ?>

          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-6">
          <div class="form-group">
            <?php echo Form::label('email', __( 'business.email' ) . ':'); ?>

            <?php echo Form::email('email', $location->email, ['class' => 'form-control', 'placeholder' => __( 'business.email')]);; ?>

          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <?php echo Form::label('website', __( 'lang_v1.website' ) . ':'); ?>

            <?php echo Form::text('website', $location->website, ['class' => 'form-control', 'placeholder' => __( 'lang_v1.website')]);; ?>

          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-6">
          <div class="form-group">
            <?php echo Form::label('invoice_scheme_id', __('invoice.invoice_scheme') . ':*'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.invoice_scheme') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
              <?php echo Form::select('invoice_scheme_id', $invoice_schemes, $location->invoice_scheme_id, ['class' => 'form-control', 'required',
              'placeholder' => __('messages.please_select')]);; ?>

          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <?php echo Form::label('invoice_layout_id', __('invoice.invoice_layout') . ':*'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.invoice_layout') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
              <?php echo Form::select('invoice_layout_id', $invoice_layouts,  $location->invoice_layout_id, ['class' => 'form-control', 'required',
              'placeholder' => __('messages.please_select')]);; ?>

          </div>
        </div>
             <div class="clearfix"></div>
      <div class="col-md-12">
        <hr/>
      </div>
      <div class="col-sm-3">
        <div class="form-group">
            <?php echo Form::label('custom_field1', __('lang_v1.custom_field', ['number' => 1]) . ':'); ?>

            <?php echo Form::text('custom_field1', $location->custom_field1, ['class' => 'form-control', 
                'placeholder' => __('lang_v1.custom_field', ['number' => 1])]);; ?>

        </div>
      </div>
      <div class="col-sm-3">
        <div class="form-group">
            <?php echo Form::label('custom_field2', __('lang_v1.custom_field', ['number' => 2]) . ':'); ?>

            <?php echo Form::text('custom_field2', $location->custom_field2, ['class' => 'form-control', 
                'placeholder' => __('lang_v1.custom_field', ['number' => 2])]);; ?>

        </div>
      </div>
      <div class="col-sm-3">
        <div class="form-group">
            <?php echo Form::label('custom_field3', __('lang_v1.custom_field', ['number' => 3]) . ':'); ?>

            <?php echo Form::text('custom_field3', $location->custom_field3, ['class' => 'form-control', 
                'placeholder' => __('lang_v1.custom_field', ['number' => 3])]);; ?>

        </div>
      </div>
      <div class="col-sm-3">
        <div class="form-group">
            <?php echo Form::label('custom_field4', __('lang_v1.custom_field', ['number' => 4]) . ':'); ?>

            <?php echo Form::text('custom_field4', $location->custom_field4, ['class' => 'form-control', 
                'placeholder' => __('lang_v1.custom_field', ['number' => 4])]);; ?>

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