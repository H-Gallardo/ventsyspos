<!-- Fix for scroll issue in new booking -->
<style type="text/css">
  .modal {
    overflow-y:auto; 
  }
</style>
<div class="modal-dialog" role="document">
  <div class="modal-content">

    <?php echo Form::open(['url' => action('NotificationController@send'), 'method' => 'post', 'id' => 'send_notification_form' ]); ?>


    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title"><?php echo e(app('translator')->getFromJson( 'lang_v1.send_notification' )); ?> - <?php echo e($template_name); ?></h4>
    </div>

    <div class="modal-body">
      <div class="form-group">
        <label class="radio-inline">
          <?php echo Form::radio('notification_type', 'email_only', true, ['class' => 'input-icheck']);; ?> <?php echo e(app('translator')->getFromJson('lang_v1.send_email_only')); ?>
        </label>
        <label class="radio-inline">
          <?php echo Form::radio('notification_type', 'sms_only', false, ['class' => 'input-icheck']);; ?> <?php echo e(app('translator')->getFromJson('lang_v1.send_sms_only')); ?>
        </label>
        <label class="radio-inline">
          <?php echo Form::radio('notification_type', 'both', false, ['class' => 'input-icheck']);; ?> <?php echo e(app('translator')->getFromJson('lang_v1.send_both_email_n_sms')); ?>
        </label>
      </div>
      <div id="email_div">
        <div class="form-group">
          <?php echo Form::label('to_email', __('lang_v1.to').':'); ?>

          <?php echo Form::email('to_email', $transaction->contact->email, ['class' => 'form-control' , 'placeholder' => __('lang_v1.to')]);; ?>

        </div>
        <div class="form-group">
          <?php echo Form::label('subject', __('lang_v1.email_subject').':'); ?>

          <?php echo Form::text('subject', $notification_template['subject'], ['class' => 'form-control' , 'placeholder' => __('lang_v1.email_subject')]);; ?>

        </div>
        <div class="form-group">
          <?php echo Form::label('email_body', __('lang_v1.email_body').':'); ?>

          <?php echo Form::textarea('email_body', $notification_template['email_body'], ['class' => 'form-control', 'placeholder' => __('lang_v1.email_body'), 'rows' => 6]);; ?>

        </div>
      </div>
      <div id="sms_div" class="hide">
        <div class="form-group">
          <?php echo Form::label('mobile_number', __('lang_v1.mobile_number').':'); ?>

          <?php echo Form::text('mobile_number', $transaction->contact->mobile, ['class' => 'form-control', 'placeholder' => __('lang_v1.mobile_number')]);; ?>

        </div>
        <div class="form-group">
          <?php echo Form::label('sms_body', __('lang_v1.sms_body').':'); ?>

          <?php echo Form::textarea('sms_body', $notification_template['sms_body'], ['class' => 'form-control', 'placeholder' => __('lang_v1.sms_body'), 'rows' => 6]);; ?>

        </div>
      </div>
      <strong><?php echo e(app('translator')->getFromJson('lang_v1.available_tags')); ?>:</strong> <p class="help-block"><?php echo e(implode(', ', $tags)); ?></p>
      <?php echo Form::hidden('transaction_id', $transaction->id);; ?>

      <?php echo Form::hidden('template_for', $notification_template['template_for']);; ?>


    <div class="modal-footer">
      <button type="submit" class="btn btn-primary" id="send_notification_btn"><?php echo e(app('translator')->getFromJson('lang_v1.send')); ?></button>
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(app('translator')->getFromJson('messages.close')); ?></button>
    </div>

    <?php echo Form::close(); ?>


  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->

<script type="text/javascript">
// Fix for not updating textarea value on modal
  CKEDITOR.on('instanceReady', function(){
     $.each( CKEDITOR.instances, function(instance) {
      CKEDITOR.instances[instance].on("change", function(e) {
          for ( instance in CKEDITOR.instances )
          CKEDITOR.instances[instance].updateElement();
      });
     });
  });
  $(document).ready(function(){
    CKEDITOR.replace('email_body');

    //initialize iCheck
    $('input[type="checkbox"].input-icheck, input[type="radio"].input-icheck').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue'
    });
  });

  $(document).on('ifChanged', 'input[type=radio][name=notification_type]', function(){
    var notification_type = $(this).val();
    if (notification_type == 'email_only') {
      $('div#email_div').removeClass('hide');
      $('div#sms_div').addClass('hide');
    } else if(notification_type == 'sms_only'){
      $('div#email_div').addClass('hide');
      $('div#sms_div').removeClass('hide');
    } else if(notification_type == 'both'){
      $('div#email_div').removeClass('hide');
      $('div#sms_div').removeClass('hide');
    }
  });
  $('#send_notification_form').submit(function(e){
    e.preventDefault();
    var data = $(this).serialize();
    $('#send_notification_btn').text("<?php echo e(app('translator')->getFromJson('lang_v1.sending')); ?>...");
    $('#send_notification_btn').attr('disabled', 'disabled');
    $.ajax({
      method: "POST",
      url: $(this).attr("action"),
      dataType: "json",
      data: data,
      success: function(result){
        if(result.success == true){
          $('div.view_modal').modal('hide');
          toastr.success(result.msg);
        } else {
          toastr.error(result.msg);
        }
        $('#send_notification_btn').text("<?php echo e(app('translator')->getFromJson('lang_v1.send')); ?>");
        $('#send_notification_btn').removeAttr('disabled');
      }
    });
  });
</script>