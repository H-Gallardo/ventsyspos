<?php $__env->startSection('title', __('purchase.add_purchase')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(app('translator')->getFromJson('purchase.add_purchase')); ?> <i class="fa fa-keyboard-o hover-q text-muted" aria-hidden="true" data-container="body" data-toggle="popover" data-placement="bottom" data-content="<?php echo $__env->make('purchase.partials.keyboard_shortcuts_details', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>" data-html="true" data-trigger="hover" data-original-title="" title=""></i></h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">

	<!-- Page level currency setting -->
	<input type="hidden" id="p_code" value="<?php echo e($currency_details->code); ?>">
	<input type="hidden" id="p_symbol" value="<?php echo e($currency_details->symbol); ?>">
	<input type="hidden" id="p_thousand" value="<?php echo e($currency_details->thousand_separator); ?>">
	<input type="hidden" id="p_decimal" value="<?php echo e($currency_details->decimal_separator); ?>">

	<?php echo $__env->make('layouts.partials.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<?php echo Form::open(['url' => action('PurchaseController@store'), 'method' => 'post', 'id' => 'add_purchase_form', 'files' => true ]); ?>


	<div class="box box-solid">
		<div class="box-body">
			<div class="row">
				<div class="<?php if(!empty($default_purchase_status)): ?> col-sm-4 <?php else: ?> col-sm-3 <?php endif; ?>">
					<div class="form-group">
						<?php echo Form::label('supplier_id', __('purchase.supplier') . ':*'); ?>

						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-user"></i>
							</span>
							<?php echo Form::select('contact_id', [], null, ['class' => 'form-control', 'placeholder' => __('messages.please_select'), 'required', 'id' => 'supplier_id']);; ?>

							<span class="input-group-btn">
								<button type="button" class="btn btn-default bg-white btn-flat add_new_supplier" data-name=""><i class="fa fa-plus-circle text-primary fa-lg"></i></button>
							</span>
						</div>
					</div>
				</div>
				<div class="<?php if(!empty($default_purchase_status)): ?> col-sm-4 <?php else: ?> col-sm-3 <?php endif; ?>">
					<div class="form-group">
						<?php echo Form::label('ref_no', __('purchase.ref_no').':'); ?>

						<?php echo Form::text('ref_no', null, ['class' => 'form-control']);; ?>

					</div>
				</div>
				<div class="<?php if(!empty($default_purchase_status)): ?> col-sm-4 <?php else: ?> col-sm-3 <?php endif; ?>">
					<div class="form-group">
						<?php echo Form::label('transaction_date', __('purchase.purchase_date') . ':*'); ?>

						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</span>
							<?php echo Form::text('transaction_date', \Carbon::createFromTimestamp(strtotime('now'))->format(session('business.date_format')), ['class' => 'form-control', 'readonly', 'required']);; ?>

						</div>
					</div>
				</div>
				<div class="col-sm-3 <?php if(!empty($default_purchase_status)): ?> hide <?php endif; ?>">
					<div class="form-group">
						<?php echo Form::label('status', __('purchase.purchase_status') . ':*'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.order_status') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
						<?php echo Form::select('status', $orderStatuses, $default_purchase_status, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'required']);; ?>

					</div>
				</div>

				<div class="clearfix"></div>
				
				<?php if(count($business_locations) == 1): ?>
					<?php 
						$default_location = current(array_keys($business_locations->toArray())) 
					?>
				<?php else: ?>
					<?php $default_location = null; ?>
				<?php endif; ?>
				<div class="col-sm-3">
					<div class="form-group">
						<?php echo Form::label('location_id', __('purchase.business_location').':*'); ?>

						<?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.purchase_location') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
						<?php echo Form::select('location_id', $business_locations, $default_location, ['class' => 'form-control select2', 'placeholder' => __('messages.please_select'), 'required']);; ?>

					</div>
				</div>

				<!-- Currency Exchange Rate -->
				<div class="col-sm-3 <?php if(!$currency_details->purchase_in_diff_currency): ?> hide <?php endif; ?>">
					<div class="form-group">
						<?php echo Form::label('exchange_rate', __('purchase.p_exchange_rate') . ':*'); ?>

						<?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.currency_exchange_factor') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-info"></i>
							</span>
							<?php echo Form::number('exchange_rate', $currency_details->p_exchange_rate, ['class' => 'form-control', 'required', 'step' => 0.001]);; ?>

						</div>
						<span class="help-block text-danger">
							<?php echo e(app('translator')->getFromJson('purchase.diff_purchase_currency_help', ['currency' => $currency_details->name])); ?>
						</span>
					</div>
				</div>

				<div class="col-sm-3">
                    <div class="form-group">
                        <?php echo Form::label('document', __('purchase.attach_document') . ':'); ?>

                        <?php echo Form::file('document', ['id' => 'upload_document']);; ?>

                        <p class="help-block"><?php echo e(app('translator')->getFromJson('purchase.max_file_size', ['size' => (config('constants.document_size_limit') / 1000000)])); ?></p>
                    </div>
                </div>

			</div>
		</div>
	</div> <!--box end-->
	<div class="box box-solid"><!--box start-->
		<div class="box-body">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-search"></i>
							</span>
							<?php echo Form::text('search_product', null, ['class' => 'form-control mousetrap', 'id' => 'search_product', 'placeholder' => __('lang_v1.search_product_placeholder'), 'autofocus']);; ?>

						</div>
					</div>
				</div>
				<div class="col-sm-2">
					<div class="form-group">
						<button tabindex="-1" type="button" class="btn btn-link btn-modal"data-href="<?php echo e(action('ProductController@quickAdd')); ?>" 
                	data-container=".quick_add_product_modal"><i class="fa fa-plus"></i> <?php echo e(app('translator')->getFromJson( 'product.add_new_product' )); ?> </button>
					</div>
				</div>
			</div>
			<?php
				$hide_tax = '';
				if( session()->get('business.enable_inline_tax') == 0){
					$hide_tax = 'hide';
				}
			?>
			<div class="row">
				<div class="col-sm-12">
					<div class="table-responsive">
						<table class="table table-condensed table-bordered table-th-green text-center table-striped" id="purchase_entry_table">
							<thead>
								<tr>
									<th>#</th>
									<th><?php echo e(app('translator')->getFromJson( 'product.product_name' )); ?></th>
									<th><?php echo e(app('translator')->getFromJson( 'purchase.purchase_quantity' )); ?></th>
									<th><?php echo e(app('translator')->getFromJson( 'lang_v1.unit_cost_before_discount' )); ?></th>
									<th><?php echo e(app('translator')->getFromJson( 'lang_v1.discount_percent' )); ?></th>
									<th><?php echo e(app('translator')->getFromJson( 'purchase.unit_cost_before_tax' )); ?></th>
									<th class="<?php echo e($hide_tax); ?>"><?php echo e(app('translator')->getFromJson( 'purchase.subtotal_before_tax' )); ?></th>
									<th class="<?php echo e($hide_tax); ?>"><?php echo e(app('translator')->getFromJson( 'purchase.product_tax' )); ?></th>
									<th class="<?php echo e($hide_tax); ?>"><?php echo e(app('translator')->getFromJson( 'purchase.net_cost' )); ?></th>
									<th><?php echo e(app('translator')->getFromJson( 'purchase.line_total' )); ?></th>
									<th class="<?php if(!session('business.enable_editing_product_from_purchase')): ?> hide <?php endif; ?>">
										<?php echo e(app('translator')->getFromJson( 'lang_v1.profit_margin' )); ?>
									</th>
									<th>
										<?php echo e(app('translator')->getFromJson( 'purchase.unit_selling_price' )); ?>
									</th>
									<?php if(session('business.enable_lot_number')): ?>
										<th>
											<?php echo e(app('translator')->getFromJson('lang_v1.lot_number')); ?>
										</th>
									<?php endif; ?>
									<?php if(session('business.enable_product_expiry')): ?>
										<th>
											<?php echo e(app('translator')->getFromJson('product.mfg_date')); ?> / <?php echo e(app('translator')->getFromJson('product.exp_date')); ?>
										</th>
									<?php endif; ?>
									<th><i class="fa fa-trash" aria-hidden="true"></i></th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
					<hr/>
					<div class="pull-right col-md-5">
						<table class="pull-right col-md-12">
							<tr class="hide">
								<th class="col-md-7 text-right"><?php echo e(app('translator')->getFromJson( 'purchase.total_before_tax' )); ?>:</th>
								<td class="col-md-5 text-left">
									<span id="total_st_before_tax" class="display_currency"></span>
									<input type="hidden" id="st_before_tax_input" value=0>
								</td>
							</tr>
							<tr>
								<th class="col-md-7 text-right"><?php echo e(app('translator')->getFromJson( 'purchase.net_total_amount' )); ?>:</th>
								<td class="col-md-5 text-left">
									<span id="total_subtotal" class="display_currency"></span>
									<!-- This is total before purchase tax-->
									<input type="hidden" id="total_subtotal_input" value=0  name="total_before_tax">
								</td>
							</tr>
						</table>
					</div>

					<input type="hidden" id="row_count" value="0">
				</div>
			</div>
		</div>
	</div><!--box end-->
	<div class="box box-solid"><!--box start-->
		<div class="box-body">
			<div class="row">
				<div class="col-sm-12">
				<table class="table">
					<tr>
						<td class="col-md-3">
							<div class="form-group">
								<?php echo Form::label('discount_type', __( 'purchase.discount_type' ) . ':'); ?>

								<?php echo Form::select('discount_type', [ '' => __('lang_v1.none'), 'fixed' => __( 'lang_v1.fixed' ), 'percentage' => __( 'lang_v1.percentage' )], '', ['class' => 'form-control select2']);; ?>

							</div>
						</td>
						<td class="col-md-3">
							<div class="form-group">
							<?php echo Form::label('discount_amount', __( 'purchase.discount_amount' ) . ':'); ?>

							<?php echo Form::text('discount_amount', 0, ['class' => 'form-control input_number', 'required']);; ?>

							</div>
						</td>
						<td class="col-md-3">
							&nbsp;
						</td>
						<td class="col-md-3">
							<b><?php echo e(app('translator')->getFromJson( 'purchase.discount' )); ?>:</b>(-) 
							<span id="discount_calculated_amount" class="display_currency">0</span>
						</td>
					</tr>
					<tr>
						<td>
							<div class="form-group">
							<?php echo Form::label('tax_id', __('purchase.purchase_tax') . ':'); ?>

							<select name="tax_id" id="tax_id" class="form-control select2" placeholder="'Please Select'">
								<option value="" data-tax_amount="0" data-tax_type="fixed" selected><?php echo e(app('translator')->getFromJson('lang_v1.none')); ?></option>
								<?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($tax->id); ?>" data-tax_amount="<?php echo e($tax->amount); ?>" data-tax_type="<?php echo e($tax->calculation_type); ?>"><?php echo e($tax->name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
							<?php echo Form::hidden('tax_amount', 0, ['id' => 'tax_amount']);; ?>

							</div>
						</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>
							<b><?php echo e(app('translator')->getFromJson( 'purchase.purchase_tax' )); ?>:</b>(+) 
							<span id="tax_calculated_amount" class="display_currency">0</span>
						</td>
					</tr>

					<tr>
						<td>
							<div class="form-group">
							<?php echo Form::label('shipping_details', __( 'purchase.shipping_details' ) . ':'); ?>

							<?php echo Form::text('shipping_details', null, ['class' => 'form-control']);; ?>

							</div>
						</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>
							<div class="form-group">
							<?php echo Form::label('shipping_charges','(+) ' . __( 'purchase.additional_shipping_charges' ) . ':'); ?>

							<?php echo Form::text('shipping_charges', 0, ['class' => 'form-control input_number', 'required']);; ?>

							</div>
						</td>
					</tr>

					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>
							<?php echo Form::hidden('final_total', 0 , ['id' => 'grand_total_hidden']);; ?>

							<b><?php echo e(app('translator')->getFromJson('purchase.purchase_total')); ?>: </b><span id="grand_total" class="display_currency" data-currency_symbol='true'>0</span>
						</td>
					</tr>
					<tr>
						<td colspan="4">
							<div class="form-group">
								<?php echo Form::label('additional_notes',__('purchase.additional_notes')); ?>

								<?php echo Form::textarea('additional_notes', null, ['class' => 'form-control', 'rows' => 3]);; ?>

							</div>
						</td>
					</tr>

				</table>
				</div>
		</div>
	</div>
	</div>
	<!--box end-->
	<div class="box box-solid"><!--box start-->
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
					<div class="pull-right"><strong><?php echo e(app('translator')->getFromJson('purchase.payment_due')); ?>:</strong> <span id="payment_due">0.00</span></div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-12">
					<button type="button" id="submit_purchase_form" class="btn btn-primary pull-right btn-flat"><?php echo e(app('translator')->getFromJson('messages.save')); ?></button>
				</div>
			</div>
		</div>
	</div>
<?php echo Form::close(); ?>

</section>
<!-- quick product modal -->
<div class="modal fade quick_add_product_modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle"></div>
<div class="modal fade contact_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
	<?php echo $__env->make('contact.create', ['quick_add' => true], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<!-- /.content -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
	<script src="<?php echo e(asset('js/purchase.js?v=' . $asset_v)); ?>"></script>
	<script src="<?php echo e(asset('js/product.js?v=' . $asset_v)); ?>"></script>
	<?php echo $__env->make('purchase.partials.keyboard_shortcuts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>