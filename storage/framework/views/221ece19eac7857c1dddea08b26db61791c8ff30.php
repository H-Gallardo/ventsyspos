<?php $__env->startSection('title', __('lang_v1.sales_commission_agents')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(app('translator')->getFromJson( 'lang_v1.sales_commission_agents' )); ?>
    </h1>
</section>

<!-- Main content -->
<section class="content">

	<div class="box">
        <div class="box-body">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user.create')): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <button type="button" class="btn btn-primary btn-modal pull-right" 
                            data-href="<?php echo e(action('SalesCommissionAgentController@create')); ?>" 
                            data-container=".commission_agent_modal">
                            <i class="fa fa-plus"></i> <?php echo e(app('translator')->getFromJson( 'messages.add' )); ?></button>
                    </div>
                </div>
                <br>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user.view')): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                    	<table class="table table-bordered table-striped" id="sales_commission_agent_table">
                    		<thead>
                    			<tr>
                    				<th><?php echo e(app('translator')->getFromJson( 'user.name' )); ?></th>
                    				<th><?php echo e(app('translator')->getFromJson( 'business.email' )); ?></th>
                                    <th><?php echo e(app('translator')->getFromJson( 'lang_v1.contact_no' )); ?></th>
                                    <th><?php echo e(app('translator')->getFromJson( 'business.address' )); ?></th>
                                    <th><?php echo e(app('translator')->getFromJson( 'lang_v1.cmmsn_percent' )); ?></th>
                    				<th><?php echo e(app('translator')->getFromJson( 'messages.action' )); ?></th>
                    			</tr>
                    		</thead>
                    	</table>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="modal fade commission_agent_modal" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
    </div>

</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>