<table class='table table-condensed table-striped'>
	<tr>
	    <th><?php echo e(app('translator')->getFromJson('business.operations')); ?></th>
	    <th><?php echo e(app('translator')->getFromJson('business.keyboard_shortcut')); ?></th>
	</tr>

	<?php if($pos_settings['disable_express_checkout'] == 0): ?>
		<tr>
		    <td><?php echo e(app('translator')->getFromJson('sale.express_finalize')); ?>:</td>
		    <td>
			    <?php if(!empty($shortcuts["pos"]["express_checkout"])): ?>
			    	<?php echo e($shortcuts["pos"]["express_checkout"]); ?>

			    <?php endif; ?>
		    </td>
		</tr>
	<?php endif; ?>

	<?php if($pos_settings['disable_pay_checkout'] == 0): ?>
		<tr>
		    <td><?php echo e(app('translator')->getFromJson('sale.finalize')); ?>:</td>
		    <td>
		    	<?php if(!empty($shortcuts["pos"]["pay_n_ckeckout"])): ?>
			    	<?php echo e($shortcuts["pos"]["pay_n_ckeckout"]); ?>

			    <?php endif; ?>
		    </td>
		</tr>
	<?php endif; ?>

	<?php if($pos_settings['disable_draft'] == 0): ?>
		<tr>
		    <td><?php echo e(app('translator')->getFromJson('sale.draft')); ?>:</td>
		    <td>
		    	<?php if(!empty($shortcuts["pos"]["draft"])): ?>
			    	<?php echo e($shortcuts["pos"]["draft"]); ?>

			    <?php endif; ?>
		    </td>
		</tr>
	<?php endif; ?>

	<tr>
	    <td><?php echo e(app('translator')->getFromJson('messages.cancel')); ?>:</td>
	    <td>
	    	<?php if(!empty($shortcuts["pos"]["cancel"])): ?>
		    	<?php echo e($shortcuts["pos"]["cancel"]); ?>

		    <?php endif; ?>
	    </td>
	</tr>

	<?php if($pos_settings['disable_discount'] == 0): ?>
		<tr>
		    <td><?php echo e(app('translator')->getFromJson('sale.edit_discount')); ?>:</td>
		    <td>
		    	<?php if(!empty($shortcuts["pos"]["edit_discount"])): ?>
			    	<?php echo e($shortcuts["pos"]["edit_discount"]); ?>

			    <?php endif; ?>
		    </td>
		</tr>
	<?php endif; ?>

	<?php if($pos_settings['disable_order_tax'] == 0): ?>
		<tr>
		    <td><?php echo e(app('translator')->getFromJson('sale.edit_order_tax')); ?>:</td>
		    <td>
		    	<?php if(!empty($shortcuts["pos"]["edit_order_tax"])): ?>
			    	<?php echo e($shortcuts["pos"]["edit_order_tax"]); ?>

			    <?php endif; ?>
		    </td>
		</tr>
	<?php endif; ?>

	<?php if($pos_settings['disable_pay_checkout'] == 0): ?>
		<tr>
		    <td><?php echo e(app('translator')->getFromJson('sale.add_payment_row')); ?>:</td>
		    <td>
		    	<?php if(!empty($shortcuts["pos"]["add_payment_row"])): ?>
			    	<?php echo e($shortcuts["pos"]["add_payment_row"]); ?>

			    <?php endif; ?>
		    </td>
		</tr>
	<?php endif; ?>

	<?php if($pos_settings['disable_pay_checkout'] == 0): ?>
		<tr>
		    <td><?php echo e(app('translator')->getFromJson('sale.finalize_payment')); ?>:</td>
		    <td>
		    	<?php if(!empty($shortcuts["pos"]["finalize_payment"])): ?>
			    	<?php echo e($shortcuts["pos"]["finalize_payment"]); ?>

			    <?php endif; ?>
		    </td>
		</tr>
	<?php endif; ?>
	
	<tr>
	    <td><?php echo e(app('translator')->getFromJson('lang_v1.recent_product_quantity')); ?>:</td>
	    <td>
	    	<?php if(!empty($shortcuts["pos"]["recent_product_quantity"])): ?>
		    	<?php echo e($shortcuts["pos"]["recent_product_quantity"]); ?>

		    <?php endif; ?>
	    </td>
	</tr>

	<tr>
	    <td><?php echo e(app('translator')->getFromJson('lang_v1.add_new_product')); ?>:</td>
	    <td>
	    	<?php if(!empty($shortcuts["pos"]["add_new_product"])): ?>
		    	<?php echo e($shortcuts["pos"]["add_new_product"]); ?>

		    <?php endif; ?>
	    </td>
	</tr>
	
</table>