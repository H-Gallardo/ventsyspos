<?php $__env->startSection('title', 'Welcome - POS Installation'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    
    <div class="row">
      <h3 class="text-center"><?php echo e(config('app.name', 'POS')); ?> Installation <small>Step 1 of 3</small></h3>

        <div class="col-md-8 col-md-offset-2">
          <hr/>
          <?php echo $__env->make('install.partials.nav', ['active' => 'install'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

          <div class="box box-primary active">
            <!-- /.box-header -->
            <div class="box-body">
              <h3 class="text-success">
                Welcome to POS Installation!
              </h3>
              <p><strong class="text-danger">[IMPORTANT]</strong> Before you start installing make sure you have following information ready with you:</p>

              <ol>
                <li>
                  <b>Application Name</b> - Something short & Meaningful.
                </li>
                <li>
                  <b>Database informations:</b>
                  <ul>
                    <li>Username</li>
                    <li>Password</li>
                    <li>Database Name</li>
                    <li>Database Host</li>
                  </ul>
                </li>
                <li>
                  <b>Mail Configuration</b> - SMTP details (optional)
                </li>
                <li>
                  <b>Envato purchase code.</b> (<a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-" target="_blank">?</a>)
                </li>
              </ol>
              <a href="<?php echo e(route('install.details')); ?>" class="btn btn-primary pull-right">Let's Go!</a>
            </div>
          <!-- /.box-body -->
          </div>

        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', ['no_header' => 1], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>