<?php $__env->startSection('title', __('sale.add_sale')); ?>

<?php $__env->startSection('content'); ?>
<input type="hidden" id="__precision" value="<?php echo e(config('constants.currency_precision')); ?>">
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(app('translator')->getFromJson('sale.add_sale')); ?></h1>
</section>
<!-- Main content -->
<section class="content no-print">
<?php if(is_null($default_location)): ?>
<div class="row">
	<div class="col-sm-3">
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon">
					<i class="fa fa-map-marker"></i>
				</span>
			<?php echo Form::select('select_location_id', $business_locations, null, ['class' => 'form-control input-sm', 
			'placeholder' => __('lang_v1.select_location'),
			'id' => 'select_location_id', 
			'required', 'autofocus'], $bl_attributes);; ?>

			<span class="input-group-addon">
					<?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.sale_location') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
				</span> 
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
<input type="hidden" id="item_addition_method" value="<?php echo e($business_details->item_addition_method); ?>">
	<?php echo Form::open(['url' => action('SellPosController@store'), 'method' => 'post', 'id' => 'add_sell_form' ]); ?>

	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="box box-solid">
				<?php echo Form::hidden('location_id', $default_location, ['id' => 'location_id', 'data-receipt_printer_type' => isset($bl_attributes[$default_location]['data-receipt_printer_type']) ? $bl_attributes[$default_location]['data-receipt_printer_type'] : 'browser']);; ?>


				<!-- /.box-header -->
				<div class="box-body">
					<?php if(!empty($price_groups)): ?>
						<?php if(count($price_groups) > 1): ?>
							<div class="col-sm-4">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-money"></i>
										</span>
										<?php
											reset($price_groups);
										?>
										<?php echo Form::hidden('hidden_price_group', key($price_groups), ['id' => 'hidden_price_group']); ?>

										<?php echo Form::select('price_group', $price_groups, null, ['class' => 'form-control select2', 'id' => 'price_group']);; ?>

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
							<?php
								reset($price_groups);
							?>
							<?php echo Form::hidden('price_group', key($price_groups), ['id' => 'price_group']); ?>

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
								value="<?php echo e($walk_in_customer['id']); ?>" >
								<input type="hidden" id="default_customer_name" 
								value="<?php echo e($walk_in_customer['name']); ?>" >
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
			              <?php echo Form::number('pay_term_number', $walk_in_customer['pay_term_number'], ['class' => 'form-control width-40 pull-left', 'placeholder' => __('contact.pay_term')]);; ?>


			              <?php echo Form::select('pay_term_type', 
			              	['months' => __('lang_v1.months'), 
			              		'days' => __('lang_v1.days')], 
			              		$walk_in_customer['pay_term_type'], 
			              	['class' => 'form-control width-60 pull-left','placeholder' => __('messages.please_select')]);; ?>

			            </div>
			          </div>
			        </div>

					<?php if(!empty($commission_agent)): ?>
					<div class="col-sm-3">
						<div class="form-group">
						<?php echo Form::label('commission_agent', __('lang_v1.commission_agent') . ':'); ?>

						<?php echo Form::select('commission_agent', 
									$commission_agent, null, ['class' => 'form-control select2']);; ?>

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
								<?php echo Form::text('transaction_date', $default_datetime, ['class' => 'form-control', 'readonly', 'required']);; ?>

							</div>
						</div>
					</div>
					<div class="<?php if(!empty($commission_agent)): ?> col-sm-3 <?php else: ?> col-sm-4 <?php endif; ?>">
						<div class="form-group">
							<?php echo Form::label('status', __('sale.status') . ':*'); ?>

							<?php echo Form::select('status', ['final' => __('sale.final'), 'draft' => __('sale.draft'), 'quotation' => __('lang_v1.quotation')], null, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'required']);; ?>

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
								'disabled' => is_null($default_location)? true : false,
								'autofocus' => is_null($default_location)? false : true,
								]);; ?>

							</div>
						</div>
					</div>

					<div class="row col-sm-12 pos_product_div" style="min-height: 0">

						<input type="hidden" name="sell_price_tax" id="sell_price_tax" value="<?php echo e($business_details->sell_price_tax); ?>">

						<!-- Keeps count of product rows -->
						<input type="hidden" id="product_row_count" 
							value="0">
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
									<th class="text-center"><i class="fa fa-close" aria-hidden="true"></i></th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
						</div>
						<div class="table-responsive">
						<table class="table table-condensed table-bordered table-striped">
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
				                <?php echo Form::select('discount_type', ['fixed' => __('lang_v1.fixed'), 'percentage' => __('lang_v1.percentage')], 'percentage' , ['class' => 'form-control','placeholder' => __('messages.please_select'), 'required', 'data-default' => 'percentage']);; ?>

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
				                <?php echo Form::text('discount_amount', number_format($business_details->default_sales_discount, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), ['class' => 'form-control input_number', 'data-default' => $business_details->default_sales_discount]);; ?>

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
				                <?php echo Form::select('tax_rate_id', $taxes['tax_rates'], $business_details->default_sales_tax, ['placeholder' => __('messages.please_select'), 'class' => 'form-control', 'data-default'=> $business_details->default_sales_tax], $taxes['attributes']);; ?>


								<input type="hidden" name="tax_calculation_amount" id="tax_calculation_amount" 
								value="<?php if(empty($edit)): ?> <?php echo e(number_format($business_details->tax_calculation_amount, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator'])); ?> <?php else: ?> <?php echo e(number_format(optional($transaction->tax)->amount, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator'])); ?> <?php endif; ?>" data-default="<?php echo e($business_details->tax_calculation_amount); ?>">
				            </div>
				        </div>
				    </div>
				    <div class="col-md-4 col-md-offset-4">
				    	<b><?php echo e(app('translator')->getFromJson( 'sale.order_tax' )); ?>:</b>(+) 
						<span class="display_currency" id="order_tax">0</span>
				    </div>
				    <div class="clearfix"></div>
					<div class="col-md-4">
						<div class="form-group">
				            <?php echo Form::label('shipping_details', __('sale.shipping_details')); ?>

				            <div class="input-group">
								<span class="input-group-addon">
				                    <i class="fa fa-info"></i>
				                </span>
				                <?php echo Form::textarea('shipping_details',null, ['class' => 'form-control','placeholder' => __('sale.shipping_details') ,'rows' => '1', 'cols'=>'30']);; ?>

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
							<?php echo Form::text('shipping_charges',number_format(0.00, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator']),['class'=>'form-control input_number','placeholder'=> __('sale.shipping_charges')]);; ?>

							</div>
						</div>
					</div>
					<div class="clearfix"></div>
				    <div class="col-md-4 col-md-offset-8">
				    	<div><b><?php echo e(app('translator')->getFromJson('sale.total_payable')); ?>: </b>
							<input type="hidden" name="final_total" id="final_total_input">
							<span id="total_payable">0</span>
						</div>
				    </div>
				    <div class="col-md-12">
				    	<div class="form-group">
							<?php echo Form::label('sell_note',__('sale.sell_note')); ?>

							<?php echo Form::textarea('sale_note', null, ['class' => 'form-control', 'rows' => 3]);; ?>

						</div>
				    </div>
				    <input type="hidden" name="is_direct_sale" value="1">
				</div>
			</div><!-- /.box -->

		</div>
	</div>
	<!--box end-->
	<div class="box box-solid" id="payment_rows_div"><!--box start-->
		<div class="box-header">
			<h3 class="box-title">
				<?php echo e(app('translator')->getFromJson('purchase.add_payment')); ?>
			</h3>
		</div>
		<div class="box-body payment_row">
			<?php echo $__env->make('sale_pos.partials.payment_row_form', ['row_index' => 0], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<hr>
			<div class="row">
				<div class="col-sm-12">
					<div class="pull-right"><strong><?php echo e(app('translator')->getFromJson('lang_v1.balance')); ?>:</strong> <span class="balance_due">0.00</span></div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-12">
					<button type="button" id="submit-sell" class="btn btn-primary pull-right btn-flat"><?php echo e(app('translator')->getFromJson('messages.submit')); ?></button>
				</div>
			</div>
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