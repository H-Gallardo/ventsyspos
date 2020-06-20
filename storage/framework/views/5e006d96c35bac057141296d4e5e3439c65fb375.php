<?php $__env->startSection('title', __('lang_v1.import_contacts')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(app('translator')->getFromJson('lang_v1.import_contacts')); ?>
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
                    <?php echo Form::open(['url' => action('ContactController@postImportContacts'), 'method' => 'post', 'enctype' => 'multipart/form-data' ]); ?>

                        <div class="row">
                            <div class="col-sm-6">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <?php echo Form::label('name', __( 'product.file_to_import' ) . ':'); ?>

                                    <?php echo Form::file('contacts_csv', ['accept'=> '.csv']);; ?>

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
                            <a href="<?php echo e(asset('uploads/files/import_contacts_csv_template.csv')); ?>" class="btn btn-success" download><i class="fa fa-download"></i> <?php echo e(app('translator')->getFromJson('product.download_csv_file_template')); ?></a>
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
                            <td><?php echo e(app('translator')->getFromJson('contact.contact_type')); ?> <small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.required')); ?>)</small></td>
                            <td><?php echo __('lang_v1.contact_type_ins'); ?></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><?php echo e(app('translator')->getFromJson('contact.name')); ?> <small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.required')); ?>)</small></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><?php echo e(app('translator')->getFromJson('business.business_name')); ?> <br><small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.required_if_supplier')); ?>)</small></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><?php echo e(app('translator')->getFromJson('lang_v1.contact_id')); ?> <small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.optional')); ?>)</small></td>
                            <td><?php echo e(app('translator')->getFromJson('lang_v1.contact_id_ins')); ?></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td><?php echo e(app('translator')->getFromJson('contact.tax_no')); ?> <small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.optional')); ?>)</small></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td><?php echo e(app('translator')->getFromJson('lang_v1.opening_balance')); ?> <small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.optional')); ?>)</small></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td><?php echo e(app('translator')->getFromJson('contact.pay_term')); ?> <br><small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.required_if_supplier')); ?>)</small></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td><?php echo e(app('translator')->getFromJson('contact.pay_term_period')); ?> <br><small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.required_if_supplier')); ?>)</small></td>
                            <td><strong><?php echo e(app('translator')->getFromJson('lang_v1.pay_term_period_ins')); ?></strong></td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td><?php echo e(app('translator')->getFromJson('lang_v1.credit_limit')); ?> <small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.optional')); ?>)</small></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td><?php echo e(app('translator')->getFromJson('business.email')); ?> <small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.optional')); ?>)</small></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td><?php echo e(app('translator')->getFromJson('contact.mobile')); ?> <small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.required')); ?>)</small></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td><?php echo e(app('translator')->getFromJson('contact.alternate_contact_number')); ?> <small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.optional')); ?>)</small></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td><?php echo e(app('translator')->getFromJson('contact.landline')); ?> <small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.optional')); ?>)</small></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>14</td>
                            <td><?php echo e(app('translator')->getFromJson('business.city')); ?> <small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.optional')); ?>)</small></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>15</td>
                            <td><?php echo e(app('translator')->getFromJson('business.state')); ?> <small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.optional')); ?>)</small></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>16</td>
                            <td><?php echo e(app('translator')->getFromJson('business.country')); ?> <small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.optional')); ?>)</small></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>17</td>
                            <td><?php echo e(app('translator')->getFromJson('business.landmark')); ?> <small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.optional')); ?>)</small></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>18</td>
                             <td><?php echo e(app('translator')->getFromJson('lang_v1.custom_field', ['number' => 1])); ?> <small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.optional')); ?>)</small></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>19</td>
                            <td><?php echo e(app('translator')->getFromJson('lang_v1.custom_field', ['number' => 2])); ?> <small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.optional')); ?>)</small></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>20</td>
                            <td><?php echo e(app('translator')->getFromJson('lang_v1.custom_field', ['number' => 3])); ?> <small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.optional')); ?>)</small></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>21</td>
                            <td><?php echo e(app('translator')->getFromJson('lang_v1.custom_field', ['number' => 4])); ?> <small class="text-muted">(<?php echo e(app('translator')->getFromJson('lang_v1.optional')); ?>)</small></td>
                            <td>&nbsp;</td>
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