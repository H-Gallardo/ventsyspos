<?php $__env->startSection('title', 'POS Installation - Check server'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <h3 class="text-center"><?php echo e(config('app.name', 'POS')); ?> Installation <small>Step 2 of 3</small></h3>

        <div class="col-md-8 col-md-offset-2">
          <hr/>
          <?php echo $__env->make('install.partials.nav', ['active' => 'server'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

          <div class="box box-primary active" id="Installation">
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table">
                <tr>
                  <td>PHP >= 7.1</td>
                  <td>
                    <?php if($output['php']): ?>
                      <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>
                    <?php else: ?>
                      <i class="fa fa-close text-danger" aria-hidden="true"></i>
                    <?php endif; ?>
                  </td>
                </tr>

                <tr>
                  <td>OpenSSL PHP Extension</td>
                  <td>
                    <?php if($output['openssl']): ?>
                      <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>
                    <?php else: ?>
                      <i class="fa fa-close text-danger" aria-hidden="true"></i>
                    <?php endif; ?>
                  </td>
                </tr>

                <tr>
                  <td>PDO PHP Extension</td>
                  <td>
                    <?php if($output['pdo']): ?>
                      <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>
                    <?php else: ?>
                      <i class="fa fa-close text-danger" aria-hidden="true"></i>
                    <?php endif; ?>
                  </td>
                </tr>

                <tr>
                  <td>Mbstring PHP Extension</td>
                  <td>
                    <?php if($output['mbstring']): ?>
                      <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>
                    <?php else: ?>
                      <i class="fa fa-close text-danger" aria-hidden="true"></i>
                    <?php endif; ?>
                  </td>
                </tr>

                <tr>
                  <td>Tokenizer PHP Extension</td>
                  <td>
                    <?php if($output['tokenizer']): ?>
                      <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>
                    <?php else: ?>
                      <i class="fa fa-close text-danger" aria-hidden="true"></i>
                    <?php endif; ?>
                  </td>
                </tr>

                <tr>
                  <td>XML PHP Extension</td>
                  <td>
                    <?php if($output['xml']): ?>
                      <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>
                    <?php else: ?>
                      <i class="fa fa-close text-danger" aria-hidden="true"></i>
                    <?php endif; ?>
                  </td>
                </tr>

                <tr>
                  <td>cURL PHP Extension</td>
                  <td>
                    <?php if($output['curl']): ?>
                      <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>
                    <?php else: ?>
                      <i class="fa fa-close text-danger" aria-hidden="true"></i>
                    <?php endif; ?>
                  </td>
                </tr>

                <tr>
                  <td colspan="2">&nbsp;</td>
                </tr>

                <tr>
                  <td><code><?php echo e(storage_path()); ?></code> is writable</td>
                  <td>
                    <?php if($output['storage_writable']): ?>
                      <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>
                    <?php else: ?>
                      <i class="fa fa-close text-danger" aria-hidden="true"></i>
                    <?php endif; ?>
                  </td>
                </tr>

                <tr>
                  <td><code><?php echo e(base_path('bootstrap/cache')); ?></code> is writable</td>
                  <td>
                    <?php if($output['cache_writable']): ?>
                      <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>
                    <?php else: ?>
                      <i class="fa fa-close text-danger" aria-hidden="true"></i>
                    <?php endif; ?>
                  </td>
                </tr>
                      
            </table>

              <br/>
              <a href="<?php echo e(route('install.index')); ?>" class="btn btn-default pull-left">Back</a>

              <a <?php if($output['next']): ?> href="<?php echo e(route('install.details')); ?>" <?php endif; ?> class="btn btn-primary pull-right <?php if(!$output['next']): ?> disabled-link <?php endif; ?>" <?php if(!$output['next']): ?> disabled onclick="return false;" <?php endif; ?>>Next</a>
            </div>
          <!-- /.box-body -->
          </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth', ['no_header' => 1], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>