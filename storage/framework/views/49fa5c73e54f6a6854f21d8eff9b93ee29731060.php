<?php $__env->startSection('title', __('invoice.invoice_settings')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(app('translator')->getFromJson( 'invoice.invoice_settings' )); ?>
        <small><?php echo e(app('translator')->getFromJson( 'invoice.manage_your_invoices' )); ?></small>
    </h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true"><?php echo e(app('translator')->getFromJson('invoice.invoice_schemes')); ?></a></li>
              <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false"><?php echo e(app('translator')->getFromJson('invoice.invoice_layouts')); ?></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <div class="row">
                    <div class="col-md-12">
                        <h4><?php echo e(app('translator')->getFromJson( 'invoice.all_your_invoice_schemes' )); ?> <button type="button" class="btn btn-primary btn-modal pull-right" 
                                data-href="<?php echo e(action('InvoiceSchemeController@create')); ?>" 
                                data-container=".invoice_modal">
                                <i class="fa fa-plus"></i> <?php echo e(app('translator')->getFromJson( 'messages.add' )); ?></button></h4>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="invoice_table">
                            <thead>
                                <tr>
                                    <th><?php echo e(app('translator')->getFromJson( 'invoice.name' )); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.invoice_scheme_name') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></th>
                                    <th><?php echo e(app('translator')->getFromJson( 'invoice.prefix' )); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.invoice_scheme_prefix') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></th>
                                    <th><?php echo e(app('translator')->getFromJson( 'invoice.start_number' )); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.invoice_scheme_start_number') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></th>
                                    <th><?php echo e(app('translator')->getFromJson( 'invoice.invoice_count' )); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.invoice_scheme_count') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></th>
                                    <th><?php echo e(app('translator')->getFromJson( 'invoice.total_digits' )); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.invoice_scheme_total_digits') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></th>
                                    <th><?php echo e(app('translator')->getFromJson( 'messages.action' )); ?></th>
                                </tr>
                            </thead>
                        </table>
                        </div>
                    </div>
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <div class="row">
                    <div class="col-md-12">
                        <h4><?php echo e(app('translator')->getFromJson( 'invoice.all_your_invoice_layouts' )); ?> <a class="btn btn-primary pull-right" href="<?php echo e(action('InvoiceLayoutController@create')); ?>">
                                <i class="fa fa-plus"></i> <?php echo e(app('translator')->getFromJson( 'messages.add' )); ?></a></h4>
                    </div>
                    <div class="col-md-12">
                        <?php $__currentLoopData = $invoice_layouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $layout): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3">
                            <div class="icon-link">
                                <a href="<?php echo e(action('InvoiceLayoutController@edit', [$layout->id])); ?>">
                                    <i class="fa fa-file-text-o fa-4x"></i> 
                                    <?php echo e($layout->name); ?>

                                </a>
                                <?php if( $layout->is_default ): ?>
                                    <span class="badge bg-green"><?php echo e(app('translator')->getFromJson("barcode.default")); ?></span>
                                <?php endif; ?>
                                <?php if($layout->locations->count()): ?>
                                    <span class="link-des">
                                    <b><?php echo e(app('translator')->getFromJson('invoice.used_in_locations')); ?>: </b><br>
                                    <?php $__currentLoopData = $layout->locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e($location->name); ?>

                                        <?php if(!$loop->last): ?>
                                            ,
                                        <?php endif; ?>
                                        &nbsp;
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if( $loop->iteration % 4 == 0 ): ?>
                                    <div class="clearfix"></div>
                                <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <br>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
    </div>
	
    <div class="modal fade invoice_modal" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
    </div>
    <div class="modal fade invoice_edit_modal" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel">
    </div>

</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>