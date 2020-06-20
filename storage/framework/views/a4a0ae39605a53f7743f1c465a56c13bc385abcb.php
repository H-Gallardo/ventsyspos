<?php $__env->startSection('title', __('product.import_products')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(app('translator')->getFromJson('product.import_products')); ?>
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
                    <?php echo Form::open(['url' => action('ImportProductsController@store'), 'method' => 'post', 'enctype' => 'multipart/form-data' ]); ?>

                        <div class="row">
                            <div class="col-sm-6">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <?php echo Form::label('name', __( 'product.file_to_import' ) . ':'); ?>

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
                            <a href="<?php echo e(asset('uploads/files/import_products_csv_template.csv')); ?>" class="btn btn-success" download><i class="fa fa-download"></i> <?php echo e(app('translator')->getFromJson('product.download_csv_file_template')); ?></a>
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
                            <td><?php echo e(app('translator')->getFromJson('product.product_name')); ?> <small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.required')); ?>)</small></td>
                            <td><?php echo e(app('translator')->getFromJson('lang_v1.name_ins')); ?></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><?php echo e(app('translator')->getFromJson('product.brand')); ?> <small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.optional')); ?>)</small></td>
                            <td><?php echo e(app('translator')->getFromJson('lang_v1.brand_ins')); ?> <br><small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.brand_ins2')); ?>)</small></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><?php echo e(app('translator')->getFromJson('product.unit')); ?> <small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.required')); ?>)</small></td>
                            <td><?php echo e(app('translator')->getFromJson('lang_v1.unit_ins')); ?></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><?php echo e(app('translator')->getFromJson('product.category')); ?> <small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.optional')); ?>)</small></td>
                            <td><?php echo e(app('translator')->getFromJson('lang_v1.category_ins')); ?> <br><small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.category_ins2')); ?>)</small></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td><?php echo e(app('translator')->getFromJson('product.sub_category')); ?> <small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.optional')); ?>)</small></td>
                            <td><?php echo e(app('translator')->getFromJson('lang_v1.sub_category_ins')); ?> <br><small class="text-muted">(<?php echo __('lang_v1.sub_category_ins2'); ?>)</small></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td><?php echo e(app('translator')->getFromJson('product.sku')); ?> <small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.optional')); ?>)</small></td>
                            <td><?php echo e(app('translator')->getFromJson('lang_v1.sku_ins')); ?></td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td><?php echo e(app('translator')->getFromJson('product.barcode_type')); ?> <small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.optional')); ?>, <?php echo e(app('translator')->getFromJson('lang_v1.default')); ?>: C128)</small></td>
                            <td><?php echo e(app('translator')->getFromJson('lang_v1.barcode_type_ins')); ?> <br>
                                <strong><?php echo e(app('translator')->getFromJson('lang_v1.barcode_type_ins2')); ?>: C128, C39, EAN-13, EAN-8, UPC-A, UPC-E, ITF-14</strong>
                            </td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td><?php echo e(app('translator')->getFromJson('product.manage_stock')); ?> <small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.required')); ?>)</small></td>
                            <td><?php echo e(app('translator')->getFromJson('lang_v1.manage_stock_ins')); ?><br>
                                <strong>1 = <?php echo e(app('translator')->getFromJson('messages.yes')); ?><br>
                                0 = <?php echo e(app('translator')->getFromJson('messages.no')); ?></strong>
                            </td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td><?php echo e(app('translator')->getFromJson('product.alert_quantity')); ?> <small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.alert_qty_ins')); ?>)</small></td>
                            <td><?php echo e(app('translator')->getFromJson('product.alert_quantity')); ?></td>
                        </tr>
                        <!-- <tr>
                            <td>10</td>
                            <td><?php echo e(app('translator')->getFromJson('product.expires_in')); ?> <small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.optional')); ?>)</small></td>
                            <td><?php echo e(app('translator')->getFromJson('lang_v1.expires_in_ins')); ?></td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td><?php echo e(app('translator')->getFromJson('lang_v1.expire_period_unit')); ?> <small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.optional')); ?>)</small></td>
                            <td><?php echo e(app('translator')->getFromJson('lang_v1.expire_period_unit_ins')); ?><br>
                                <strong><?php echo e(app('translator')->getFromJson('lang_v1.available_options')); ?>: days, months</strong>
                            </td>
                        </tr> -->
                        <tr>
                            <td>10</td>
                            <td><?php echo e(app('translator')->getFromJson('product.applicable_tax')); ?> <small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.optional')); ?>)</small></td>
                            <td><?php echo e(app('translator')->getFromJson('lang_v1.applicable_tax_ins')); ?> <?php echo __('lang_v1.applicable_tax_help'); ?></td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td><?php echo e(app('translator')->getFromJson('product.selling_price_tax_type')); ?> <small class="text-muted">(<?php echo e(app('translator')->getFromJson('product.selling_price_tax_type')); ?>)</small></td>
                            <td><?php echo e(app('translator')->getFromJson('product.selling_price_tax_type')); ?> <br>
                                <strong><?php echo e(app('translator')->getFromJson('lang_v1.available_options')); ?>: inclusive, exclusive</strong>
                            </td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td> <?php echo e(app('translator')->getFromJson('lang_v1.purchase_price_inc_tax')); ?><br><small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.purchase_price_inc_tax_ins1')); ?>)</small></td>
                            <td><?php echo __('lang_v1.purchase_price_inc_tax_ins2'); ?></td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td><?php echo e(app('translator')->getFromJson('lang_v1.purchase_price_exc_tax')); ?>  <br><small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.purchase_price_exc_tax_ins1')); ?>)</small></td>
                            <td><?php echo __('lang_v1.purchase_price_exc_tax_ins2'); ?></td>
                        </tr>
                        <tr>
                            <td>14</td>
                            <td><?php echo e(app('translator')->getFromJson('lang_v1.profit_margin')); ?> <small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.optional')); ?>)</small></td>
                            <td><?php echo e(app('translator')->getFromJson('lang_v1.profit_margin_ins')); ?><br>
                                <small class="text-muted"><?php echo __('lang_v1.profit_margin_ins1'); ?></small></td>
                        </tr>
                        <tr>
                            <td>15</td>
                            <td><?php echo e(app('translator')->getFromJson('lang_v1.selling_price')); ?> <small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.optional')); ?>)</small></td>
                            <td><?php echo e(app('translator')->getFromJson('lang_v1.selling_price_ins')); ?><br>
                             <small class="text-muted"><?php echo __('lang_v1.selling_price_ins1'); ?></small></td>
                        </tr>
                        <tr>
                            <td>16</td>
                            <td><?php echo e(app('translator')->getFromJson('lang_v1.opening_stock')); ?> <small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.optional')); ?>)</small></td>
                            <td><?php echo e(app('translator')->getFromJson('lang_v1.opening_stock_ins')); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>17</td>
                            <td><?php echo e(app('translator')->getFromJson('lang_v1.product_custom_field1')); ?> <small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.optional')); ?>)</small></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>18</td>
                            <td><?php echo e(app('translator')->getFromJson('lang_v1.product_custom_field2')); ?> <small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.optional')); ?>)</small></td>
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