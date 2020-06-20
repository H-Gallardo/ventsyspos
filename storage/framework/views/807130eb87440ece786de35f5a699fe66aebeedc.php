<div class="row">
	<div class="col-sm-12">
		<?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="box box-solid">
			<div class="box-header">
	            <h3 class="box-title"><?php echo e(app('translator')->getFromJson('sale.location')); ?>: <?php echo e($value); ?></h3>
	        </div>
			<div class="box-body">
				<div class="row">
					<div class="col-sm-12">
						<table class="table table-condensed table-bordered table-th-green text-center table-striped add_opening_stock_table">
								<thead>
								<tr>
									<th><?php echo e(app('translator')->getFromJson( 'product.product_name' )); ?></th>
									<th><?php echo e(app('translator')->getFromJson( 'lang_v1.quantity' )); ?></th>
									<th><?php echo e(app('translator')->getFromJson( 'purchase.unit_cost_before_tax' )); ?></th>
									<?php if($enable_expiry == 1 && $product->enable_stock == 1): ?>
										<th>Exp. Date</th>
									<?php endif; ?>
									<?php if($enable_lot == 1): ?>
										<th><?php echo e(app('translator')->getFromJson( 'lang_v1.lot_number' )); ?></th>
									<?php endif; ?>
									<th><?php echo e(app('translator')->getFromJson( 'purchase.subtotal_before_tax' )); ?></th>
									<th>&nbsp;</th>
								</tr>
								</thead>
								<tbody>
								<?php
									$subtotal = 0;
								?>
								<?php $__currentLoopData = $product->variations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if(empty($purchases[$key][$variation->id])): ?>
										<?php
											$purchases[$key][$variation->id][] = ['quantity' => 0, 
											'purchase_price' => $variation->default_purchase_price,
											'purchase_line_id' => null,
											'lot_number' => null
											]
										?>
									<?php endif; ?>

									<?php $__currentLoopData = $purchases[$key][$variation->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_key => $var): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php

										$purchase_line_id = $var['purchase_line_id'];

										$exp_date = null;
										if(!empty($var['exp_date'])){
											$exp_date = \Carbon::createFromFormat('Y-m-d', $var['exp_date'])->format('d-m-Y');
										}

										$qty = $var['quantity'];

										$purcahse_price = $var['purchase_price'];

										$row_total = $qty * $purcahse_price;

										$subtotal += $row_total;
										$lot_number = $var['lot_number'];
										?>

										<tr>
										<td>
											<?php echo e($product->name); ?> <?php if( $product->type == 'variable' ): ?> (<b><?php echo e($variation->product_variation->name); ?></b> : <?php echo e($variation->name); ?>) <?php endif; ?>

											<?php if(!empty($purchase_line_id)): ?>
												<?php echo Form::hidden('stocks[' . $key . '][' . $variation->id . '][' . $sub_key . '][purchase_line_id]', $purchase_line_id);; ?>

											<?php endif; ?>
										</td>
<td>
<div class="input-group">
  <?php echo Form::text('stocks[' . $key . '][' . $variation->id . '][' . $sub_key . '][quantity]', number_format($qty, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator']) , ['class' => 'form-control input-sm input_number purchase_quantity', 'required']);; ?>

  <span class="input-group-addon">
    <?php echo e($product->unit->short_name); ?>

  </span>
</div>
</td>
<td>
	<?php echo Form::text('stocks[' . $key . '][' . $variation->id . '][' . $sub_key . '][purchase_price]', number_format($purcahse_price, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator']) , ['class' => 'form-control input-sm input_number unit_price', 'required']);; ?>

</td>

<?php if($enable_expiry == 1 && $product->enable_stock == 1): ?>
	<td>
		<?php echo Form::text('stocks[' . $key . '][' . $variation->id . '][' . $sub_key . '][exp_date]', $exp_date , ['class' => 'form-control input-sm os_exp_date', 'readonly']);; ?>

	</td>
<?php endif; ?>

<?php if($enable_lot == 1): ?>
	<td>
		<?php echo Form::text('stocks[' . $key . '][' . $variation->id . '][' . $sub_key . '][lot_number]', $lot_number , ['class' => 'form-control input-sm']);; ?>

	</td>
<?php endif; ?>
										<td>
											<span class="row_subtotal_before_tax"><?php echo e(number_format($row_total, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator'])); ?></span>
										</td>
										<td>
										<?php if($loop->index == 0): ?>
											<button type="button" class="btn btn-primary btn-xs add_stock_row" data-sub-key="<?php echo e(count($purchases[$key][$variation->id])); ?>" 
												data-row-html='<tr>
													<td>
														<?php echo e($product->name); ?> <?php if( $product->type == "variable" ): ?> (<b><?php echo e($variation->product_variation->name); ?></b> : <?php echo e($variation->name); ?>) <?php endif; ?>
													</td>
													<td>
													<div class="input-group">
									              		<input class="form-control input-sm input_number purchase_quantity" required="" name="stocks[<?php echo e($key); ?>][<?php echo e($variation->id); ?>][__subkey__][quantity]" type="text" value="0">
											              <span class="input-group-addon">
											                <?php echo e($product->unit->short_name); ?>

											              </span>
								            			</div>
													</td>
									<td>
										<input class="form-control input-sm input_number unit_price" required="" name="stocks[<?php echo e($key); ?>][<?php echo e($variation->id); ?>][__subkey__][purchase_price]" type="text" value="<?php echo e(number_format($purcahse_price, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator'])); ?>">
									</td>

									<?php if($enable_expiry == 1 && $product->enable_stock == 1): ?>
									<td>
										<input class="form-control input-sm os_exp_date" required="" name="stocks[<?php echo e($key); ?>][<?php echo e($variation->id); ?>][__subkey__][exp_date]" type="text" readonly>
									</td>
									<?php endif; ?>

									<?php if($enable_lot == 1): ?>
									<td>
										<input class="form-control input-sm" name="stocks[<?php echo e($key); ?>][<?php echo e($variation->id); ?>][__subkey__][lot_number]" type="text">
									</td>
									<?php endif; ?>

									<td>
										<span class="row_subtotal_before_tax">
											0.00
										</span>
									</td>
									<td>&nbsp;</td>
												</tr>'
												><i class="fa fa-plus"></i></button>
											<?php else: ?>
											&nbsp;
											<?php endif; ?>
										</td>
										</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tbody>
								<tfoot>
								<tr>
									<td colspan="<?php if($enable_expiry == 1 && $product->enable_stock == 1 && $enable_lot == 1): ?> 5 <?php elseif(($enable_expiry == 1 && $product->enable_stock == 1) || $enable_lot == 1): ?> <?php else: ?> 3 <?php endif; ?>"></td>
									<td><strong><?php echo e(app('translator')->getFromJson( 'lang_v1.total_amount_exc_tax' )); ?>: </strong> <span id="total_subtotal"><?php echo e(number_format($subtotal, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator'])); ?></span>
									<input type="hidden" id="total_subtotal_hidden" value=0>
									</td>
								</tr>
								</tfoot>
						</table>
						
					</div>
				</div>
			</div>
		</div> <!--box end-->
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
</div>