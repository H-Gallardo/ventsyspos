<div class="modal fade" tabindex="-1" role="dialog" id="modal_payment">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><?php echo e(app('translator')->getFromJson('lang_v1.payment')); ?></h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-9">
						<div class="row">
							<div id="payment_rows_div">
								<?php $__currentLoopData = $payment_lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment_line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									
									<?php if($payment_line['is_return'] == 1): ?>
										<?php
											$change_return = $payment_line;
										?>

										<?php continue; ?>
									<?php endif; ?>

									<?php echo $__env->make('sale_pos.partials.payment_row', ['removable' => !$loop->first, 'row_index' => $loop->index, 'payment_line' => $payment_line], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
							<input type="hidden" id="payment_row_index" value="<?php echo e(count($payment_lines)); ?>">
						</div>
						<div class="row">
							<div class="col-md-12">
								<button type="button" class="btn btn-primary btn-block" id="add-payment-row"><?php echo e(app('translator')->getFromJson('sale.add_payment_row')); ?></button>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<?php echo Form::label('sale_note', __('sale.sell_note') . ':'); ?>

									<?php echo Form::textarea('sale_note', !empty($transaction)? $transaction->additional_notes:null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => __('sale.sell_note')]);; ?>

								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<?php echo Form::label('staff_note', __('sale.staff_note') . ':'); ?>

									<?php echo Form::textarea('staff_note', 
									!empty($transaction)? $transaction->staff_note:null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => __('sale.staff_note')]);; ?>

								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="box box-solid bg-orange">
				            <div class="box-body">
				            	<div class="col-md-12">
				            		<strong>
				            			<?php echo e(app('translator')->getFromJson('lang_v1.total_items')); ?>:
				            		</strong>
				            		<br/>
				            		<span class="lead text-bold total_quantity">0</span>
				            	</div>

				            	<div class="col-md-12">
				            		<hr>
				            		<strong>
				            			<?php echo e(app('translator')->getFromJson('sale.total_payable')); ?>:
				            		</strong>
				            		<br/>
				            		<span class="lead text-bold total_payable_span">0</span>
				            	</div>

				            	<div class="col-md-12">
				            		<hr>
				            		<strong>
				            			<?php echo e(app('translator')->getFromJson('lang_v1.total_paying')); ?>:
				            		</strong>
				            		<br/>
				            		<span class="lead text-bold total_paying">0</span>
				            		<input type="hidden" id="total_paying_input">
				            	</div>

				            	<div class="col-md-12">
				            		<hr>
				            		<strong>
				            			<?php echo e(app('translator')->getFromJson('lang_v1.change_return')); ?>:
				            		</strong>
				            		<br/>
				            		<span class="lead text-bold change_return_span">0</span>
				            		<?php echo Form::hidden("change_return", $change_return['amount'], ['class' => 'form-control change_return input_number', 'required', 'id' => "change_return", 'placeholder' => __('sale.amount'), 'readonly']);; ?>

				            		<!-- <span class="lead text-bold total_quantity">0</span> -->
				            		<?php if(!empty($change_return['id'])): ?>
				                		<input type="hidden" name="change_return_id" 
				                		value="<?php echo e($change_return['id']); ?>">
				                	<?php endif; ?>
				            	</div>

				            	<div class="col-md-12">
				            		<hr>
				            		<strong>
				            			<?php echo e(app('translator')->getFromJson('lang_v1.balance')); ?>:
				            		</strong>
				            		<br/>
				            		<span class="lead text-bold balance_due">0</span>
				            		<input type="hidden" id="in_balance_due" value=0>
				            	</div>


				            					              
				            </div>
				            <!-- /.box-body -->
				          </div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(app('translator')->getFromJson('messages.close')); ?></button>
				<button type="submit" class="btn btn-primary" id="pos-save"><?php echo e(app('translator')->getFromJson('sale.finalize_payment')); ?></button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Used for express checkout card transaction -->
<div class="modal fade" tabindex="-1" role="dialog" id="card_details_modal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><?php echo e(app('translator')->getFromJson('lang_v1.card_transaction_details')); ?></h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">

		<div class="col-md-4">
			<div class="form-group">
				<?php echo Form::label("card_number", __('lang_v1.card_no')); ?>

				<?php echo Form::text("", null, ['class' => 'form-control', 'placeholder' => __('lang_v1.card_no'), 'id' => "card_number", 'autofocus']);; ?>

			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<?php echo Form::label("card_holder_name", __('lang_v1.card_holder_name')); ?>

				<?php echo Form::text("", null, ['class' => 'form-control', 'placeholder' => __('lang_v1.card_holder_name'), 'id' => "card_holder_name"]);; ?>

			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<?php echo Form::label("card_transaction_number",__('lang_v1.card_transaction_no')); ?>

				<?php echo Form::text("", null, ['class' => 'form-control', 'placeholder' => __('lang_v1.card_transaction_no'), 'id' => "card_transaction_number"]);; ?>

			</div>
		</div>
		<div class="clearfix"></div>
		<div class="col-md-3">
			<div class="form-group">
				<?php echo Form::label("card_type", __('lang_v1.card_type')); ?>

				<?php echo Form::select("", ['visa' => 'Visa', 'master' => 'MasterCard'], 'visa',['class' => 'form-control select2', 'id' => "card_type" ]);; ?>

			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<?php echo Form::label("card_month", __('lang_v1.month')); ?>

				<?php echo Form::text("", null, ['class' => 'form-control', 'placeholder' => __('lang_v1.month'),
				'id' => "card_month" ]);; ?>

			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<?php echo Form::label("card_year", __('lang_v1.year')); ?>

				<?php echo Form::text("", null, ['class' => 'form-control', 'placeholder' => __('lang_v1.year'), 'id' => "card_year" ]);; ?>

			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<?php echo Form::label("card_security",__('lang_v1.security_code')); ?>

				<?php echo Form::text("", null, ['class' => 'form-control', 'placeholder' => __('lang_v1.security_code'), 'id' => "card_security"]);; ?>

			</div>
		</div>
					</div>
				</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="pos-save-card"><?php echo e(app('translator')->getFromJson('sale.finalize_payment')); ?></button>
			</div>

		</div>
	</div>
</div>