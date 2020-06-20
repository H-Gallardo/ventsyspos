<?php $__env->startSection('title', __( 'user.edit_user' )); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(app('translator')->getFromJson( 'user.edit_user' )); ?></h1>
</section>

<!-- Main content -->
<section class="content">
<div class="box">
    <div class="box-body">
    <div class="row">
    <?php echo Form::open(['url' => action('ManageUserController@update', [$user->id]), 'method' => 'PUT', 'id' => 'user_edit_form' ]); ?>

      <div class="col-md-2">
        <div class="form-group">
          <?php echo Form::label('surname', __( 'business.prefix' ) . ':'); ?>

            <?php echo Form::text('surname', $user->surname, ['class' => 'form-control', 'placeholder' => __( 'business.prefix_placeholder' ) ]);; ?>

        </div>
      </div>
      <div class="col-md-5">
        <div class="form-group">
          <?php echo Form::label('first_name', __( 'business.first_name' ) . ':*'); ?>

            <?php echo Form::text('first_name', $user->first_name, ['class' => 'form-control', 'required', 'placeholder' => __( 'business.first_name' ) ]);; ?>

        </div>
      </div>
      <div class="col-md-5">
        <div class="form-group">
          <?php echo Form::label('last_name', __( 'business.last_name' ) . ':'); ?>

            <?php echo Form::text('last_name', $user->last_name, ['class' => 'form-control', 'placeholder' => __( 'business.last_name' ) ]);; ?>

        </div>
      </div>
      <div class="clearfix"></div>
      <div class="col-md-12">
        <div class="form-group">
          <?php echo Form::label('email', __( 'business.email' ) . ':*'); ?>

            <?php echo Form::text('email', $user->email, ['class' => 'form-control', 'required', 'placeholder' => __( 'business.email' ) ]);; ?>

        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <?php echo Form::label('role', __( 'user.role' ) . ':*'); ?>

            <?php echo Form::select('role', $roles, $user->roles->first()->id, ['class' => 'form-control select2']);; ?>

        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <?php echo Form::label('password', __( 'business.password' ) . ':'); ?>

            <?php echo Form::password('password', ['class' => 'form-control', 'placeholder' => __( 'business.password' ) ]);; ?>

            <p class="help-block"><?php echo e(app('translator')->getFromJson('user.leave_password_blank')); ?></p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <?php echo Form::label('confirm_password', __( 'business.confirm_password' ) . ':'); ?>

            <?php echo Form::password('confirm_password', ['class' => 'form-control', 'placeholder' => __( 'business.confirm_password' ) ]);; ?>

          
        </div>
      </div>
      <div class="clearfix"></div>
      
      <div class="col-md-4">
        <div class="form-group">
          <?php echo Form::label('cmmsn_percent', __( 'lang_v1.cmmsn_percent' ) . ':'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('lang_v1.commsn_percent_help') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
            <?php echo Form::number('cmmsn_percent', $user->cmmsn_percent, ['class' => 'form-control', 'placeholder' => __( 'lang_v1.cmmsn_percent' ), 'step' => 0.01]);; ?>

        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
            <div class="checkbox">
            <br/>
              <label>
                <?php echo Form::checkbox('selected_contacts', 1, 
                $user->selected_contacts, 
                [ 'class' => 'input-icheck', 'id' => 'selected_contacts']);; ?> <?php echo e(__( 'lang_v1.enable_selected_contacts' )); ?>

              </label>
              <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('lang_v1.tooltip_enable_selected_contacts') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
            </div>
        </div>
      </div>

      <div class="col-sm-4 selected_contacts_div <?php if(!$user->selected_contacts): ?> hide <?php endif; ?>">
          <div class="form-group">
              <?php echo Form::label('selected_contacts', __('lang_v1.selected_contacts') . ':'); ?>

              <div class="form-group">
                  <?php echo Form::select('selected_contact_ids[]', $contacts, $contact_access, ['class' => 'form-control select2', 'multiple', 'style' => 'width: 100%;' ]);; ?>

              </div>
          </div>
      </div>

      <div class="clearfix"></div>
      <div class="col-md-4">
        <div class="form-group">
          <div class="checkbox">
            <label>
                 <?php echo Form::checkbox('is_active', $user->status, $is_checked_checkbox, ['class' => 'input-icheck status']);; ?> <?php echo e(__('lang_v1.status_for_user')); ?>

            </label>
            <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('lang_v1.tooltip_enable_user_active') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
          </div>
        </div>
      </div>

    </div>
    <div class="row">
     <div class="col-md-12">
      <button type="submit" class="btn btn-primary pull-right" id="submit_user_button"><?php echo e(app('translator')->getFromJson( 'messages.update' )); ?></button>
      </div>
    </div>
    </div>

    <?php echo Form::close(); ?>


  </div><!-- /.modal-content -->
  <?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
  $(document).ready(function(){
    $('#selected_contacts').on('ifChecked', function(event){
      $('div.selected_contacts_div').removeClass('hide');
    });
    $('#selected_contacts').on('ifUnchecked', function(event){
      $('div.selected_contacts_div').addClass('hide');
    });
  });

  $('form#user_edit_form').validate({
                rules: {
                    first_name: {
                        required: true,
                    },
                    email: {
                        email: true
                    },
                    password: {
                        minlength: 5
                    },
                    confirm_password: {
                        equalTo: "#password",
                    }
                },
                messages: {
                    password: {
                        minlength: 'Password should be minimum 5 characters',
                    },
                    confirm_password: {
                        equalTo: 'Should be same as password'
                    },
                    username: {
                        remote: 'Invalid username or User already exist'
                    }
                }
            });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>