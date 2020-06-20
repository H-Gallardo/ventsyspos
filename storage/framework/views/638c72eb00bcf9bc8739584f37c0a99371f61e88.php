<div class="modal-dialog modal-xl" role="document">
	<div class="modal-content">
		<div class="modal-header">
		    <button type="button" class="close no-print" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		      <h4 class="modal-title" id="modalTitle"><?php echo e($product->name); ?></h4>
	    </div>
	    <div class="modal-body">
      		<div class="row">
      			<div class="col-sm-9">
	      			<div class="col-sm-4 invoice-col">
	      				<b><?php echo e(app('translator')->getFromJson('product.sku')); ?>:</b>
						<?php echo e($product->sku); ?><br>
						<b><?php echo e(app('translator')->getFromJson('product.brand')); ?>: </b>
						<?php echo e(isset($product->brand->name) ? $product->brand->name : '--'); ?><br>
						<b><?php echo e(app('translator')->getFromJson('product.unit')); ?>: </b>
						<?php echo e(isset($product->unit->short_name) ? $product->unit->short_name : '--'); ?><br>
						<b><?php echo e(app('translator')->getFromJson('product.barcode_type')); ?>: </b>
						<?php echo e(isset($product->barcode_type) ? $product->barcode_type : '--'); ?>


						<?php if(!empty($product->product_custom_field1)): ?>
							<br/>
							<b><?php echo e(app('translator')->getFromJson('lang_v1.product_custom_field1')); ?>: </b>
							<?php echo e($product->product_custom_field1); ?>

						<?php endif; ?>

						<?php if(!empty($product->product_custom_field2)): ?>
							<br/>
							<b><?php echo e(app('translator')->getFromJson('lang_v1.product_custom_field2')); ?>: </b>
							<?php echo e($product->product_custom_field2); ?>

						<?php endif; ?>

						<?php if(!empty($product->product_custom_field3)): ?>
							<br/>
							<b><?php echo e(app('translator')->getFromJson('lang_v1.product_custom_field3')); ?>: </b>
							<?php echo e($product->product_custom_field3); ?>

						<?php endif; ?>

						<?php if(!empty($product->product_custom_field4)): ?>
							<br/>
							<b><?php echo e(app('translator')->getFromJson('lang_v1.product_custom_field4')); ?>: </b>
							<?php echo e($product->product_custom_field4); ?>

						<?php endif; ?>
	      			</div>

	      			<div class="col-sm-4 invoice-col">
						<b><?php echo e(app('translator')->getFromJson('product.category')); ?>: </b>
						<?php echo e(isset($product->category->name) ? $product->category->name : '--'); ?><br>
						<b><?php echo e(app('translator')->getFromJson('product.sub_category')); ?>: </b>
						<?php echo e(isset($product->sub_category->name) ? $product->sub_category->name : '--'); ?><br>	
						
						<b><?php echo e(app('translator')->getFromJson('product.manage_stock')); ?>: </b>
						<?php if($product->enable_stock): ?>
							<?php echo e(app('translator')->getFromJson('messages.yes')); ?>
						<?php else: ?>
							<?php echo e(app('translator')->getFromJson('messages.no')); ?>
						<?php endif; ?>
						<br>
						<?php if($product->enable_stock): ?>
							<b><?php echo e(app('translator')->getFromJson('product.alert_quantity')); ?>: </b>
							<?php echo e(isset($product->alert_quantity) ? $product->alert_quantity : '--'); ?>

						<?php endif; ?>
	      			</div>
					
	      			<div class="col-sm-4 invoice-col">
	      				<b><?php echo e(app('translator')->getFromJson('product.expires_in')); ?>: </b>
	      				<?php
	  						$expiry_array = ['months'=>__('product.months'), 'days'=>__('product.days'), '' =>__('product.not_applicable') ];
	  					?>
	      				<?php if(!empty($product->expiry_period) && !empty($product->expiry_period_type)): ?>
							<?php echo e($product->expiry_period); ?> <?php echo e($expiry_array[$product->expiry_period_type]); ?>

						<?php else: ?>
							<?php echo e($expiry_array['']); ?>

	      				<?php endif; ?>
	      				<br>
						<?php if($product->weight): ?>
							<b><?php echo e(app('translator')->getFromJson('lang_v1.weight')); ?>: </b>
							<?php echo e($product->weight); ?><br>
						<?php endif; ?>
						<b><?php echo e(app('translator')->getFromJson('product.applicable_tax')); ?>: </b>
						<?php echo e(isset($product->product_tax->name) ? $product->product_tax->name : __('lang_v1.none')); ?><br>
						<?php
							$tax_type = ['inclusive' => __('product.inclusive'), 'exclusive' => __('product.exclusive')];
						?>
						<b><?php echo e(app('translator')->getFromJson('product.selling_price_tax_type')); ?>: </b>
						<?php echo e($tax_type[$product->tax_type]); ?><br>
						<?php
							$product_type = ['single' => 'Single', 'variable' => 'Variable'];
						?>
						<b><?php echo e(app('translator')->getFromJson('product.product_type')); ?>: </b>
						<?php echo e($product_type[$product->type]); ?>

						
	      			</div>
	      			<div class="clearfix"></div>
	      			<br>
      				<div class="col-sm-12">
      					<?php echo $product->product_description; ?>

      				</div>
	      		</div>
      			<div class="col-sm-3 col-md-3 invoice-col">
      				<div class="thumbnail">
      					<img src="<?php echo e($product->image_url); ?>" alt="Product image">
      				</div>
      			</div>
      		</div>
      		<?php if($rack_details->count()): ?>
      		<?php if(session('business.enable_racks') || session('business.enable_row') || session('business.enable_position')): ?>
      			<div class="row">
      				<div class="col-md-12">
      					<h4><?php echo e(app('translator')->getFromJson('lang_v1.rack_details')); ?>:</h4>
      				</div>
      				<div class="col-md-12">
      					<div class="table-responsive">
      					<table class="table table-condensed bg-gray">
      						<tr class="bg-green">
      							<th><?php echo e(app('translator')->getFromJson('business.location')); ?></th>
      							<?php if(session('business.enable_racks')): ?>
      								<th><?php echo e(app('translator')->getFromJson('lang_v1.rack')); ?></th>
      							<?php endif; ?>
      							<?php if(session('business.enable_row')): ?>
      								<th><?php echo e(app('translator')->getFromJson('lang_v1.row')); ?></th>
      							<?php endif; ?>
      							<?php if(session('business.enable_position')): ?>
      								<th><?php echo e(app('translator')->getFromJson('lang_v1.position')); ?></th>
      							<?php endif; ?>
      							</tr>
      						<?php $__currentLoopData = $rack_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      							<tr>
	      							<td><?php echo e($rd->name); ?></td>
	      							<?php if(session('business.enable_racks')): ?>
	      								<td><?php echo e($rd->rack); ?></td>
	      							<?php endif; ?>
	      							<?php if(session('business.enable_row')): ?>
	      								<td><?php echo e($rd->row); ?></td>
	      							<?php endif; ?>
	      							<?php if(session('business.enable_position')): ?>
	      								<td><?php echo e($rd->position); ?></td>
	      							<?php endif; ?>
      							</tr>
      						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      					</table>
      					</div>
      				</div>
      			</div>
      		<?php endif; ?>
      		<?php endif; ?>
      		<?php if($product->type == 'single'): ?>
      			<?php echo $__env->make('product.partials.single_product_details', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      		<?php else: ?>
      			<?php echo $__env->make('product.partials.variable_product_details', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      		<?php endif; ?>
      	</div>
      	<div class="modal-footer">
      		<button type="button" class="btn btn-primary no-print" 
	        aria-label="Print" 
	          onclick="$(this).closest('div.modal').printThis();">
	        <i class="fa fa-print"></i> <?php echo e(app('translator')->getFromJson( 'messages.print' )); ?>
	      </button>
	      	<button type="button" class="btn btn-default no-print" data-dismiss="modal"><?php echo e(app('translator')->getFromJson( 'messages.close' )); ?></button>
	    </div>
	</div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    var element = $('div.modal-xl');
    __currency_convert_recursively(element);
  });
</script>
