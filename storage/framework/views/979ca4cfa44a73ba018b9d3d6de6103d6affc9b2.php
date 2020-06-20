<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-body bg-gray disabled" style="margin-bottom: 0px !important">
				<table class="table table-condensed" 
					style="margin-bottom: 0px !important">
					<tbody>
					<tr>
						<td>
							<div class="col-sm-1 col-xs-3 d-inline-table">
								<b><?php echo e(app('translator')->getFromJson('sale.item')); ?>:</b> 
								<br/>
								<span class="total_quantity">0</span>
							</div>

							<div class="col-sm-2 col-xs-3 d-inline-table">
								<b><?php echo e(app('translator')->getFromJson('sale.total')); ?>:</b> 
								<br/>
								<span class="price_total">0</span>
							</div>

							<div class="col-sm-2 col-xs-6 d-inline-table">

								<span class="<?php if($pos_settings['disable_discount'] != 0): ?> hide <?php endif; ?>">

								<b><?php echo e(app('translator')->getFromJson('sale.discount')); ?>(-): <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.sale_discount') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></b> 
								<br/>
								<i class="fa fa-pencil-square-o cursor-pointer" id="pos-edit-discount" title="<?php echo e(app('translator')->getFromJson('sale.edit_discount')); ?>" aria-hidden="true" data-toggle="modal" data-target="#posEditDiscountModal"></i>
								<span id="total_discount">0</span>
								<input type="hidden" name="discount_type" id="discount_type" value="<?php if(empty($edit)): ?><?php echo e('percentage'); ?><?php else: ?><?php echo e($transaction->discount_type); ?><?php endif; ?>" data-default="percentage">

								<input type="hidden" name="discount_amount" id="discount_amount" value="<?php if(empty($edit)): ?> <?php echo e(number_format($business_details->default_sales_discount, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator'])); ?> <?php else: ?> <?php echo e(number_format($transaction->discount_amount, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator'])); ?> <?php endif; ?>" data-default="<?php echo e($business_details->default_sales_discount); ?>">

								</span>
							</div>

							<div class="col-sm-2 col-xs-6 d-inline-table">

								<span class="<?php if($pos_settings['disable_order_tax'] != 0): ?> hide <?php endif; ?>">

								<b><?php echo e(app('translator')->getFromJson('sale.order_tax')); ?>(+): <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.sale_tax') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></b>
								<br/>
								<i class="fa fa-pencil-square-o cursor-pointer" title="<?php echo e(app('translator')->getFromJson('sale.edit_order_tax')); ?>" aria-hidden="true" data-toggle="modal" data-target="#posEditOrderTaxModal" id="pos-edit-tax" ></i> 
								<span id="order_tax">
									<?php if(empty($edit)): ?>
										0
									<?php else: ?>
										<?php echo e($transaction->tax_amount); ?>

									<?php endif; ?>
								</span>

								<input type="hidden" name="tax_rate_id" 
									id="tax_rate_id" 
									value="<?php if(empty($edit)): ?> <?php echo e($business_details->default_sales_tax); ?> <?php else: ?> <?php echo e($transaction->tax_id); ?> <?php endif; ?>" 
									data-default="<?php echo e($business_details->default_sales_tax); ?>">

								<input type="hidden" name="tax_calculation_amount" id="tax_calculation_amount" 
									value="<?php if(empty($edit)): ?> <?php echo e(number_format($business_details->tax_calculation_amount, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator'])); ?> <?php else: ?> <?php echo e(number_format(optional($transaction->tax)->amount, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator'])); ?> <?php endif; ?>" data-default="<?php echo e($business_details->tax_calculation_amount); ?>">

								</span>
							</div>
							
							<!-- shipping -->
							<div class="col-sm-2 col-xs-6 d-inline-table">

								<span class="<?php if($pos_settings['disable_discount'] != 0): ?> hide <?php endif; ?>">

								<b><?php echo e(app('translator')->getFromJson('sale.shipping')); ?>(+): <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.shipping') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></b> 
								<br/>
								<i class="fa fa-pencil-square-o cursor-pointer"  title="<?php echo e(app('translator')->getFromJson('sale.shipping')); ?>" aria-hidden="true" data-toggle="modal" data-target="#posShippingModal"></i>
								<span id="shipping_charges_amount">0</span>
								<input type="hidden" name="shipping_details" id="shipping_details" value="<?php if(empty($edit)): ?><?php echo e(""); ?><?php else: ?><?php echo e($transaction->shipping_details); ?><?php endif; ?>" data-default="">

								<input type="hidden" name="shipping_charges" id="shipping_charges" value="<?php if(empty($edit)): ?><?php echo e(number_format(0.00, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator'])); ?> <?php else: ?><?php echo e(number_format($transaction->shipping_charges, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator'])); ?> <?php endif; ?>" data-default="0.00">

								</span>
							</div>

							
							<div class="col-sm-3 col-xs-12 d-inline-table">
								<b><?php echo e(app('translator')->getFromJson('sale.total_payable')); ?>:</b>
								<br/>
								<input type="hidden" name="final_total" 
									id="final_total_input" value=0>
								<span id="total_payable" class="text-success lead text-bold">0</span>
								<?php if(empty($edit)): ?>
									<button type="button" class="btn btn-danger btn-flat btn-xs pull-right" id="pos-cancel"><?php echo e(app('translator')->getFromJson('sale.cancel')); ?></button>
								<?php else: ?>
									<button type="button" class="btn btn-danger btn-flat hide btn-xs pull-right" id="pos-delete"><?php echo e(app('translator')->getFromJson('messages.delete')); ?></button>
								<?php endif; ?>
							</div>
						</td>
					</tr>

					<tr>
						<td>
							<div class="col-sm-2 col-xs-6 col-2px-padding">

								<button type="button" 
									class="btn btn-warning btn-block btn-flat <?php if($pos_settings['disable_draft'] != 0): ?> hide <?php endif; ?>" 
									id="pos-draft"><?php echo e(app('translator')->getFromJson('sale.draft')); ?></button>

								<button type="button" 
									class="btn btn-info btn-block btn-flat" 
									id="pos-quotation"><?php echo e(app('translator')->getFromJson('lang_v1.quotation')); ?></button>
							</div>
							<div class="col-sm-3 col-xs-6 col-2px-padding">
								<button type="button" 
								class="btn bg-maroon btn-block btn-flat no-print <?php if(!empty($pos_settings['disable_suspend'])): ?> pos-express-btn btn-lg <?php endif; ?> pos-express-finalize" 
								data-pay_method="card"
								title="<?php echo e(app('translator')->getFromJson('lang_v1.tooltip_express_checkout_card')); ?>" >
								<div class="text-center">
									<i class="fa fa-check" aria-hidden="true"></i>
    								<b><?php echo e(app('translator')->getFromJson('lang_v1.express_checkout_card')); ?></b>
    							</div>
								</button>
								<?php if(empty($pos_settings['disable_suspend'])): ?>
									<button type="button" 
									class="btn bg-red btn-block btn-flat no-print pos-express-finalize" 
									data-pay_method="suspend"
									title="<?php echo e(app('translator')->getFromJson('lang_v1.tooltip_suspend')); ?>" >
									<div class="text-center">
										<i class="fa fa-pause" aria-hidden="true"></i>
	    								<b><?php echo e(app('translator')->getFromJson('lang_v1.suspend')); ?></b>
	    							</div>
									</button>
								<?php endif; ?>
							</div>
							<div class="col-sm-4 col-xs-12 col-2px-padding">
								<button type="button" class="btn bg-navy  btn-block btn-flat btn-lg no-print <?php if($pos_settings['disable_pay_checkout'] != 0): ?> hide <?php endif; ?> pos-express-btn" id="pos-finalize" title="<?php echo e(app('translator')->getFromJson('lang_v1.tooltip_checkout_multi_pay')); ?>">
								<div class="text-center">
									<i class="fa fa-check" aria-hidden="true"></i>
    								<b><?php echo e(app('translator')->getFromJson('lang_v1.checkout_multi_pay')); ?></b>
    							</div>
								</button>
							</div>
							<div class="col-sm-3 col-xs-12 col-2px-padding">
								<button type="button" class="btn btn-success btn-block btn-flat btn-lg no-print <?php if($pos_settings['disable_express_checkout'] != 0): ?> hide <?php endif; ?> pos-express-btn pos-express-finalize"
								data-pay_method="cash"
								title="<?php echo e(app('translator')->getFromJson('tooltip.express_checkout')); ?>">
								<div class="text-center">
									<i class="fa fa-check" aria-hidden="true"></i>
    								<b><?php echo e(app('translator')->getFromJson('lang_v1.express_checkout_cash')); ?></b>
    							</div>
								</button>
							</div>

							<div class="div-overlay pos-processing"></div>
						</td>
					</tr>

					</tbody>
				</table>

				<!-- Button to perform various actions -->
				<div class="row">
					
				</div>
			</div>
		</div>
	</div>
</div>

<?php if(isset($transaction)): ?>
	<?php echo $__env->make('sale_pos.partials.edit_discount_modal', ['sales_discount' => $transaction->discount_amount, 'discount_type' => $transaction->discount_type], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php else: ?>
	<?php echo $__env->make('sale_pos.partials.edit_discount_modal', ['sales_discount' => $business_details->default_sales_discount, 'discount_type' => 'percentage'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>

<?php if(isset($transaction)): ?>
	<?php echo $__env->make('sale_pos.partials.edit_order_tax_modal', ['selected_tax' => $transaction->tax_id], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php else: ?>
	<?php echo $__env->make('sale_pos.partials.edit_order_tax_modal', ['selected_tax' => $business_details->default_sales_tax], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>

<?php if(isset($transaction)): ?>
	<?php echo $__env->make('sale_pos.partials.edit_shipping_modal', ['shipping_charges' => $transaction->shipping_charges, 'shipping_details' => $transaction->shipping_details], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php else: ?>
	<?php echo $__env->make('sale_pos.partials.edit_shipping_modal', ['shipping_charges' => '0.00', 'shipping_details' => ''], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>