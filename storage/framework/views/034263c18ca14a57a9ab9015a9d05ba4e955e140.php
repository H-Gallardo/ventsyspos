<?php $__env->startSection('title', __('home.home')); ?>

<?php $__env->startSection('css'); ?>
    <?php echo Charts::styles(['highcharts']); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(__('home.welcome_message', ['name' => Session::get('user.first_name')])); ?>

    </h1>
</section>
<?php if(auth()->user()->can('dashboard.data')): ?>
<!-- Main content -->
<section class="content no-print">
	<div class="row">
		<div class="col-md-12 col-xs-12">
			<div class="btn-group pull-right" data-toggle="buttons">
				<label class="btn btn-info active">
    				<input type="radio" name="date-filter"
    				data-start="<?php echo e(date('Y-m-d')); ?>" 
    				data-end="<?php echo e(date('Y-m-d')); ?>"
    				checked> <?php echo e(__('home.today')); ?>

  				</label>
  				<label class="btn btn-info">
    				<input type="radio" name="date-filter"
    				data-start="<?php echo e($date_filters['this_week']['start']); ?>" 
    				data-end="<?php echo e($date_filters['this_week']['end']); ?>"
    				> <?php echo e(__('home.this_week')); ?>

  				</label>
  				<label class="btn btn-info">
    				<input type="radio" name="date-filter"
    				data-start="<?php echo e($date_filters['this_month']['start']); ?>" 
    				data-end="<?php echo e($date_filters['this_month']['end']); ?>"
    				> <?php echo e(__('home.this_month')); ?>

  				</label>
  				<label class="btn btn-info">
    				<input type="radio" name="date-filter" 
    				data-start="<?php echo e($date_filters['this_fy']['start']); ?>" 
    				data-end="<?php echo e($date_filters['this_fy']['end']); ?>" 
    				> <?php echo e(__('home.this_fy')); ?>

  				</label>
            </div>
		</div>
	</div>
	<br>
	<div class="row">
    	<div class="col-md-3 col-sm-6 col-xs-12">
	      <div class="info-box">
	        <span class="info-box-icon bg-aqua"><i class="ion ion-cash"></i></span>

	        <div class="info-box-content">
	          <span class="info-box-text"><?php echo e(__('home.total_purchase')); ?></span>
	          <span class="info-box-number total_purchase"><i class="fa fa-refresh fa-spin fa-fw margin-bottom"></i></span>
	        </div>
	        <!-- /.info-box-content -->
	      </div>
	      <!-- /.info-box -->
	    </div>
	    <!-- /.col -->
	    <div class="col-md-3 col-sm-6 col-xs-12">
	      <div class="info-box">
	        <span class="info-box-icon bg-aqua"><i class="ion ion-ios-cart-outline"></i></span>

	        <div class="info-box-content">
	          <span class="info-box-text"><?php echo e(__('home.total_sell')); ?></span>
	          <span class="info-box-number total_sell"><i class="fa fa-refresh fa-spin fa-fw margin-bottom"></i></span>
	        </div>
	        <!-- /.info-box-content -->
	      </div>
	      <!-- /.info-box -->
	    </div>
	    <!-- /.col -->
	    <div class="col-md-3 col-sm-6 col-xs-12">
	      <div class="info-box">
	        <span class="info-box-icon bg-yellow">
	        	<i class="fa fa-dollar"></i>
				<i class="fa fa-exclamation"></i>
	        </span>

	        <div class="info-box-content">
	          <span class="info-box-text"><?php echo e(__('home.purchase_due')); ?></span>
	          <span class="info-box-number purchase_due"><i class="fa fa-refresh fa-spin fa-fw margin-bottom"></i></span>
	        </div>
	        <!-- /.info-box-content -->
	      </div>
	      <!-- /.info-box -->
	    </div>
	    <!-- /.col -->

	    <!-- fix for small devices only -->
	    <!-- <div class="clearfix visible-sm-block"></div> -->
	    <div class="col-md-3 col-sm-6 col-xs-12">
	      <div class="info-box">
	        <span class="info-box-icon bg-yellow">
	        	<i class="ion ion-ios-paper-outline"></i>
	        	<i class="fa fa-exclamation"></i>
	        </span>

	        <div class="info-box-content">
	          <span class="info-box-text"><?php echo e(__('home.invoice_due')); ?></span>
	          <span class="info-box-number invoice_due"><i class="fa fa-refresh fa-spin fa-fw margin-bottom"></i></span>
	        </div>
	        <!-- /.info-box-content -->
	      </div>
	      <!-- /.info-box -->
	    </div>
	    <!-- /.col -->
  	</div>
  	<br>
  	<!-- sales chart start -->
  	<div class="row">
  		<div class="col-sm-12">
  			<div class="box box-primary">
  				<div class="box-header">
         			<h3 class="box-title"><?php echo e(__('home.sells_last_30_days')); ?></h3>
         		</div>
	            <div class="box-body">
	              <?php echo $sells_chart_1->html(); ?>

	            </div>
	            <!-- /.box-body -->
          	</div>
  		</div>
  	</div>

  	<div class="row">
  		<div class="col-sm-12">
  			<div class="box box-primary">
  				<div class="box-header">
         			<h3 class="box-title"><?php echo e(__('home.sells_current_fy')); ?></h3>
         		</div>
	            <div class="box-body">
	              <?php echo $sells_chart_2->html(); ?>

	            </div>
	            <!-- /.box-body -->
          	</div>
  		</div>
  	</div>
  	<!-- sales chart end -->

  	<!-- products less than alert quntity -->
  	<div class="row">

      <div class="col-sm-6">
        <div class="box box-warning">
          <div class="box-header">
            <i class="fa fa-exclamation-triangle text-yellow" aria-hidden="true"></i>
              <h3 class="box-title"><?php echo e(__('lang_v1.sales_payment_dues')); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('lang_v1.tooltip_sales_payment_dues') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></h3>
            </div>
              <div class="box-body">
                <table class="table table-bordered table-striped" id="sales_payment_dues_table">
                <thead>
                  <tr>
                    <th><?php echo e(app('translator')->getFromJson( 'contact.customer' )); ?></th>
                    <th><?php echo e(app('translator')->getFromJson( 'sale.invoice_no' )); ?></th>
                    <th><?php echo e(app('translator')->getFromJson( 'home.due_amount' )); ?></th>
                  </tr>
                </thead>
              </table>
              </div>
              <!-- /.box-body -->
          </div>
      </div>

  		<div class="col-sm-6">
  			<div class="box box-warning">
  				<div class="box-header">
  					<i class="fa fa-exclamation-triangle text-yellow" aria-hidden="true"></i>
         			<h3 class="box-title"><?php echo e(__('lang_v1.purchase_payment_dues')); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.payment_dues') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></h3>
         		</div>
	            <div class="box-body">
	              <table class="table table-bordered table-striped" id="purchase_payment_dues_table">
            		<thead>
            			<tr>
            				<th><?php echo e(app('translator')->getFromJson( 'purchase.supplier' )); ?></th>
            				<th><?php echo e(app('translator')->getFromJson( 'purchase.ref_no' )); ?></th>
                            <th><?php echo e(app('translator')->getFromJson( 'home.due_amount' )); ?></th>
            			</tr>
            		</thead>
            	</table>
	            </div>
	            <!-- /.box-body -->
          	</div>
  		</div>
    </div>

    <div class="row">
      
      <div class="col-sm-6">
        <div class="box box-warning">
          <div class="box-header">
            <i class="fa fa-exclamation-triangle text-yellow" aria-hidden="true"></i>
              <h3 class="box-title"><?php echo e(__('home.product_stock_alert')); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.product_stock_alert') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?> </h3>
            </div>
              <div class="box-body">
                <table class="table table-bordered table-striped" id="stock_alert_table">
                <thead>
                  <tr>
                    <th><?php echo e(app('translator')->getFromJson( 'sale.product' )); ?></th>
                    <th><?php echo e(app('translator')->getFromJson( 'business.location' )); ?></th>
                            <th><?php echo e(app('translator')->getFromJson( 'report.current_stock' )); ?></th>
                  </tr>
                </thead>
              </table>
              </div>
              <!-- /.box-body -->
            </div>
      </div>

      <?php if(session('business.enable_product_expiry') == 1): ?>
        <div class="col-sm-6">
          <div class="box box-warning">
            <div class="box-header">
              <i class="fa fa-exclamation-triangle text-yellow" aria-hidden="true"></i>
                <h3 class="box-title"><?php echo e(__('home.stock_expiry_alert')); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.stock_expiry_alert', [ 'days' =>session('business.stock_expiry_alert_days', 30) ]) . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></h3>
            </div>
                <div class="box-body">
                  <input type="hidden" id="stock_expiry_alert_days" value="<?php echo e(\Carbon::now()->addDays(session('business.stock_expiry_alert_days', 30))->format('Y-m-d')); ?>">
                  <table class="table table-bordered table-striped" id="stock_expiry_alert_table">
                  <thead>
                    <tr>
                      <th><?php echo e(app('translator')->getFromJson('business.product')); ?></th>
                      <th><?php echo e(app('translator')->getFromJson('business.location')); ?></th>
                      <th><?php echo e(app('translator')->getFromJson('report.stock_left')); ?></th>
                      <th><?php echo e(app('translator')->getFromJson('product.expires_in')); ?></th>
                    </tr>
                  </thead>
                </table>
                </div>
                <!-- /.box-body -->
          </div>
        </div>
      <?php endif; ?>
  	</div>

</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
    <script src="<?php echo e(asset('js/home.js?v=' . $asset_v)); ?>"></script>
    <?php echo Charts::assets(['highcharts']); ?>

    <?php echo $sells_chart_1->script(); ?>

    <?php echo $sells_chart_2->script(); ?>

<?php endif; ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>