<?php $__env->startSection('title', __( 'tax_rate.tax_rates' )); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(app('translator')->getFromJson( 'tax_rate.tax_rates' )); ?>
        <small><?php echo e(app('translator')->getFromJson( 'tax_rate.manage_your_tax_rates' )); ?></small>
    </h1>
</section>

<!-- Main content -->
<section class="content">

	<div class="box">
        <div class="box-header">
        	<h3 class="box-title"><?php echo e(app('translator')->getFromJson( 'tax_rate.all_your_tax_rates' )); ?></h3>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tax_rate.create')): ?>
            	<div class="box-tools">
                    <button type="button" class="btn btn-block btn-primary btn-modal" 
                    	data-href="<?php echo e(action('TaxRateController@create')); ?>" 
                    	data-container=".tax_rate_modal">
                    	<i class="fa fa-plus"></i> <?php echo e(app('translator')->getFromJson( 'messages.add' )); ?></button>
                </div>
            <?php endif; ?>
        </div>
        <div class="box-body">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tax_rate.view')): ?>
                <div class="table-responsive">
            	<table class="table table-bordered table-striped" id="tax_rates_table">
            		<thead>
            			<tr>
            				<th><?php echo e(app('translator')->getFromJson( 'tax_rate.name' )); ?></th>
            				<th><?php echo e(app('translator')->getFromJson( 'tax_rate.rate' )); ?></th>
                            <th><?php echo e(app('translator')->getFromJson( 'messages.action' )); ?></th>
            			</tr>
            		</thead>
            	</table>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?php echo e(app('translator')->getFromJson( 'tax_rate.tax_groups' )); ?> ( <?php echo e(app('translator')->getFromJson('lang_v1.combination_of_taxes')); ?> ) <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.tax_groups') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></h3>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tax_rate.create')): ?>
            <div class="box-tools">
                <button type="button" class="btn btn-block btn-primary btn-modal" 
                    data-href="<?php echo e(action('GroupTaxController@create')); ?>" 
                    data-container=".tax_group_modal">
                    <i class="fa fa-plus"></i> <?php echo e(app('translator')->getFromJson( 'messages.add' )); ?></button>
            </div>
            <?php endif; ?>
        </div>
        <div class="box-body">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tax_rate.view')): ?>
            <div class="table-responsive">
            <table class="table table-bordered table-striped" id="tax_groups_table">
                <thead>
                    <tr>
                        <th><?php echo e(app('translator')->getFromJson( 'tax_rate.name' )); ?></th>
                        <th><?php echo e(app('translator')->getFromJson( 'tax_rate.rate' )); ?></th>
                        <th><?php echo e(app('translator')->getFromJson( 'tax_rate.sub_taxes' )); ?></th>
                        <th><?php echo e(app('translator')->getFromJson( 'messages.action' )); ?></th>
                    </tr>
                </thead>
            </table>
            </div>
            <?php endif; ?>
        </div>
    </div>
    

    <div class="modal fade tax_rate_modal" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
    </div>
    <div class="modal fade tax_group_modal" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel">
    </div>

</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>