<?php $__env->startSection('title', __('lang_v1.import_opening_stock')); ?>

<?php $__env->startSection('content'); ?>
<br/>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(app('translator')->getFromJson('lang_v1.import_opening_stock')); ?></h1>
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
                    <?php echo Form::open(['url' => action('ImportOpeningStockController@store'), 'method' => 'post', 'enctype' => 'multipart/form-data' ]); ?>

                        <div class="row">
                            <div class="col-sm-6">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <?php echo Form::label('name', __( 'product.file_to_import' ) . ':'); ?>

                                    <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('lang_v1.tooltip_import_opening_stock') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                                    <?php echo Form::file('products_csv', ['accept'=> '.csv']);; ?>

                                  </div>
                            </div>
                            <div class="col-sm-4">
                            <br>
                                <button type="submit" class="btn btn-primary"><?php echo e(app('translator')->getFromJson('messages.submit')); ?></button>
                            </div>
                            </div>
                        </div>

                    <?php echo Form::close(); ?>

                    <br><br>
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="<?php echo e(asset('uploads/files/import_opening_stock_csv_template.csv')); ?>" class="btn btn-success" download><i class="fa fa-download"></i> <?php echo e(app('translator')->getFromJson('product.download_csv_file_template')); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-solid">
                <div class="box-header">
                  <h3 class="box-title"><?php echo e(app('translator')->getFromJson('lang_v1.instructions')); ?></h3>
                </div>
                <div class="box-body">
                    <strong><?php echo e(app('translator')->getFromJson('lang_v1.instruction_line1')); ?></strong><br>
                    <?php echo e(app('translator')->getFromJson('lang_v1.instruction_line2')); ?>
                    <br><br>
                    <table class="table table-striped">
                        <tr>
                            <th><?php echo e(app('translator')->getFromJson('lang_v1.col_no')); ?></th>
                            <th><?php echo e(app('translator')->getFromJson('lang_v1.col_name')); ?></th>
                            <th><?php echo e(app('translator')->getFromJson('lang_v1.instruction')); ?></th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td><?php echo e(app('translator')->getFromJson('product.sku')); ?><small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.required')); ?>)</small></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><?php echo e(app('translator')->getFromJson('lang_v1.quantity')); ?> <small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.required')); ?>)</small></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><?php echo e(app('translator')->getFromJson('purchase.unit_cost_before_tax')); ?> <small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.required')); ?>)</small></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>