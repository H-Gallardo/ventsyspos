<div class="row" id="quick_product_opening_stock_div">
	<div class="col-sm-12">
		<h4><?php echo e(app('translator')->getFromJson('lang_v1.add_opening_stock')); ?></h4>
	</div>
	<div class="col-sm-12">
		<table class="table table-condensed table-th-green" id="quick_product_opening_stock_table">
			<thead>
			<tr>
				<th><?php echo e(app('translator')->getFromJson('sale.location')); ?></th>
				<th><?php echo e(app('translator')->getFromJson( 'lang_v1.quantity' )); ?></th>
				<th><?php echo e(app('translator')->getFromJson( 'purchase.unit_cost_before_tax' )); ?></th>
				<?php if($enable_expiry): ?>
					<th><?php echo e(app('translator')->getFromJson('lang_v1.expiry_date')); ?></th>
				<?php endif; ?>
				<?php if($enable_lot): ?>
					<th><?php echo e(app('translator')->getFromJson( 'lang_v1.lot_number' )); ?></th>
				<?php endif; ?>
				<th><?php echo e(app('translator')->getFromJson( 'purchase.subtotal_before_tax' )); ?></th>
			</tr>
			</thead>
			<tbody>
		<?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($value); ?></td>
				<td><?php echo Form::text('opening_stock[' . $key . '][quantity]', 0, ['class' => 'form-control input-sm input_number purchase_quantity', 'required']);; ?></td>
				<td><?php echo Form::text('opening_stock[' . $key . '][purchase_price]', null , ['class' => 'form-control input-sm input_number unit_price', 'required']);; ?></td>
				<?php if($enable_expiry): ?>
					<td>
						<?php echo Form::text('opening_stock[' . $key . '][exp_date]', null , ['class' => 'form-control input-sm os_exp_date', 'readonly']);; ?>

					</td>
				<?php endif; ?>
				<?php if($enable_lot): ?>
					<td>
						<?php echo Form::text('opening_stock[' . $key . '][lot_number]', null , ['class' => 'form-control input-sm']);; ?>

					</td>
				<?php endif; ?>
				<td>
					<span class="row_subtotal_before_tax">0</span>
				</td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
		</table>
	</div>
</div>