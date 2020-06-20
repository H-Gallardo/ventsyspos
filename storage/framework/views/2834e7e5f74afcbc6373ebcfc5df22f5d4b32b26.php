<?php $__env->startSection('title', 'POS Installation - Check server'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <h1 class="page-header text-center"><?php echo e(config('app.name', 'POS')); ?></h1>

        <div class="col-md-8 col-md-offset-2">
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

              <form class="form" method="post" 
                    action="<?php echo e(route('install.installAlternate')); ?>" 
                    id="env_details_form">
                  <?php echo e(csrf_field()); ?>


                  <h4>Hey, I need your help. </h4>
                  <p>
                    Please create a file with name <code>.env</code> in application folder with <code>read & write permission</code> and paste the below content. <br/> Press install after it.
                  </p>
                  <hr/>

                  <div class="col-md-12">
                    <div class="form-group">
                        <textarea rows="25" cols="50"><?php echo e($envContent); ?></textarea>
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-primary pull-right" id="install_button">Install</button>
                  </div>

                  <div class="col-md-12 text-center text-danger install_msg hide">
                    <small>
                      <strong>Installation in progress, Please do not refresh, go back or close the browser.</strong>
                    </small>
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

      $('form#env_details_form').submit(function(){
        $('button#install_button').attr('disabled', true).text('Installing...');
        $('div.install_msg').removeClass('hide');
        $('.back_button').hide();
      });

    })
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth', ['no_header' => 1], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>