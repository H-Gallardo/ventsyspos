<?php $__env->startSection('title', __('lang_v1.sell_return')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header no-print">
    <h1><?php echo e(app('translator')->getFromJson('lang_v1.sell_return')); ?></h1>
</section>

<!-- Main content -->
<section class="content no-print">

<?php echo Form::hidden('location_id', $sell->location->id, ['id' => 'location_id', 'data-receipt_printer_type' => $sell->location->receipt_printer_type ]);; ?>


	<?php echo Form::open(['url' => action('SellReturnController@store'), 'method' => 'post', 'id' => 'sell_return_form' ]); ?>

	<?php echo Form::hidden('transaction_id', $sell->id);; ?>

	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title"><?php echo e(app('translator')->getFromJson('lang_v1.parent_sale')); ?></h3>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-sm-4">
					<strong><?php echo e(app('translator')->getFromJson('sale.invoice_no')); ?>:</strong> <?php echo e($sell->invoice_no); ?> <br>
					<strong><?php echo e(app('translator')->getFromJson('messages.date')); ?>:</strong> <?php echo e(\Carbon::createFromTimestamp(strtotime($sell->transaction_date))->format(session('business.date_format'))); ?>

				</div>
				<div class="col-sm-4">
					<strong><?php echo e(app('translator')->getFromJson('contact.customer')); ?>:</strong> <?php echo e($sell->contact->name); ?> <br>
					<strong><?php echo e(app('translator')->getFromJson('purchase.business_location')); ?>:</strong> <?php echo e($sell->location->name); ?>

				</div>
			</div>
		</div>
	</div>
	<div class="box box-solid">
		<div class="box-body">
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<?php echo Form::label('invoice_no', __('sale.invoice_no').':'); ?>

						<?php echo Form::text('invoice_no', !empty($sell->return_parent->invoice_no) ? $sell->return_parent->invoice_no : null, ['class' => 'form-control']);; ?>

					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						<?php echo Form::label('transaction_date', __('messages.date') . ':*'); ?>

						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</span>
							<?php
								$transaction_date = !empty($sell->return_parent->transaction_date) ? $sell->return_parent->transaction_date : 'now';
							?>
							<?php echo Form::text('transaction_date', \Carbon::createFromTimestamp(strtotime($transaction_date))->format(session('business.date_format')), ['class' => 'form-control', 'readonly', 'required']);; ?>

						</div>
					</div>
				</div>
				<div class="col-sm-12">
					<table class="table bg-gray" id="sell_return_table">
			          	<thead>
				            <tr class="bg-green">
				              	<th>#</th>
				              	<th><?php echo e(app('translator')->getFromJson('product.product_name')); ?></th>
				              	<th><?php echo e(app('translator')->getFromJson('sale.unit_price')); ?></th>
				              	<th><?php echo e(app('translator')->getFromJson('lang_v1.sell_quantity')); ?></th>
				              	<th><?php echo e(app('translator')->getFromJson('lang_v1.return_quantity')); ?></th>
				              	<th><?php echo e(app('translator')->getFromJson('lang_v1.return_subtotal')); ?></th>
				            </tr>
				        </thead>
				        <tbody>
				          	<?php $__currentLoopData = $sell->sell_lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sell_line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				            <tr>
				              	<td><?php echo e($loop->iteration); ?></td>
				              	<td>
				                	<?php echo e($sell_line->product->name); ?>

				                 	<?php if( $sell_line->product->type == 'variable'): ?>
				                  	- <?php echo e($sell_line->variations->product_variation->name); ?>

				                  	- <?php echo e($sell_line->variations->name); ?>

				                 	<?php endif; ?>
				              	</td>
				              	<td><span class="display_currency" data-currency_symbol="true"><?php echo e($sell_line->unit_price_inc_tax); ?></span></td>
				              	<td><?php echo e($sell_line->formatted_qty); ?></td>
				              	
				              	<td>
				              		<?php
						                $check_decimal = 'false';
						                if($sell_line->product->unit->allow_decimal == 0){
						                    $check_decimal = 'true';
						                }
						            ?>
						            <input type="text" name="products[<?php echo e($loop->index); ?>][quantity]" value="<?php echo e(number_format($sell_line->quantity_returned, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator'])); ?>"
						            class="form-control input-sm input_number return_qty"
						            data-rule-abs_digit="<?php echo e($check_decimal); ?>" 
						            data-msg-abs_digit="<?php echo e(app('translator')->getFromJson('lang_v1.decimal_value_not_allowed')); ?>"
			              			data-rule-max-value="<?php echo e($sell_line->quantity); ?>"
			              			data-msg-max-value="<?php echo e(app('translator')->getFromJson('validation.custom-messages.quantity_not_available', ['qty' => $sell_line->formatted_qty, 'unit' => $sell_line->product->unit->short_name ])); ?>" 
						            >
						            <input name="products[<?php echo e($loop->index); ?>][unit_price_inc_tax]" type="hidden" class="unit_price" value="<?php echo e(number_format($sell_line->unit_price_inc_tax, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator'])); ?>">
						            <input name="products[<?php echo e($loop->index); ?>][sell_line_id]" type="hidden" value="<?php echo e($sell_line->id); ?>">
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
				<?php
					$discount_type = !empty($sell->return_parent->discount_type) ? $sell->return_parent->discount_type : $sell->discount_type;
					$discount_amount = !empty($sell->return_parent->discount_amount) ? $sell->return_parent->discount_amount : $sell->discount_amount;
				?>
				<div class="col-sm-4">
					<div class="form-group">
						<?php echo Form::label('discount_type', __( 'purchase.discount_type' ) . ':'); ?>

						<?php echo Form::select('discount_type', [ '' => __('lang_v1.none'), 'fixed' => __( 'lang_v1.fixed' ), 'percentage' => __( 'lang_v1.percentage' )], $discount_type, ['class' => 'form-control']);; ?>

					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<?php echo Form::label('discount_amount', __( 'purchase.discount_amount' ) . ':'); ?>

						<?php echo Form::text('discount_amount', number_format($discount_amount, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), ['class' => 'form-control input_number']);; ?>

					</div>
				</div>
			</div>
			<?php
				$tax_percent = 0;
				if(!empty($sell->tax)){
					$tax_percent = $sell->tax->amount;
				}
			?>
			<?php echo Form::hidden('tax_id', $sell->tax_id);; ?>

			<?php echo Form::hidden('tax_amount', 0, ['id' => 'tax_amount']);; ?>

			<?php echo Form::hidden('tax_percent', $tax_percent, ['id' => 'tax_percent']);; ?>

			<div class="row">
				<div class="col-sm-12 text-right">
					<strong><?php echo e(app('translator')->getFromJson('lang_v1.total_return_discount')); ?>:</strong> 
					&nbsp;(-) <span id="total_return_discount"></span>
				</div>
				<div class="col-sm-12 text-right">
					<strong><?php echo e(app('translator')->getFromJson('lang_v1.total_return_tax')); ?> - <?php if(!empty($sell->tax)): ?>(<?php echo e($sell->tax->name); ?> - <?php echo e($sell->tax->amount); ?>%)<?php endif; ?> : </strong> 
					&nbsp;(+) <span id="total_return_tax"></span>
				</div>
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
<script src="<?php echo e(asset('js/printer.js?v=' . $asset_v)); ?>"></script>
<script src="<?php echo e(asset('js/sell_return.js?v=' . $asset_v)); ?>"></script>
<script type="text/javascript">
	$(document).ready( function(){
		$('form#sell_return_form').validate();
		update_sell_return_total();
		//Date picker
	    // $('#transaction_date').datepicker({
	    //     autoclose: true,
	    //     format: datepicker_date_format
	    // });
	});
	$(document).on('change', 'input.return_qty, #discount_amount, #discount_type', function(){
		update_sell_return_total()
	});

	function update_sell_return_total(){
		var net_return = 0;
		$('table#sell_return_table tbody tr').each( function(){
			var quantity = __read_number($(this).find('input.return_qty'));
			var unit_price = __read_number($(this).find('input.unit_price'));
			var subtotal = quantity * unit_price;
			$(this).find('.return_subtotal').text(__currency_trans_from_en(subtotal, true));
			net_return += subtotal;
		});
		var discount = 0;
		if($('#discount_type').val() == 'fixed'){
			discount = __read_number($("#discount_amount"));
		} else if($('#discount_type').val() == 'percentage'){
			var discount_percent = __read_number($("#discount_amount"));
			discount = __calculate_amount('percentage', discount_percent, net_return);
		}
		discounted_net_return = net_return - discount;

		var tax_percent = $('input#tax_percent').val();
		var total_tax = __calculate_amount('percentage', tax_percent, discounted_net_return);
		var net_return_inc_tax = total_tax + discounted_net_return;

		$('input#tax_amount').val(total_tax);
		$('span#total_return_discount').text(__currency_trans_from_en(discount, true));
		$('span#total_return_tax').text(__currency_trans_from_en(total_tax, true));
		$('span#net_return').text(__currency_trans_from_en(net_return_inc_tax, true));
	}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>