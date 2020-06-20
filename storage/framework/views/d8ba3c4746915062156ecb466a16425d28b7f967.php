<?php $__env->startSection('title', 'POS Installation - Check server'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <h3 class="text-center"><?php echo e(config('app.name', 'POS')); ?> Installation <small>Step 2 of 3</small></h3>

        <div class="col-md-8 col-md-offset-2">
          <hr/>
          <?php echo $__env->make('install.partials.nav', ['active' => 'app_details'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

          <div class="box box-primary active">
            <!-- /.box-header -->
            <div class="box-body">

              <?php if(session('error')): ?>
                <div class="alert alert-danger">
                  <?php echo e(session('error')); ?>

                </div>
              <?php endif; ?>

              <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                  <ul>
                  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
                </div>
              <?php endif; ?>

              <form class="form" id="details_form" method="post" 
                      action="<?php echo e(route('install.postDetails')); ?>">
                  <?php echo e(csrf_field()); ?>


                  <h4>Application Details</h4>
                  <hr/>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="app_name">Application Name:*</label>
                        <input type="text" class="form-control" name="APP_NAME" id="app_name" placeholder="Ultimate POS" required>
                    </div>
                  </div>
                  
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="app_title">Application Title:</label>
                        <input type="text" name="APP_TITLE" class="form-control" id="app_title">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="envato_purchase_code">Envato Purchase Code:*</label>
                        <input type="password" name="ENVATO_PURCHASE_CODE" required class="form-control" id="envato_purchase_code">
                    </div>
                  </div>

                  <?php if($activation_key): ?>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="envato_purchase_code">Activation Licence Code:*</label>
                          <input type="password" name="MAC_LICENCE_CODE" required class="form-control" id="activation_licence_code">
                      </div>
                    </div>
                  <?php endif; ?>
                  
                  <div class="clearfix"></div>
                  
                  <h4> Database Details <small>Make sure to provide correct information</small></h4>
                  <hr/>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="db_host">Database Host:*</label>
                        <input type="text" class="form-control" id="db_host" name="DB_HOST" required placeholder="localhost / 127.0.0.1">
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="db_port">Database Port:*</label>
                        <input type="text" class="form-control" id="db_port" name="DB_PORT" required value="3306">
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="db_database">Database Name:*</label>
                        <input type="text" class="form-control" id="db_database" name="DB_DATABASE" required>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="db_username">Database Username:*</label>
                        <input type="text" class="form-control" id="db_username" name="DB_USERNAME" required>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="db_password">Database Password:*</label>
                        <input type="password" class="form-control" id="db_password" name="DB_PASSWORD" required>
                    </div>
                  </div>

                  <div class="clearfix"></div>

                  <h4>Email Configuration<small> Use for sending mails</small></h4>
                  <hr/>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="MAIL_DRIVER">Send mails using:*</label>
                        <select class="form-control" name="MAIL_DRIVER" id="MAIL_DRIVER">
                          <option value="sendmail">PHP Mail</option>
                          <option value="smtp">SMTP</option>
                        </select>
                    </div>
                  </div>
                  <div class="clearfix"></div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="MAIL_FROM_ADDRESS">Default from address:*</label>
                        <input type="email" class="form-control" id="MAIL_FROM_ADDRESS" name="MAIL_FROM_ADDRESS" placeholder="hello@ultimatepos.com" required>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="MAIL_FROM_NAME">Default from name:</label>
                        <input type="text" class="form-control" id="MAIL_FROM_NAME" name="MAIL_FROM_NAME" placeholder="Ultimate POS (Optional)">
                    </div>
                  </div>

                  <div class="col-md-4 smtp hide">
                    <div class="form-group">
                        <label for="MAIL_HOST">SMTP Host:*</label>
                        <input type="text" class="form-control smtp_input" id="MAIL_HOST" name="MAIL_HOST" required disabled>
                    </div>
                  </div>

                  <div class="col-md-4  smtp hide">
                    <div class="form-group">
                        <label for="MAIL_PORT">SMTP Mail Port:*</label>
                        <input type="text" class="form-control smtp_input" id="MAIL_PORT" name="MAIL_PORT" required disabled>
                    </div>
                  </div>

                  <div class="col-md-4  smtp hide">
                    <div class="form-group">
                        <label for="MAIL_ENCRYPTION">SMTP Mail Encryption:*</label>
                        <input type="text" class="form-control smtp_input" id="MAIL_ENCRYPTION" name="MAIL_ENCRYPTION" required disabled placeholder="tls or ssl">
                    </div>
                  </div>

                  <div class="col-md-6  smtp hide">
                    <div class="form-group">
                        <label for="MAIL_USERNAME">SMTP Username:*</label>
                        <input type="text" class="form-control smtp_input" id="MAIL_USERNAME" name="MAIL_USERNAME" required disabled>
                    </div>
                  </div>

                  <div class="col-md-6  smtp hide">
                    <div class="form-group">
                        <label for="MAIL_PASSWORD">SMTP Password:*</label>
                        <input type="password" class="form-control smtp_input" id="MAIL_PASSWORD" name="MAIL_PASSWORD" required disabled>
                    </div>
                  </div>

                  <hr/>

                  <div class="col-md-12">
                    <a href="<?php echo e(route('install.index')); ?>" class="btn btn-default pull-left back_button" tabindex="-1">Back</a>
                    <button type="submit" id="install_button" class="btn btn-primary pull-right">Install</button>
                  </div>

                  <div class="col-md-12 text-center text-danger install_msg hide">
                    <small><strong>Installation in progress, Please do not refresh, go back or close the browser.</strong></small>
                  </div>

              </form>
            </div>
          <!-- /.box-body -->
          </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
  <script type="text/javascript">
    $(document).ready(function(){
      $('select#MAIL_DRIVER').change(function(){
        var driver = $(this).val();

        if(driver == 'smtp'){
          $('div.smtp').removeClass('hide');
          $('input.smtp_input').attr('disabled', false);
        } else {
          $('div.smtp').addClass('hide');
          $('input.smtp_input').attr('disabled', true);
        }
      })

      $('form#details_form').submit(function(){
        $('button#install_button').attr('disabled', true).text('Installing...');
        $('div.install_msg').removeClass('hide');
        $('.back_button').hide();
      });

    })
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth', ['no_header' => 1], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>