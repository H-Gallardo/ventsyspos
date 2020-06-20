<div class="row">
	<div class="col-xs-12 col-sm-10 col-sm-offset-1">
		<div class="table-responsive">
			<table class="table table-condensed bg-gray">
				<tr>
					<th><?php echo e(app('translator')->getFromJson('sale.product')); ?></th>
					<?php if(!empty($lot_n_exp_enabled)): ?>
                		<th><?php echo e(__('lang_v1.lot_n_expiry')); ?></th>
              		<?php endif; ?>
					<th><?php echo e(app('translator')->getFromJson('sale.qty')); ?></th>
					<th><?php echo e(app('translator')->getFromJson('sale.unit_price')); ?></th>
					<th><?php echo e(app('translator')->getFromJson('sale.subtotal')); ?></th>
				</tr>
				<?php $__currentLoopData = $stock_adjustment_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td>
							<?php echo e($details->product); ?> 
							<?php if( $details->type == 'variable'): ?>
							 <?php echo e('-' . $details->product_variation . '-' . $details->variation); ?> 
							<?php endif; ?> 
							( <?php echo e($details->sub_sku); ?> )
						</td>
						<?php if(!empty($lot_n_exp_enabled)): ?>
                			<td><?php echo e(isset($details->lot_number) ? $details->lot_number : '--'); ?>

			                  <?php if( session()->get('business.enable_product_expiry') == 1 && !empty($details->exp_date)): ?>
			                    (<?php echo e(\Carbon::createFromTimestamp(strtotime($details->exp_date))->format(session('business.date_format'))); ?>)
			                  <?php endif; ?>
			                </td>
              			<?php endif; ?>
						<td>
							<?php echo e(number_format($details->quantity, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator'])); ?>

						</td>
						<td>
							<?php echo e(number_format($details->unit_price, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator'])); ?>

						</td>
						<td>
							<?php echo e(number_format($details->unit_price * $details->quantity, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator'])); ?>

						</td>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</table>
		</div>
	</div>
</div>