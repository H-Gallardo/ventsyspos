<?php $__env->startSection('title', __('lang_v1.'.$type.'s')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1> <?php echo e(app('translator')->getFromJson('lang_v1.'.$type.'s')); ?>
        <small><?php echo e(app('translator')->getFromJson( 'contact.manage_your_contact', ['contacts' =>  __('lang_v1.'.$type.'s') ])); ?></small>
    </h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">
    <input type="hidden" value="<?php echo e($type); ?>" id="contact_type">

	<div class="box">
        <div class="box-header">
        	<h3 class="box-title"><?php echo e(app('translator')->getFromJson( 'contact.all_your_contact', ['contacts' => __('lang_v1.'.$type.'s') ])); ?></h3>
            <?php if(auth()->user()->can('supplier.create') || auth()->user()->can('customer.create')): ?>
            	<div class="box-tools">
                    <button type="button" class="btn btn-block btn-primary btn-modal" 
                    data-href="<?php echo e(action('ContactController@create', ['type' => $type])); ?>" 
                    data-container=".contact_modal">
                    <i class="fa fa-plus"></i> <?php echo e(app('translator')->getFromJson('messages.add')); ?></button>
                </div>
            <?php endif; ?>
        </div>
        <div class="box-body">
            <?php if(auth()->user()->can('supplier.view') || auth()->user()->can('customer.view')): ?>
                <div class="table-responsive">
            	<table class="table table-bordered table-striped" id="contact_table">
            		<thead>
            			<tr>
                            <th><?php echo e(app('translator')->getFromJson('lang_v1.contact_id')); ?></th>
                            <?php if($type == 'supplier'): ?> 
                				<th><?php echo e(app('translator')->getFromJson('business.business_name')); ?></th>
                				<th><?php echo e(app('translator')->getFromJson('contact.name')); ?></th>
                				<th><?php echo e(app('translator')->getFromJson('contact.contact')); ?></th>
                                <th><?php echo e(app('translator')->getFromJson('contact.total_purchase_due')); ?></th>
                                <th><?php echo e(app('translator')->getFromJson('lang_v1.total_purchase_return_due')); ?></th>
                                <th><?php echo e(app('translator')->getFromJson('messages.action')); ?></th>
                            <?php elseif( $type == 'customer'): ?>
                                <th><?php echo e(app('translator')->getFromJson('user.name')); ?></th>
                                <th><?php echo e(app('translator')->getFromJson('lang_v1.customer_group')); ?></th>
                                <th><?php echo e(app('translator')->getFromJson('business.address')); ?></th>
                                <th><?php echo e(app('translator')->getFromJson('contact.contact')); ?></th>
                                <th><?php echo e(app('translator')->getFromJson('contact.total_sale_due')); ?></th>
                                <th><?php echo e(app('translator')->getFromJson('lang_v1.total_sell_return_due')); ?></th>
                                <th><?php echo e(app('translator')->getFromJson('messages.action')); ?></th>
                            <?php endif; ?>
            			</tr>
            		</thead>
                    <tfoot>
                        <tr class="bg-gray font-17 text-center footer-total">
                            <td <?php if($type == 'supplier'): ?> colspan="4" <?php elseif( $type == 'customer'): ?> colspan="5" <?php endif; ?>><strong><?php echo e(app('translator')->getFromJson('sale.total')); ?>:</strong></td>
                            <td><span class="display_currency" id="footer_contact_due" data-currency_symbol ="true"></span></td>
                            <td><span class="display_currency" id="footer_contact_return_due" data-currency_symbol ="true"></span></td>
                            <td></td>
                        </tr>
                    </tfoot>
            	</table>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="modal fade contact_modal" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
    </div>
    <div class="modal fade pay_contact_due_modal" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel">
    </div>

</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>