<?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
	<div class="col-md-3 col-xs-6 order_div">
		<div class="small-box bg-gray">
            <div class="inner">
            	<h4 class="text-center">#<?php echo e($order->invoice_no); ?></h4>
            	<table class="table no-margin no-border table-slim">
            		<tr><th><?php echo e(app('translator')->getFromJson('restaurant.placed_at')); ?></th><td><?php echo e(\Carbon::createFromTimestamp(strtotime($order->created_at))->format(session('business.date_format'))); ?> <?php echo e(\Carbon::createFromTimestamp(strtotime($order->created_at))->format('H:i')); ?></td></tr>
            		<tr><th><?php echo e(app('translator')->getFromJson('restaurant.order_status')); ?></th><td><span class="label <?php if($order->res_order_status == 'cooked' ): ?> bg-red <?php elseif($order->res_order_status == 'served'): ?> bg-green <?php else: ?> bg-light-blue <?php endif; ?>"><?php echo e(app('translator')->getFromJson('restaurant.order_statuses.' . $order->res_order_status)); ?> </span></td></tr>
            		<tr><th><?php echo e(app('translator')->getFromJson('contact.customer')); ?></th><td><?php echo e($order->customer_name); ?></td></tr>
            		<tr><th><?php echo e(app('translator')->getFromJson('restaurant.table')); ?></th><td><?php echo e($order->table_name); ?></td></tr>
            		<tr><th><?php echo e(app('translator')->getFromJson('sale.location')); ?></th><td><?php echo e($order->business_location); ?></td></tr>
            	</table>
            </div>
            <?php if($orders_for == 'kitchen'): ?>
            	<a href="#" class="btn btn-flat small-box-footer bg-yellow mark_as_cooked_btn" data-href="<?php echo e(action('Restaurant\KitchenController@markAsCooked', [$order->id])); ?>"><i class="fa fa-check-square-o"></i> <?php echo e(app('translator')->getFromJson('restaurant.mark_as_cooked')); ?></a>
            <?php elseif($orders_for == 'waiter' && $order->res_order_status != 'served'): ?>
            	<a href="#" class="btn btn-flat small-box-footer bg-yellow mark_as_served_btn" data-href="<?php echo e(action('Restaurant\OrderController@markAsServed', [$order->id])); ?>"><i class="fa fa-check-square-o"></i> <?php echo e(app('translator')->getFromJson('restaurant.mark_as_served')); ?></a>
            <?php else: ?>
            	<div class="small-box-footer bg-gray">&nbsp;</div>
            <?php endif; ?>
            	<a href="#" class="btn btn-flat small-box-footer bg-info btn-modal" data-href="<?php echo e(action('SellController@show', [$order->id])); ?>" data-container=".view_modal"><?php echo e(app('translator')->getFromJson('restaurant.order_details')); ?> <i class="fa fa-arrow-circle-right"></i></a>
         </div>
	</div>
	<?php if($loop->iteration % 4 == 0): ?>
		<div class="hidden-xs">
			<div class="clearfix"></div>
		</div>
	<?php endif; ?>
	<?php if($loop->iteration % 2 == 0): ?>
		<div class="visible-xs">
			<div class="clearfix"></div>
		</div>
	<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<div class="col-md-12">
	<h4 class="text-center"><?php echo e(app('translator')->getFromJson('restaurant.no_orders_found')); ?></h4>
</div>
<?php endif; ?>