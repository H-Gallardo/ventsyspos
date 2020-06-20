<?php $__env->startSection('title', __('superadmin::lang.superadmin') . ' | ' . __('superadmin::lang.subscription')); ?>

<?php $__env->startSection('content'); ?>

<!-- Main content -->
<section class="content">

	<?php echo $__env->make('superadmin::layouts.partials.currency', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	
	<div class="box">
        <div class="box-header">
            <h3 class="box-title"><?php echo e(app('translator')->getFromJson('superadmin::lang.active_subscription')); ?></h3>
        </div>

        <div class="box-body">
        	<?php if(!empty($active)): ?>
        		<div class="col-md-4">
	        		<div class="box box-success">
						<div class="box-header with-border text-center">
							<h2 class="box-title">
								<?php echo e($active->package_details['name']); ?>

							</h2>

							<div class="box-tools pull-right">
								<span class="badge bg-green">
									<?php echo e(app('translator')->getFromJson('superadmin::lang.running')); ?>
								</span>
              				</div>

						</div>
						<div class="box-body text-center">
							<?php echo e(app('translator')->getFromJson('superadmin::lang.start_date')); ?> : <?php echo e(\Carbon::createFromTimestamp(strtotime($active->start_date))->format(session('business.date_format'))); ?> <br/>
							<?php echo e(app('translator')->getFromJson('superadmin::lang.end_date')); ?> : <?php echo e(\Carbon::createFromTimestamp(strtotime($active->end_date))->format(session('business.date_format'))); ?> <br/>

							<?php echo e(app('translator')->getFromJson('superadmin::lang.remaining', ['days' => \Carbon::today()->diffInDays($active->end_date)])); ?>

						</div>
					</div>
				</div>
        	<?php else: ?>
        		<h3 class="text-danger"><?php echo e(app('translator')->getFromJson('superadmin::lang.no_active_subscription')); ?></h3>
        	<?php endif; ?>

        	<?php if(!empty($nexts)): ?>
        		<div class="clearfix"></div>
        		<?php $__currentLoopData = $nexts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $next): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        			<div class="col-md-4">
		        		<div class="box box-success">
							<div class="box-header with-border text-center">
								<h2 class="box-title">
									<?php echo e($next->package_details['name']); ?>

								</h2>
							</div>
							<div class="box-body text-center">
								<?php echo e(app('translator')->getFromJson('superadmin::lang.start_date')); ?> : <?php echo e(\Carbon::createFromTimestamp(strtotime($next->start_date))->format(session('business.date_format'))); ?> <br/>
								<?php echo e(app('translator')->getFromJson('superadmin::lang.end_date')); ?> : <?php echo e(\Carbon::createFromTimestamp(strtotime($next->end_date))->format(session('business.date_format'))); ?>

							</div>
						</div>
					</div>
        		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        	<?php endif; ?>

        	<?php if(!empty($waiting)): ?>
        		<div class="clearfix"></div>
        		<?php $__currentLoopData = $waiting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        			<div class="col-md-4">
		        		<div class="box box-success">
							<div class="box-header with-border text-center">
								<h2 class="box-title">
									<?php echo e($row->package_details['name']); ?>

								</h2>
							</div>
							<div class="box-body text-center">
                                <?php if($row->paid_via == 'offline'): ?>
                                    <?php echo e(app('translator')->getFromJson('superadmin::lang.waiting_approval')); ?>
                                <?php else: ?>
                                    <?php echo e(app('translator')->getFromJson('superadmin::lang.waiting_approval_gateway')); ?>
                                <?php endif; ?>
							</div>
						</div>
					</div>
        		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        	<?php endif; ?>

        </div>
    </div>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?php echo e(app('translator')->getFromJson('superadmin::lang.all_subscriptions')); ?></h3>
        </div>

        <div class="box-body">
        	<div class="row">
                <div class ="col-xs-12">
                <!-- location table-->
                    <table class="table table-bordered table-hover" 
                    id="all_subscriptions_table">
                        <thead>
                        <tr>
                            <th>Package Name</th>
                            <th>Start Date</th>
                            <th>Trail End Date</th>
                            <th>End Date</th>
                            <th>Price</th>
                            <th>Paid Via</th>
                            <th>Payment Transaction ID</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Created By</th>
                            <th><?php echo e(app('translator')->getFromJson('messages.action')); ?></th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?php echo e(app('translator')->getFromJson('superadmin::lang.packages')); ?></h3>
        </div>

        <div class="box-body">
        	<?php echo $__env->make('superadmin::subscription.partials.packages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>

</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

<script type="text/javascript">
	$(document).ready( function(){
    	$('#all_subscriptions_table').DataTable({
			processing: true,
			serverSide: true,
			ajax: '<?php echo e(action("\Modules\Superadmin\Http\Controllers\SubscriptionController@allSubscriptions")); ?>',
			columns: [
			    {data: 'package_name', name: 'P.name'},
			    {data: 'start_date', name: 'start_date'},
			    {data: 'trial_end_date', name: 'trial_end_date'},
			    {data: 'end_date', name: 'end_date'},
			    {data: 'package_price', name: 'package_price'},
			    {data: 'paid_via', name: 'paid_via'},
			    {data: 'payment_transaction_id', name: 'payment_transaction_id'},
			    {data: 'status', name: 'status'},
			    {data: 'created_at', name: 'created_at'},
			    {data: 'created_by', name: 'created_by'},
			    {data: 'action', name: 'action', searchable: false, orderable: false},
			],
			"fnDrawCallback": function (oSettings) {
            	__currency_convert_recursively($('#all_subscriptions_table'), true);
        	}
	    });
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>