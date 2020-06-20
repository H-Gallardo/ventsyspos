<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title"><?php echo e(app('translator')->getFromJson( 'restaurant.booking_details' )); ?></h4>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-sm-6">
						<strong><?php echo e(app('translator')->getFromJson('contact.customer')); ?>:</strong> <?php echo e($booking->customer->name); ?><br>
						<strong><?php echo e(app('translator')->getFromJson('restaurant.service_staff')); ?>:</strong> <?php echo e(isset($booking->waiter->user_full_name) ? $booking->waiter->user_full_name : '--'); ?><br>
						<strong><?php echo e(app('translator')->getFromJson('restaurant.correspondent')); ?>:</strong> <?php echo e(isset($booking->correspondent->user_full_name) ? $booking->correspondent->user_full_name : '--'); ?><br>
						<?php if(!empty($booking->booking_note)): ?>
						<strong><?php echo e(app('translator')->getFromJson('restaurant.customer_note')); ?>:</strong> <?php echo e($booking->booking_note); ?>

						<?php endif; ?>
					</div>
					<div class="col-sm-6">
						<strong><?php echo e(app('translator')->getFromJson('messages.location')); ?>:</strong> <?php echo e($booking->location->name); ?><br>
						<strong><?php echo e(app('translator')->getFromJson('restaurant.table')); ?>:</strong> <?php echo e(isset($booking->table->name) ? $booking->table->name : '--'); ?><br>
						<strong><?php echo e(app('translator')->getFromJson('restaurant.booking_starts')); ?>:</strong> <?php echo e($booking_start); ?><br>
						<strong><?php echo e(app('translator')->getFromJson('restaurant.booking_ends')); ?>:</strong> <?php echo e($booking_end); ?>

					</div>
				</div>
				<br>
				<hr>
				<div class="row">
					<div class="col-sm-12">
						<button type="button" class="btn btn-info btn-modal pull-right" data-href="<?php echo e(action('NotificationController@getTemplate', ['transaction_id' => $booking->id,'template_for' => 'new_booking'])); ?>" data-container=".view_modal"><?php echo e(app('translator')->getFromJson('restaurant.send_notification_to_customer')); ?></button>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-9">
						<?php echo Form::open(['url' => action('Restaurant\BookingController@update', [$booking->id]), 'method' => 'PUT', 'id' => 'edit_booking_form' ]); ?>

							<div class="input-group">
				                <!-- /btn-group -->
				                <?php echo Form::select('booking_status', $booking_statuses, $booking->booking_status, ['class' => 'form-control', 'placeholder' => __('restaurant.change_booking_status'), 'required']);; ?>

				                <div class="input-group-btn">
				                  <button type="submit" class="btn btn-primary"><?php echo e(app('translator')->getFromJson('messages.update')); ?></button>
				                </div>
				             </div>
						<?php echo Form::close(); ?>

					</div>
					<div class="col-sm-3 text-center">
						<button type="button" class="btn btn-danger" id="delete_booking" data-href="<?php echo e(action('Restaurant\BookingController@destroy', [$booking->id])); ?>"><?php echo e(app('translator')->getFromJson('restaurant.delete_booking')); ?></button>
					</div>
				</div>
			<br>
			<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(app('translator')->getFromJson( 'messages.close' )); ?></button>
			</div>
		

	</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->