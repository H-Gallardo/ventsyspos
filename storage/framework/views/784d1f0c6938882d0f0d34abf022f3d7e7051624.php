<?php $__env->startSection('title', __('lang_v1.backup')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(app('translator')->getFromJson('lang_v1.backup')); ?>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    
  <?php if(session('notification') || !empty($notification)): ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php if(!empty($notification['msg'])): ?>
                    <?php echo e($notification['msg']); ?>

                <?php elseif(session('notification.msg')): ?>
                    <?php echo e(session('notification.msg')); ?>

                <?php endif; ?>
              </div>
          </div>  
      </div>     
  <?php endif; ?>

  <div class="row">
    <div class="col-sm-12">
      <div class="box">
        <div class="box-body">
            <div class="row">
              <div class="col-sm-4">
                <br/>
                  <a href="<?php echo e(action('BackUpController@create')); ?>" class="btn btn-success"><i class="fa fa-download"></i> <?php echo e(app('translator')->getFromJson('lang_v1.download_complete_backup')); ?></a>
                <br/>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>

</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>