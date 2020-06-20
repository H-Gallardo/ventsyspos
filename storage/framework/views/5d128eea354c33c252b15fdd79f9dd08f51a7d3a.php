<div class="row">
	<input type="hidden" class="payment_row_index" value="<?php echo e($row_index); ?>">
	<?php
		$col_class = 'col-md-6';
		if(!empty($accounts)){
			$col_class = 'col-md-4';
		}
	?>
	<div class="<?php echo e($col_class); ?>">
		<div class="form-group">
			<?php echo Form::label("amount_$row_index" ,__('sale.amount') . ':*'); ?>

			<div class="input-group">
				<span class="input-group-addon">
					<i class="fa fa-money"></i>
				</span>
				<?php echo Form::text("payment[$row_index][amount]", number_format($payment_line['amount'], 2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), ['class' => 'form-control payment-amount input_number', 'required', 'id' => "amount_$row_index", 'placeholder' => __('sale.amount')]);; ?>

			</div>
		</div>
	</div>
	<div class="<?php echo e($col_class); ?>">
		<div class="form-group">
			<?php echo Form::label("method_$row_index" , __('lang_v1.payment_method') . ':*'); ?>

			<div class="input-group">
				<span class="input-group-addon">
					<i class="fa fa-money"></i>
				</span>
				<?php echo Form::select("payment[$row_index][method]", $payment_types, $payment_line['method'], ['class' => 'form-control col-md-12 payment_types_dropdown', 'required', 'id' => "method_$row_index", 'style' => 'width:100%;']);; ?>

			</div>
		</div>
	</div>
	<?php if(!empty($accounts)): ?>
		<div class="<?php echo e($col_class); ?>">
			<div class="form-group">
				<?php echo Form::label("account_$row_index" , __('lang_v1.payment_account') . ':'); ?>

				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-money"></i>
					</span>
					<?php echo Form::select("payment[$row_index][account_id]", $accounts, !empty($payment_line['account_id']) ? $payment_line['account_id'] : '' , ['class' => 'form-control select2', 'id' => "account_$row_index", 'style' => 'width:100%;']);; ?>

				</div>
			</div>
		</div>
	<?php endif; ?>
	<div class="clearfix"></div>
		<?php echo $__env->make('sale_pos.partials.payment_type_details', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="col-md-12">
		<div class="form-group">
			<?php echo Form::label("note_$row_index", __('sale.payment_note') . ':'); ?>

			<?php echo Form::textarea("payment[$row_index][note]", $payment_line['note'], ['class' => 'form-control', 'rows' => 3, 'id' => "note_$row_index"]);; ?>

		</div>
	</div>
</div>