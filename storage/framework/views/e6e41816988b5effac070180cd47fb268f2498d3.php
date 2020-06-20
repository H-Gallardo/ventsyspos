<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
		    <button type="button" class="close no-print" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		      <h4 class="modal-title" id="modalTitle"><?php echo e($product->name); ?></h4>
	    </div>
	    <div class="modal-body">
      		<div class="row">
				<div class="col-md-12">
					<div class="table-responsive">
						<table class="table bg-gray">
							<tr class="bg-green">
								<?php if($product->type == 'variable'): ?>
									<th><?php echo e(app('translator')->getFromJson('product.variations')); ?></th>
								<?php endif; ?>
								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access_default_selling_price')): ?>
							        <th><?php echo e(app('translator')->getFromJson('product.default_selling_price')); ?> (<?php echo e(app('translator')->getFromJson('product.inc_of_tax')); ?>)</th>
						        <?php endif; ?>
						        <?php if(!empty($allowed_group_prices)): ?>
						        	<th><?php echo e(app('translator')->getFromJson('lang_v1.group_prices')); ?></th>
						        <?php endif; ?>
							</tr>
							<?php $__currentLoopData = $product->variations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<?php if($product->type == 'variable'): ?>
									<td>
										<?php echo e($variation->product_variation->name); ?> - <?php echo e($variation->name); ?>

									</td>
								<?php endif; ?>
								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('access_default_selling_price')): ?>
									<td>
										<span class="display_currency" data-currency_symbol="true"><?php echo e($variation->sell_price_inc_tax); ?></span>
									</td>
								<?php endif; ?>
								<?php if(!empty($allowed_group_prices)): ?>
						        	<td class="td-full-width">
						        		<?php $__currentLoopData = $allowed_group_prices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						        			<strong><?php echo e($value); ?></strong> - <?php if(!empty($group_price_details[$variation->id][$key])): ?>
						        				<span class="display_currency" data-currency_symbol="true"><?php echo e($group_price_details[$variation->id][$key]); ?></span>
						        			<?php else: ?>
						        				0
						        			<?php endif; ?>
						        			<br>
						        		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						        	</td>
						        <?php endif; ?>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</table>
					</div>
				</div>
			</div>
      	</div>
      	<div class="modal-footer">
	      	<button type="button" class="btn btn-default no-print" data-dismiss="modal"><?php echo e(app('translator')->getFromJson( 'messages.close' )); ?></button>
	    </div>
	</div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    var element = $('div.view_modal');
    __currency_convert_recursively(element);
  });
</script>
