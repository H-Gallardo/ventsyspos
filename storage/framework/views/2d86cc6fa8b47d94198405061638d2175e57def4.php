<div class="modal fade add_new_customer_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
	<div class="modal-dialog" role="document">
	  	<div class="modal-content">
		    <?php echo Form::open(['url' => action('ContactController@store'), 'method' => 'post', 'id' => 'add_new_customer_form' ]); ?>

		    <?php echo Form::hidden('type','customer');; ?>

		    <div class="modal-header">
		      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		      <h4 class="modal-title"><?php echo e(app('translator')->getFromJson('contact.add_new_customer')); ?></h4>
		    </div>

		    <div class="modal-body">
		      <div class="row">
		      <div class="col-md-12">
		        <div class="form-group">
		            <?php echo Form::label('name', __('contact.name') . ':*'); ?>

		            <div class="input-group">
		                <span class="input-group-addon">
		                    <i class="fa fa-user"></i>
		                </span>
		                <?php echo Form::text('name', null, ['class' => 'form-control','placeholder' => __('contact.name'), 'required']);; ?>

		            </div>
		        </div>
		      </div>
		      <div class="clearfix"></div>
		      <div class="col-md-4">
		        <div class="form-group">
		            <?php echo Form::label('mobile', __('contact.mobile') . ':*'); ?>

		            <div class="input-group">
		                <span class="input-group-addon">
		                    <i class="fa fa-mobile"></i>
		                </span>
		                <?php echo Form::text('mobile', null, ['class' => 'form-control', 'required']);; ?>

		            </div>
		        </div>
		      </div>
		      <div class="col-md-4">
		        <div class="form-group">
		            <?php echo Form::label('landline', __('contact.landline') . ':'); ?>

		            <div class="input-group">
		                <span class="input-group-addon">
		                    <i class="fa fa-phone"></i>
		                </span>
		                <?php echo Form::text('landline', null, ['class' => 'form-control']);; ?>

		            </div>
		        </div>
		      </div>
		      <div class="col-md-4">
		        <div class="form-group">
		            <?php echo Form::label('alternate_number', __('contact.alternate_contact_number') . ':'); ?>

		            <div class="input-group">
		                <span class="input-group-addon">
		                    <i class="fa fa-phone"></i>
		                </span>
		                <?php echo Form::text('alternate_number', null, ['class' => 'form-control', 'placeholder' => __('contact.alternate_contact_number')]);; ?>

		            </div>
		        </div>
		      </div>
		      <div class="clearfix"></div>
		      <div class="col-md-4">
		        <div class="form-group">
		            <?php echo Form::label('city', __('business.city') . ':*'); ?>

		            <div class="input-group">
		                <span class="input-group-addon">
		                    <i class="fa fa-map-marker"></i>
		                </span>
		                <?php echo Form::text('city', null, ['class' => 'form-control', 'required', 'placeholder' => __('business.city')]);; ?>

		            </div>
		        </div>
		      </div>
		      <div class="col-md-4">
		        <div class="form-group">
		            <?php echo Form::label('state', __('business.state') . ':'); ?>

		            <div class="input-group">
		                <span class="input-group-addon">
		                    <i class="fa fa-map-marker"></i>
		                </span>
		                <?php echo Form::text('state', null, ['class' => 'form-control', 'placeholder' => __('business.state')]);; ?>

		            </div>
		        </div>
		      </div>
		      <div class="col-md-4">
		        <div class="form-group">
		            <?php echo Form::label('country', __('business.country') . ':'); ?>

		            <div class="input-group">
		                <span class="input-group-addon">
		                    <i class="fa fa-globe"></i>
		                </span>
		                <?php echo Form::text('country', null, ['class' => 'form-control', 'placeholder' => __('business.country')]);; ?>

		            </div>
		        </div>
		      </div>
		      <div class="clearfix"></div>
		      <div class="col-md-12">
		        <div class="form-group">
		            <?php echo Form::label('landmark', __('business.landmark') . ':'); ?>

		            <div class="input-group">
		                <span class="input-group-addon">
		                    <i class="fa fa-map-marker"></i>
		                </span>
		                <?php echo Form::text('landmark', null, ['class' => 'form-control', 'required', 
		                'placeholder' => __('business.landmark')]);; ?>

		            </div>
		        </div>
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