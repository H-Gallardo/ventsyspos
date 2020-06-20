<?php $__env->startSection('title', __('lang_v1.purchase_return')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(app('translator')->getFromJson('lang_v1.purchase_return')); ?></h1>
</section>

<!-- Main content -->
<section class="content">
	<?php echo Form::open(['url' => action('PurchaseReturnController@store'), 'method' => 'post', 'id' => 'purchase_return_form' ]); ?>

	<?php echo Form::hidden('transaction_id', $purchase->id);; ?>

	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title"><?php echo e(app('translator')->getFromJson('lang_v1.parent_purchase')); ?></h3>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-sm-4">
					<strong><?php echo e(app('translator')->getFromJson('purchase.ref_no')); ?>:</strong> <?php echo e($purchase->ref_no); ?> <br>
					<strong><?php echo e(app('translator')->getFromJson('messages.date')); ?>:</strong> <?php echo e(\Carbon::createFromTimestamp(strtotime($purchase->transaction_date))->format(session('business.date_format'))); ?>

				</div>
				<div class="col-sm-4">
					<strong><?php echo e(app('translator')->getFromJson('purchase.supplier')); ?>:</strong> <?php echo e($purchase->contact->name); ?> <br>
					<strong><?php echo e(app('translator')->getFromJson('purchase.business_location')); ?>:</strong> <?php echo e($purchase->location->name); ?>

				</div>
			</div>
		</div>
	</div>
	<div class="box box-solid">
		<div class="box-body">
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<?php echo Form::label('ref_no', __('purchase.ref_no').':'); ?>

						<?php echo Form::text('ref_no', !empty($purchase->return_parent->ref_no) ? $purchase->return_parent->ref_no : null, ['class' => 'form-control']);; ?>

					</div>
				</div>
				<div class="col-sm-12">
					<table class="table bg-gray" id="purchase_return_table">
			          	<thead>
				            <tr class="bg-green">
				              	<th>#</th>
				              	<th><?php echo e(app('translator')->getFromJson('product.product_name')); ?></th>
				              	<th><?php echo e(app('translator')->getFromJson('sale.unit_price')); ?></th>
				              	<th><?php echo e(app('translator')->getFromJson('purchase.purchase_quantity')); ?></th>
				              	<th><?php echo e(app('translator')->getFromJson('lang_v1.quantity_left')); ?></th>
				              	<th><?php echo e(app('translator')->getFromJson('lang_v1.return_quantity')); ?></th>
				              	<th><?php echo e(app('translator')->getFromJson('lang_v1.return_subtotal')); ?></th>
				            </tr>
				        </thead>
				        <tbody>
				          	<?php $__currentLoopData = $purchase->purchase_lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase_line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				          	<?php
				          		$qty_available = $purchase_line->quantity - $purchase_line->quantity_sold - $purchase_line->quantity_adjusted;
				          	?>
				            <tr>
				              	<td><?php echo e($loop->iteration); ?></td>
				              	<td>
				                	<?php echo e($purchase_line->product->name); ?>

				                 	<?php if( $purchase_line->product->type == 'variable'): ?>
				                  	- <?php echo e($purchase_line->variations->product_variation->name); ?>

				                  	- <?php echo e($purchase_line->variations->name); ?>

				                 	<?php endif; ?>
				              	</td>
				              	<td><span class="display_currency" data-currency_symbol="true"><?php echo e($purchase_line->purchase_price_inc_tax); ?></span></td>
				              	<td><?php echo e($purchase_line->quantity); ?></td>
				              	<td><span class="display_currency" data-currency_symbol="false"><?php echo e($qty_available); ?></span></td>
				              	<td>
				              		<?php
						                $check_decimal = 'false';
						                if($purchase_line->product->unit->allow_decimal == 0){
						                    $check_decimal = 'true';
						                }
						            ?>
						            <input type="text" name="returns[<?php echo e($purchase_line->id); ?>]" value="<?php echo e(number_format($purchase_line->quantity_returned, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator'])); ?>"
						            class="form-control input-sm input_number return_qty"
						            data-rule-abs_digit="<?php echo e($check_decimal); ?>" 
						            data-msg-abs_digit="<?php echo e(app('translator')->getFromJson('lang_v1.decimal_value_not_allowed')); ?>"
						            <?php if($purchase_line->product->enable_stock): ?> 
				              			data-rule-max-value="<?php echo e($qty_available); ?>"
				              			data-msg-max-value="<?php echo e(app('translator')->getFromJson('validation.custom-messages.quantity_not_available', ['qty' => $purchase_line->formatted_qty_available, 'unit' => $purchase_line->product->unit->short_name ])); ?>" 
				              		<?php endif; ?>
						            >
						            <input type="hidden" class="unit_price" value="<?php echo e(number_format($purchase_line->purchase_price_inc_tax, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator'])); ?>">
				              	</td>
				              	<td>
				              		<div class="return_subtotal"></div>
				              		
				              	</td>
				            </tr>
				          	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			          	</tbody>
			        </table>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<strong><?php echo e(app('translator')->getFromJson('lang_v1.total_return_tax')); ?>: </strong>
					<span id="total_return_tax"></span> <?php if(!empty($purchase->tax)): ?>(<?php echo e($purchase->tax->name); ?> - <?php echo e($purchase->tax->amount); ?>%)<?php endif; ?>
					<?php
						$tax_percent = 0;
						if(!empty($purchase->tax)){
							$tax_percent = $purchase->tax->amount;
						}
					?>
					<?php echo Form::hidden('tax_id', $purchase->tax_id);; ?>

					<?php echo Form::hidden('tax_amount', 0, ['id' => 'tax_amount']);; ?>

					<?php echo Form::hidden('tax_percent', $tax_percent, ['id' => 'tax_percent']);; ?>

				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 text-right">
					<strong><?php echo e(app('translator')->getFromJson('lang_v1.return_total')); ?>: </strong>&nbsp;
					<span id="net_return">0</span> 
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-12">
					<button type="submit" class="btn btn-primary pull-right"><?php echo e(app('translator')->getFromJson('messages.save')); ?></button>
				</div>
			</div>
		</div>
	</div>
	<?php echo Form::close(); ?>


</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
	$(document).ready( function(){
		$('form#purchase_return_form').validate();
		update_purchase_return_total();
	});
	$(document).on('change', 'input.return_qty', function(){
		update_purchase_return_total()
	});

	function update_purchase_return_total(){
		var net_return = 0;
		$('table#purchase_return_table tbody tr').each( function(){
			var quantity = __read_number($(this).find('input.return_qty'));
			var unit_price = __read_number($(this).find('input.unit_price'));
			var subtotal = quantity * unit_price;
			$(this).find('.return_subtotal').text(__currency_trans_from_en(subtotal, true));
			net_return += subtotal;
		});
		var tax_percent = $('input#tax_percent').val();
		var total_tax = __calculate_amount('percentage', tax_percent, net_return);
		var net_return_inc_tax = total_tax + net_return;

		$('input#tax_amount').val(total_tax);
		$('span#total_return_tax').text(__currency_trans_from_en(total_tax, true));
		$('span#net_return').text(__currency_trans_from_en(net_return_inc_tax, true));
	}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>