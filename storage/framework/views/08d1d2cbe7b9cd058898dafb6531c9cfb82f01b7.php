<?php if(!empty($transactions)): ?>
	<table class="table table-slim no-border">
		<?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr class="cursor-pointer" 
	    		data-toggle="tooltip"
	    		data-html="true"
	    		title="Customer: <?php echo e(optional($transaction->contact)->name); ?> 
		    		<?php if(!empty($transaction->contact->mobile) && $transaction->contact->is_default == 0): ?>
		    			<br/>Mobile: <?php echo e($transaction->contact->mobile); ?>

		    		<?php endif; ?>
	    		" >
				<td>
					<?php echo e($loop->iteration); ?>.
				</td>
				<td>
					<?php echo e($transaction->invoice_no); ?> (<?php echo e(optional($transaction->contact)->name); ?>)
				</td>
				<td class="display_currency">
					<?php echo e($transaction->final_total); ?>

				</td>
				<td>
					<a href="<?php echo e(action('SellPosController@edit', [$transaction->id])); ?>">
	    				<i class="fa fa-pencil text-muted" aria-hidden="true" title="<?php echo e(__('lang_v1.click_to_edit')); ?>"></i>
	    			</a>
	    			
	    			<a href="<?php echo e(action('SellPosController@destroy', [$transaction->id])); ?>" class="delete-sale" style="padding-left: 20px"><i class="fa fa-trash text-danger" title="<?php echo e(__('lang_v1.click_to_delete')); ?>"></i></a>
				</td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</table>
<?php else: ?>
	<p><?php echo e(app('translator')->getFromJson('sale.no_recent_transactions')); ?></p>
<?php endif; ?>