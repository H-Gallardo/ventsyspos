<table class='table table-condensed table-striped'>
	<tr>
	    <th><?php echo e(app('translator')->getFromJson('business.operations')); ?></th>
	    <th><?php echo e(app('translator')->getFromJson('business.keyboard_shortcut')); ?></th>
	</tr>
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