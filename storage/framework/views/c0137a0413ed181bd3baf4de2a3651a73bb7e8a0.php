<div class="modal fade" id="add_booking_modal" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

		<?php echo Form::open(['url' => action('Restaurant\BookingController@store'), 'method' => 'post', 'id' => 'add_booking_form' ]); ?>

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><?php echo e(app('translator')->getFromJson( 'restaurant.add_booking' )); ?></h4>
				</div>

				<div class="modal-body">

				<?php if(count($business_locations) == 1): ?>
					<?php 
						$default_location = current(array_keys($business_locations->toArray())) 
					?>
				<?php else: ?>
					<?php $default_location = null; ?>
				<?php endif; ?>
				<div class="col-sm-12">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-map-marker"></i>
							</span>
							<?php echo Form::select('location_id', $business_locations, $default_location, ['class' => 'form-control', 'placeholder' => __('purchase.business_location'), 'required', 'id' => 'booking_location_id']);; ?>

						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="col-sm-6">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-user"></i>
							</span>
							<?php echo Form::select('contact_id', 
								$customers, null, ['class' => 'form-control', 'id' => 'booking_customer_id', 'placeholder' => __('contact.customer'), 'required']);; ?>

						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-user"></i>
							</span>
							<?php echo Form::select('correspondent', 
								$correspondents, null, ['class' => 'form-control', 'placeholder' => __('restaurant.select_correspondent'), 'id' => 'correspondent']);; ?>

						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				<div id="restaurant_module_span"></div>
				<div class="clearfix"></div>
				<div class="col-sm-6">
					<div class="form-group">
					<?php echo Form::label('status', __('restaurant.start_time') . ':*'); ?>

            			<div class='input-group date' >
            			<span class="input-group-addon">
                    		<span class="glyphicon glyphicon-calendar"></span>
                		</span>
						<?php echo Form::text('booking_start', null, ['class' => 'form-control','placeholder' => __( 'restaurant.start_time' ), 'required', 'id' => 'start_time', 'readonly']);; ?>

						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<?php echo Form::label('status', __('restaurant.end_time') . ':*'); ?>

            			<div class='input-group date' >
            			<span class="input-group-addon">
                    		<span class="glyphicon glyphicon-calendar"></span>
                		</span>
						<?php echo Form::text('booking_end', null, ['class' => 'form-control','placeholder' => __( 'restaurant.end_time' ), 'required', 'id' => 'end_time', 'readonly']);; ?>

						</div>
					</div>
				</div>
				<div class="col-sm-12">
					<div class="form-group">
					<?php echo Form::label('booking_note', __( 'restaurant.customer_note' ) . ':'); ?>

					<?php echo Form::textarea('booking_note', null, ['class' => 'form-control','placeholder' => __( 'restaurant.customer_note' ), 'rows' => 3 ]);; ?>

					</div>
				</div>
				<div class="col-sm-12">
					<div class="form-group">
					<div class="checkbox">
						<?php echo Form::checkbox('send_notification', 1, true, ['class' => 'input-icheck', 'id' => 'send_notification']);; ?> <?php echo e(app('translator')->getFromJson('restaurant.send_notification_to_customer')); ?>
					</div>
				</div>
				</div>

				<div class="modal-footer">
				<button type="submit" class="btn btn-primary"><?php echo e(app('translator')->getFromJson( 'messages.save' )); ?></button>
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(app('translator')->getFromJson( 'messages.close' )); ?></button>
			</div>

		<?php echo Form::close(); ?>


		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>