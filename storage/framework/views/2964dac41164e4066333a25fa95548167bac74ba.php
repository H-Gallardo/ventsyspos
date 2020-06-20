<?php $__env->startSection('title', __('lang_v1.sell_return')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header no-print">
    <h1><?php echo app('translator')->getFromJson('lang_v1.sell_return'); ?></h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content no-print">

	<?php echo $__env->make('layouts.partials.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<?php if(count($business_locations) == 1): ?>
		<?php 
			$default_location = current(array_keys($business_locations->toArray())) 
		?>
	<?php else: ?>
		<?php $default_location = null; ?>
	<?php endif; ?>
	<div class="row">
		<div class="col-sm-3">
			<div class="form-group">
				<?php echo Form::label('location_id', __('purchase.business_location').':*'); ?>

				<?php echo Form::select('location_id', $business_locations, $default_location, ['class' => 'form-control', 'placeholder' => __('messages.please_select'), 'required', 
				'id' => 'select_location_id']);; ?>

			</div>
		</div>
	</div>
	<input type="hidden" id="product_row_count" value="0">
	
	<?php echo Form::open(['url' => action('SellReturnController@store'), 'method' => 'post', 'id' => 'sell_return_form' ]); ?>

	
	<div class="box box-solid">
		<div class="box-body">
			<div class="row">
				<?php echo Form::hidden('location_id', $default_location, ['id' => 'location_id']);; ?>


				<div class="col-sm-3">
					<div class="form-group">
						<?php echo Form::label('contact_id', __('contact.customer') . ':*'); ?>

						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-user"></i>
							</span>
							<?php echo Form::select('contact_id', [], null, ['class' => 'form-control', 'id' => 'customer_id', 'placeholder' => 'Enter Customer name / phone', 'required']);; ?>

						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						<?php echo Form::label('invoice_no', __('purchase.ref_no').':'); ?>

						<?php echo Form::text('invoice_no', null, ['class' => 'form-control']);; ?>

					</div>
				</div>

				<div class="col-sm-3">
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
							<?php echo Form::text('search_product', null, ['class' => 'form-control', 'id' => 'search_product', 
								'placeholder' => __('lang_v1.search_product_placeholder'),
								'disabled' => is_null($default_location)? true : false,
								'autofocus' => is_null($default_location)? false : true,
								]);; ?>

						</div>
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
									<th class="text-center">	
										<?php echo app('translator')->getFromJson('sale.product'); ?>
									</th>
									<th class="text-center">
										<?php echo app('translator')->getFromJson('sale.qty'); ?>
									</th>
									<th class="text-center">
										<?php echo app('translator')->getFromJson('sale.unit_price'); ?>
									</th>
									<th class="text-center <?php echo e($hide_tax); ?>">
										<?php echo app('translator')->getFromJson('sale.tax'); ?>
									</th>
									<th class="text-center <?php echo e($hide_tax); ?>">
										<?php echo app('translator')->getFromJson('sale.price_inc_tax'); ?>
									</th>
									<th class="text-center">
										<?php echo app('translator')->getFromJson('sale.subtotal'); ?>
									</th>

									<?php if(session('business.enable_lot_number')): ?>
										<th class="text-center">
											<?php echo app('translator')->getFromJson('lang_v1.lot_number'); ?>
										</th>
									<?php endif; ?>

									<?php if(session('business.enable_product_expiry')): ?>
										<th class="text-center">
											<?php echo app('translator')->getFromJson('product.exp_date'); ?>
										</th>
									<?php endif; ?>

									<th class="text-center"><i class="fa fa-trash" aria-hidden="true"></i></th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
					<hr/>
					<div class="pull-right col-md-5">
						<table class="pull-right col-md-12">
							<tr class="hide">
								<th class="col-md-7 text-right"><?php echo app('translator')->getFromJson( 'purchase.total_before_tax' ); ?>:</th>
								<td class="col-md-5 text-left">
									<span id="total_st_before_tax" class="display_currency"></span>
									<input type="hidden" id="st_before_tax_input" value=0>
								</td>
							</tr>
							<tr>
								<th class="col-md-7 text-right"><?php echo app('translator')->getFromJson( 'purchase.net_total_amount' ); ?>:</th>
								<td class="col-md-5 text-left">
									<span id="price_total" class="display_currency"></span>
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

								<?php echo Form::select('discount_type', [ '' => __('lang_v1.none'), 'fixed' => __( 'lang_v1.fixed' ), 'percentage' => __( 'lang_v1.percentage' )], '', ['class' => 'form-control']);; ?>

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
							<b><?php echo app('translator')->getFromJson( 'purchase.discount' ); ?>:</b>(-) 
							<span id="total_discount" class="display_currency">0</span>
						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>
							<?php echo Form::hidden('final_total', 0 , ['id' => 'final_total_input']);; ?>

							<b><?php echo app('translator')->getFromJson('lang_v1.total_credit_amt'); ?>: </b><span id="total_payable" class="display_currency" data-currency_symbol='true'>0</span>
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

		<div class="row">
		<div class="col-sm-12">
			<button type="button" id="submit_sell_return_form" class="btn btn-primary pull-right btn-flat"><?php echo app('translator')->getFromJson('messages.save'); ?></button>
		</div>
		</div>

	</div><!--box end-->
<?php echo Form::close(); ?>

</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
	<script src="<?php echo e(asset('js/sell_return.js?v=' . $asset_v)); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>