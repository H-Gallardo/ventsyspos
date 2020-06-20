<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
  <?php
    $form_id = 'contact_add_form';
    if(isset($quick_add)){
    $form_id = 'quick_add_contact';
    }
  ?>
    <?php echo Form::open(['url' => action('ContactController@store'), 'method' => 'post', 'id' => $form_id ]); ?>


    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo e(app('translator')->getFromJson('contact.add_contact')); ?></h4>
    </div>

    <div class="modal-body">
      <div class="row">

      <div class="col-md-6 contact_type_div">
        <div class="form-group">
            <?php echo Form::label('type', __('contact.contact_type') . ':*' ); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-user"></i>
                </span>
                <?php echo Form::select('type', $types, null , ['class' => 'form-control', 'id' => 'contact_type','placeholder' => __('messages.please_select'), 'required']);; ?>

            </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('name', __('contact.name') . ':*'); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-user"></i>
                </span>
                <?php echo Form::text('name', null, ['class' => 'form-control','placeholder' => __('contact.name'), 'required']);; ?>

            </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="col-md-4 supplier_fields">
        <div class="form-group">
            <?php echo Form::label('supplier_business_name', __('business.business_name') . ':*'); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-briefcase"></i>
                </span>
                <?php echo Form::text('supplier_business_name', null, ['class' => 'form-control', 'required', 'placeholder' => __('business.business_name')]);; ?>

            </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
            <?php echo Form::label('contact_id', __('lang_v1.contact_id') . ':'); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-id-badge"></i>
                </span>
                <?php echo Form::text('contact_id', null, ['class' => 'form-control','placeholder' => __('lang_v1.contact_id')]);; ?>

            </div>
        </div>
      </div>
        <div class="col-md-4">
          <div class="form-group">
              <?php echo Form::label('tax_number', __('contact.tax_no') . ':'); ?>

              <div class="input-group">
                  <span class="input-group-addon">
                      <i class="fa fa-info"></i>
                  </span>
                  <?php echo Form::text('tax_number', null, ['class' => 'form-control', 'placeholder' => __('contact.tax_no')]);; ?>

              </div>
          </div>
        </div>
        <div class="clearfix"></div>

        <div class="col-md-4">
          <div class="form-group">
              <?php echo Form::label('opening_balance', __('lang_v1.opening_balance') . ':'); ?>

              <div class="input-group">
                  <span class="input-group-addon">
                      <i class="fa fa-money"></i>
                  </span>
                  <?php echo Form::text('opening_balance', 0, ['class' => 'form-control input_number']);; ?>

              </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <div class="multi-input">
              <?php echo Form::label('pay_term_number', __('contact.pay_term') . ':'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.pay_term') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
              <br/>
              <?php echo Form::number('pay_term_number', null, ['class' => 'form-control width-40 pull-left', 'placeholder' => __('contact.pay_term')]);; ?>


              <?php echo Form::select('pay_term_type', ['months' => __('lang_v1.months'), 'days' => __('lang_v1.days')], '', ['class' => 'form-control width-60 pull-left','placeholder' => __('messages.please_select')]);; ?>

            </div>
          </div>
        </div>
        
        <div class="col-md-4 customer_fields">
          <div class="form-group">
              <?php echo Form::label('customer_group_id', __('lang_v1.customer_group') . ':'); ?>

              <div class="input-group">
                  <span class="input-group-addon">
                      <i class="fa fa-users"></i>
                  </span>
                  <?php echo Form::select('customer_group_id', $customer_groups, '', ['class' => 'form-control']);; ?>

              </div>
          </div>
        </div>
        <div class="col-md-4 customer_fields">
          <div class="form-group">
              <?php echo Form::label('credit_limit', __('lang_v1.credit_limit') . ':'); ?>

              <div class="input-group">
                  <span class="input-group-addon">
                      <i class="fa fa-money"></i>
                  </span>
                  <?php echo Form::text('credit_limit', null, ['class' => 'form-control input_number']);; ?>

              </div>
              <p class="help-block"><?php echo e(app('translator')->getFromJson('lang_v1.credit_limit_help')); ?></p>
          </div>
        </div>
      <div class="col-md-12">
        <hr/>
      </div>
      <div class="col-md-3">
        <div class="form-group">
            <?php echo Form::label('email', __('business.email') . ':'); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </span>
                <?php echo Form::email('email', null, ['class' => 'form-control','placeholder' => __('business.email')]);; ?>

            </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
            <?php echo Form::label('mobile', __('contact.mobile') . ':*'); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-mobile"></i>
                </span>
                <?php echo Form::text('mobile', null, ['class' => 'form-control', 'required', 'placeholder' => __('contact.mobile')]);; ?>

            </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
            <?php echo Form::label('alternate_number', __('contact.alternate_contact_number') . ':'); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-phone"></i>
                </span>
                <?php echo Form::text('alternate_number', null, ['class' => 'form-control', 'placeholder' => __('contact.alternate_contact_number')]);; ?>

            </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
            <?php echo Form::label('landline', __('contact.landline') . ':'); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-phone"></i>
                </span>
                <?php echo Form::text('landline', null, ['class' => 'form-control', 'placeholder' => __('contact.landline')]);; ?>

            </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="col-md-3">
        <div class="form-group">
            <?php echo Form::label('city', __('business.city') . ':'); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-map-marker"></i>
                </span>
                <?php echo Form::text('city', null, ['class' => 'form-control', 'placeholder' => __('business.city')]);; ?>

            </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
            <?php echo Form::label('state', __('business.state') . ':'); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-map-marker"></i>
                </span>
                <?php echo Form::text('state', null, ['class' => 'form-control', 'placeholder' => __('business.state')]);; ?>

            </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
            <?php echo Form::label('country', __('business.country') . ':'); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-globe"></i>
                </span>
                <?php echo Form::text('country', null, ['class' => 'form-control', 'placeholder' => __('business.country')]);; ?>

            </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
            <?php echo Form::label('landmark', __('business.landmark') . ':'); ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-map-marker"></i>
                </span>
                <?php echo Form::text('landmark', null, ['class' => 'form-control', 
                'placeholder' => __('business.landmark')]);; ?>

            </div>
        </div>
      </div>
      <div class="<?php if(isset($quick_add)): ?> hide <?php endif; ?>"> 
      <div class="clearfix"></div>
      <div class="col-md-12">
        <hr/>
      </div>
      <div class="col-md-3">
        <div class="form-group">
            <?php echo Form::label('custom_field1', __('lang_v1.custom_field', ['number' => 1]) . ':'); ?>

            <?php echo Form::text('custom_field1', null, ['class' => 'form-control', 
                'placeholder' => __('lang_v1.custom_field', ['number' => 1])]);; ?>

        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
            <?php echo Form::label('custom_field2', __('lang_v1.custom_field', ['number' => 2]) . ':'); ?>

            <?php echo Form::text('custom_field2', null, ['class' => 'form-control', 
                'placeholder' => __('lang_v1.custom_field', ['number' => 2])]);; ?>

        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
            <?php echo Form::label('custom_field3', __('lang_v1.custom_field', ['number' => 3]) . ':'); ?>

            <?php echo Form::text('custom_field3', null, ['class' => 'form-control', 
                'placeholder' => __('lang_v1.custom_field', ['number' => 3])]);; ?>

        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
            <?php echo Form::label('custom_field4', __('lang_v1.custom_field', ['number' => 4]) . ':'); ?>

            <?php echo Form::text('custom_field4', null, ['class' => 'form-control', 
                'placeholder' => __('lang_v1.custom_field', ['number' => 4])]);; ?>

        </div>
      </div>
      </div>
      <div class="clearfix"></div>

    </div>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary"><?php echo e(app('translator')->getFromJson( 'messages.save' )); ?></button>
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(app('translator')->getFromJson( 'messages.close' )); ?></button>
    </div>

    <?php echo Form::close(); ?>

  
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->