<table class="table table-condensed no-border">
	<?php if(!empty($tax_details['tax_details'])): ?>
		<?php $__currentLoopData = $tax_details['tax_details']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax_rate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		 <tr>
		 	<th <?php if($tax_rate['is_tax_group']): ?> rowspan="2" <?php endif; ?>><?php echo e($tax_rate['tax_name']); ?></th>
		 	<td><span class="display_currency" data-currency_symbol="true"><?php echo e($tax_rate['tax_amount']); ?></span></td>
		 </tr>
		 <?php if($tax_rate['is_tax_group']): ?>
		 	<tr>
		 		<td class="text-muted" style="padding-top: 0;">
		 			<?php $__currentLoopData = $tax_rate['group_tax_details']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group_tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		 				<small><?php echo e($group_tax['name']); ?></small> - <small><span class="display_currency" data-currency_symbol="true"><?php echo e($group_tax['calculated_tax']); ?></span></small><br>
		 			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		 		</td>
		 	</tr>
		<?php endif; ?>
		 	
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php endif; ?>
	<tr>
		<th><?php echo e(app('translator')->getFromJson('sale.total')); ?></th>
		<th><span class="display_currency" data-currency_symbol="true"><?php echo e($tax_details['total_tax']); ?></span></th>
	</tr>
</table>