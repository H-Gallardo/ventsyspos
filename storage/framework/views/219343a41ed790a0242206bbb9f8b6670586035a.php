<?php $__env->startSection('title', __('sale.edit_sale')); ?>

<?php $__env->startSection('content'); ?>
<input type="hidden" id="__precision" value="<?php echo e(config('constants.currency_precision')); ?>">
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(app('translator')->getFromJson('sale.edit_sale')); ?> <small>(<?php echo e(app('translator')->getFromJson('sale.invoice_no')); ?>: <span class="text-success">#<?php echo e($transaction->invoice_no); ?>)</span></small></h1>
</section>
<!-- Main content -->
<section class="content">
<input type="hidden" id="item_addition_method" value="<?php echo e($business_details->item_addition_method); ?>">
	<?php echo Form::open(['url' => action('SellPosController@update', ['id' => $transaction->id ]), 'method' => 'put', 'id' => 'edit_sell_form' ]); ?>


	<?php echo Form::hidden('location_id', $transaction->location_id, ['id' => 'location_id', 'data-receipt_printer_type' => !empty($location_printer_type) ? $location_printer_type : 'browser']);; ?>

	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="box box-solid">
				<!-- /.box-header -->
				<div class="box-body">
					<?php if(!empty($price_groups)): ?>
						<?php if(count($price_groups) > 1): ?>
							<div class="col-md-4 col-sm-6">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-money"></i>
										</span>
										<?php echo Form::hidden('hidden_price_group', $transaction->selling_price_group_id, ['id' => 'hidden_price_group']); ?>

										<?php echo Form::select('price_group', $price_groups, $transaction->selling_price_group_id, ['class' => 'form-control select2', 'id' => 'price_group']);; ?>

										<span class="input-group-addon">
											<?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('lang_v1.price_group_help_text') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
										</span> 
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
						<?php else: ?>
							<?php echo Form::hidden('price_group', $transaction->selling_price_group_id, ['id' => 'price_group']); ?>

						<?php endif; ?>
					<?php endif; ?>
					<div class="<?php if(!empty($commission_agent)): ?> col-sm-3 <?php else: ?> col-sm-4 <?php endif; ?>">
						<div class="form-group">
							<?php echo Form::label('contact_id', __('contact.customer') . ':*'); ?>

							<div class="input-group">
								<span class="input-group-addon">
									<i class="fa fa-user"></i>
								</span>
								<input type="hidden" id="default_customer_id" 
								value="<?php echo e($transaction->contact->id); ?>" >
								<input type="hidden" id="default_customer_name" 
								value="<?php echo e($transaction->contact->name); ?>" >
								<?php echo Form::select('contact_id', 
									[], null, ['class' => 'form-control mousetrap', 'id' => 'customer_id', 'placeholder' => 'Enter Customer name / phone', 'required']);; ?>

								<span class="input-group-btn">
									<button type="button" class="btn btn-default bg-white btn-flat add_new_customer" data-name=""><i class="fa fa-plus-circle text-primary fa-lg"></i></button>
								</span>
							</div>
						</div>
					</div>

					<div class="col-md-3">
			          <div class="form-group">
			            <div class="multi-input">
			              <?php echo Form::label('pay_term_number', __('contact.pay_term') . ':'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.pay_term') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
			              <br/>
			              <?php echo Form::number('pay_term_number', $transaction->pay_term_number, ['class' => 'form-control width-40 pull-left', 'placeholder' => __('contact.pay_term')]);; ?>


			              <?php echo Form::select('pay_term_type', 
			              	['months' => __('lang_v1.months'), 
			              		'days' => __('lang_v1.days')], 
			              		$transaction->pay_term_type, 
			              	['class' => 'form-control width-60 pull-left','placeholder' => __('messages.please_select')]);; ?>

			            </div>
			          </div>
			        </div>

					<?php if(!empty($commission_agent)): ?>
					<div class="col-sm-3">
						<div class="form-group">
						<?php echo Form::label('commission_agent', __('lang_v1.commission_agent') . ':'); ?>

						<?php echo Form::select('commission_agent', 
									$commission_agent, $transaction->commission_agent, ['class' => 'form-control select2']);; ?>

						</div>
					</div>
					<?php endif; ?>
					<div class="<?php if(!empty($commission_agent)): ?> col-sm-3 <?php else: ?> col-sm-4 <?php endif; ?>">
						<div class="form-group">
							<?php echo Form::label('transaction_date', __('sale.sale_date') . ':*'); ?>

							<div class="input-group">
								<span class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</span>
								<?php echo Form::text('transaction_date', $transaction->transaction_date, ['class' => 'form-control', 'readonly', 'required']);; ?>

							</div>
						</div>
					</div>
					<?php
						if($transaction->status == 'draft' && $transaction->is_quotation == 1){
							$status = 'quotation';
						} else {
							$status = $transaction->status;
						}
					?>
					<div class="<?php if(!empty($commission_agent)): ?> col-sm-3 <?php else: ?> col-sm-4 <?php endif; ?>">
						<div class="form-group">
							<?php echo Form::label('status', __('sale.status') . ':*'); ?>

							<?php echo Form::select('status', ['final' => __('sale.final'), 'draft' => __('sale.draft'), 'quotation' => __('lang_v1.quotation')], $status, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'required']);; ?>

						</div>
					</div>
					
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
			<div class="box box-solid">
				<div class="box-body">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">
									<i class="fa fa-barcode"></i>
								</span>
								<?php echo Form::text('search_product', null, ['class' => 'form-control mousetrap', 'id' => 'search_product', 'placeholder' => __('lang_v1.search_product_placeholder'),
								'autofocus' => true,
								]);; ?>

							</div>
						</div>
					</div>

					<div class="row col-sm-12 pos_product_div" style="min-height: 0">

						<input type="hidden" name="sell_price_tax" id="sell_price_tax" value="<?php echo e($business_details->sell_price_tax); ?>">

						<!-- Keeps count of product rows -->
						<input type="hidden" id="product_row_count" 
							value="<?php echo e(count($sell_details)); ?>">
						<?php
							$hide_tax = '';
							if( session()->get('business.enable_inline_tax') == 0){
								$hide_tax = 'hide';
							}
						?>
						<div class="table-responsive">
						<table class="table table-condensed table-bordered table-striped table-responsive" id="pos_table">
							<thead>
								<tr>
									<th class="text-center">	
										<?php echo e(app('translator')->getFromJson('sale.product')); ?>
									</th>
									<th class="text-center">
										<?php echo e(app('translator')->getFromJson('sale.qty')); ?>
									</th>
									<th class="text-center <?php echo e($hide_tax); ?>">
										<?php echo e(app('translator')->getFromJson('sale.price_inc_tax')); ?>
									</th>
									<th class="text-center">
										<?php echo e(app('translator')->getFromJson('sale.subtotal')); ?>
									</th>
									<th class="text-center"><i class="fa fa-trash" aria-hidden="true"></i></th>
								</tr>
							</thead>
							<tbody>
								<?php $__currentLoopData = $sell_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sell_line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php echo $__env->make('sale_pos.product_row', ['product' => $sell_line, 'row_count' => $loop->index, 'tax_dropdown' => $taxes], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</tbody>
						</table>
						</div>
						<div class="table-responsive">
						<table class="table table-condensed table-bordered table-striped table-responsive">
							<tr>
								<td>
									<div class="pull-right"><b><?php echo e(app('translator')->getFromJson('sale.total')); ?>: </b>
										<span class="price_total">0</span>
									</div>
								</td>
							</tr>
						</table>
						</div>
					</div>
				</div>
			</div><!-- /.box -->

			<div class="box box-solid">
				<div class="box-body">
					<div class="col-md-4">
				        <div class="form-group">
				            <?php echo Form::label('discount_type', __('sale.discount_type') . ':*' ); ?>

				            <div class="input-group">
				                <span class="input-group-addon">
				                    <i class="fa fa-info"></i>
				                </span>
				                <?php echo Form::select('discount_type', ['fixed' => __('lang_v1.fixed'), 'percentage' => __('lang_v1.percentage')], $transaction->discount_type , ['class' => 'form-control','placeholder' => __('messages.please_select'), 'required', 'data-default' => 'percentage']);; ?>

				            </div>
				        </div>
				    </div>
				    <div class="col-md-4">
				        <div class="form-group">
				            <?php echo Form::label('discount_amount', __('sale.discount_amount') . ':*' ); ?>

				            <div class="input-group">
				                <span class="input-group-addon">
				                    <i class="fa fa-info"></i>
				                </span>
				                <?php echo Form::text('discount_amount', number_format($transaction->discount_amount, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), ['class' => 'form-control input_number', 'data-default' => $business_details->default_sales_discount]);; ?>

				            </div>
				        </div>
				    </div>
				    <div class="col-md-4"><br>
				    	<b><?php echo e(app('translator')->getFromJson( 'sale.discount_amount' )); ?>:</b>(-) 
						<span class="display_currency" id="total_discount">0</span>
				    </div>
				    <div class="clearfix"></div>
				    <div class="col-md-4">
				    	<div class="form-group">
				            <?php echo Form::label('tax_rate_id', __('sale.order_tax') . ':*' ); ?>

				            <div class="input-group">
				                <span class="input-group-addon">
				                    <i class="fa fa-info"></i>
				                </span>
				                <?php echo Form::select('tax_rate_id', $taxes['tax_rates'], $transaction->tax_id, ['placeholder' => __('messages.please_select'), 'class' => 'form-control', 'data-default'=> $business_details->default_sales_tax], $taxes['attributes']);; ?>


								<input type="hidden" name="tax_calculation_amount" id="tax_calculation_amount" 
								value="<?php echo e(number_format(optional($transaction->tax)->amount, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator'])); ?>" data-default="<?php echo e($business_details->tax_calculation_amount); ?>">
				            </div>
				        </div>
				    </div>
				    <div class="col-md-4 col-md-offset-4">
				    	<b><?php echo e(app('translator')->getFromJson( 'sale.order_tax' )); ?>:</b>(+) 
						<span class="display_currency" id="order_tax"><?php echo e($transaction->tax_amount); ?></span>
				    </div>
				    <div class="clearfix"></div>
					<div class="col-md-4">
						<div class="form-group">
				            <?php echo Form::label('shipping_details', __('sale.shipping_details')); ?>

				            <div class="input-group">
								<span class="input-group-addon">
				                    <i class="fa fa-info"></i>
				                </span>
				                <?php echo Form::textarea('shipping_details',$transaction->shipping_details, ['class' => 'form-control','placeholder' => __('sale.shipping_details') ,'rows' => '1', 'cols'=>'30']);; ?>

				            </div>
				        </div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<?php echo Form::label('shipping_charges', __('sale.shipping_charges')); ?>

							<div class="input-group">
							<span class="input-group-addon">
							<i class="fa fa-info"></i>
							</span>
							<?php echo Form::text('shipping_charges',number_format($transaction->shipping_charges, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator']),['class'=>'form-control input_number','placeholder'=> __('sale.shipping_charges')]);; ?>

							</div>
						</div>
					</div>
				    <div class="col-md-4 col-md-offset-8">
				    	<div><b><?php echo e(app('translator')->getFromJson('sale.total_payable')); ?>: </b>
							<input type="hidden" name="final_total" id="final_total_input">
							<span id="total_payable">0</span>
						</div>
				    </div>
				    <div class="col-md-12">
				    	<div class="form-group">
							<?php echo Form::label('sell_note',__('sale.sell_note') . ':'); ?>

							<?php echo Form::textarea('sale_note', $transaction->additional_notes, ['class' => 'form-control', 'rows' => 3]);; ?>

						</div>
				    </div>
				    <input type="hidden" name="is_direct_sale" value="1">
				    <div class="col-md-12">
				    	<button type="button" class="btn btn-primary pull-right" id="submit-sell"><?php echo e(app('translator')->getFromJson('messages.update')); ?></button>
				    </div>
				</div>
			</div><!-- /.box -->

		</div>
	</div>
	<?php echo Form::close(); ?>

</section>

<div class="modal fade contact_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
	<?php echo $__env->make('contact.create', ['quick_add' => true], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<!-- /.content -->
<div class="modal fade register_details_modal" tabindex="-1" role="dialog" 
	aria-labelledby="gridSystemModalLabel">
</div>
<div class="modal fade close_register_modal" tabindex="-1" role="dialog" 
	aria-labelledby="gridSystemModalLabel">
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
	<script src="<?php echo e(asset('js/pos.js?v=' . $asset_v)); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>