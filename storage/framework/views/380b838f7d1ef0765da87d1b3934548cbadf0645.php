<?php $__env->startSection('title', __('superadmin::lang.superadmin') . ' | ' . __('superadmin::lang.packages')); ?>

<?php $__env->startSection('content'); ?>
	<section class="content-header">
		<h1>
			<?php echo e(app('translator')->getFromJson('superadmin::lang.welcome_superadmin')); ?>
		</h1>
	</section>

	<section class="content">
		
		<?php echo $__env->make('superadmin::layouts.partials.currency', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

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
    				data-start="<?php echo e($date_filters['this_yr']['start']); ?>" 
    				data-end="<?php echo e($date_filters['this_yr']['end']); ?>" 
    				> <?php echo e(__('superadmin::lang.this_year')); ?>

  				</label>
            </div>
		</div>

	</div>
	<br/>
		<div class="row">
	        <div class="col-lg-4 col-xs-6">
	          <!-- small box -->
	          <div class="small-box bg-aqua">
	            <div class="inner">
	              <h3><span class="new_subscriptions">&nbsp;</span></h3>

	              <p><?php echo e(app('translator')->getFromJson('superadmin::lang.new_subscriptions')); ?></p>
	            </div>
	            <div class="icon">
	              <i class="fa fa-refresh"></i>
	            </div>
	            <a href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\SuperadminSubscriptionsController@index')); ?>" class="small-box-footer"><?php echo e(app('translator')->getFromJson('superadmin::lang.more_info')); ?> <i class="fa fa-arrow-circle-right"></i></a>
	          </div>
	        </div>
	        <!-- ./col -->

	        <!-- <div class="col-lg-4 col-xs-6">
	          <div class="small-box bg-green">
	            <div class="inner">
	              <h3>53<sup style="font-size: 20px">%</sup></h3>

	              <p>Bounce Rate</p>
	            </div>
	            <div class="icon">
	              <i class="ion ion-stats-bars"></i>
	            </div>
	            <a href="#" class="small-box-footer"><?php echo e(app('translator')->getFromJson('superadmin::lang.more_info')); ?><i class="fa fa-arrow-circle-right"></i></a>
	          </div>
	        </div> -->
	        <!-- ./col -->

	        <div class="col-lg-4 col-xs-6">
	          <!-- small box -->
	          <div class="small-box bg-yellow">
	            <div class="inner">
	              <h3><span class="new_registrations">&nbsp;</span></h3>

	              <p><?php echo e(app('translator')->getFromJson('superadmin::lang.new_registrations')); ?></p>
	            </div>
	            <div class="icon">
	              <i class="ion ion-person-add"></i>
	            </div>
	            <a href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\BusinessController@index')); ?>" class="small-box-footer"><?php echo e(app('translator')->getFromJson('superadmin::lang.more_info')); ?> <i class="fa fa-arrow-circle-right"></i></a>
	          </div>
	        </div>
	        <!-- ./col -->
	        
	        <div class="col-lg-4 col-xs-6">
	          <!-- small box -->
	          <div class="small-box bg-red">
	            <div class="inner">
	              <h3><?php echo e($not_subscribed); ?></h3>

	              <p><?php echo e(app('translator')->getFromJson('superadmin::lang.not_subscribed')); ?></p>
	            </div>
	            <div class="icon">
	              <i class="ion ion-pie-graph"></i>
	            </div>
	            <a href="<?php echo e(action('\Modules\Superadmin\Http\Controllers\BusinessController@index')); ?>" class="small-box-footer"><?php echo e(app('translator')->getFromJson('superadmin::lang.more_info')); ?> <i class="fa fa-arrow-circle-right"></i></a>
	          </div>
	        </div>
        	<!-- ./col -->
    	</div>

    	<div class="row">
	  		<div class="col-sm-12">
	  			<div class="box box-primary">
	  				<div class="box-header">
	         			<h3 class="box-title"><?php echo e(__('superadmin::lang.monthly_sales_trend')); ?></h3>
	         		</div>
		            <div class="box-body">
		            	<?php echo $monthly_sells_chart->html(); ?>

		            </div>
		            <!-- /.box-body -->
	          	</div>
	  		</div>
  		</div>

	</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

<?php echo Charts::assets(['highcharts']); ?>

<?php echo $monthly_sells_chart->script(); ?>


<script type="text/javascript">
	$(document).ready(function(){

		var start = $('input[name="date-filter"]:checked').data('start');
		var end = $('input[name="date-filter"]:checked').data('end');
		update_statistics(start, end);
		$(document).on('change', 'input[name="date-filter"]', function(){
			var start = $('input[name="date-filter"]:checked').data('start');
			var end = $('input[name="date-filter"]:checked').data('end');
			update_statistics(start, end);
		});
	});

	function update_statistics(start, end){
		var data = { start: start, end: end };

		//get purchase details
		var loader = '<i class="fa fa-refresh fa-spin fa-fw"></i>';
		$('.new_subscriptions').html(loader);
		$('.new_registrations').html(loader);
		$.ajax({
			method: "GET",
			url: '/superadmin/stats',
			dataType: "json",
			data: data,
			success: function(data){
				$('.new_subscriptions').html(__currency_trans_from_en(data.new_subscriptions, true, true));
				$('.new_registrations').html(data.new_registrations);
			}
		});
	}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>