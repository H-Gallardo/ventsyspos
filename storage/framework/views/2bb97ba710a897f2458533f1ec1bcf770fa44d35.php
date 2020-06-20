<?php $__env->startSection('title', 'POS'); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<!-- <section class="content-header">
    <h1>Add Purchase</h1> -->
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
<!-- </section> -->
<input type="hidden" id="__precision" value="<?php echo e(config('constants.currency_precision')); ?>">

<!-- Main content -->
<section class="content no-print">
	<div class="row">
		<div class="<?php if(!empty($pos_settings['hide_product_suggestion']) && !empty($pos_settings['hide_recent_trans'])): ?> col-md-10 col-md-offset-1 <?php else: ?> col-md-7 <?php endif; ?> col-sm-12">
			<div class="box box-success">

				<div class="box-header with-border">
					<h3 class="box-title">
						Editing 
						<?php if($transaction->status == 'draft' && $transaction->is_quotation == 1): ?> 
							<?php echo e(app('translator')->getFromJson('lang_v1.quotation')); ?>
						<?php elseif($transaction->status == 'draft'): ?> 
							Draft 
						<?php elseif($transaction->status == 'final'): ?> 
							Invoice 
						<?php endif; ?> 
					<span class="text-success">#<?php echo e($transaction->invoice_no); ?></span> <i class="fa fa-keyboard-o hover-q text-muted" aria-hidden="true" data-container="body" data-toggle="popover" data-placement="bottom" data-content="<?php echo $__env->make('sale_pos.partials.keyboard_shortcuts_details', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>" data-html="true" data-trigger="hover" data-original-title="" title=""></i></h3>
					<div class="pull-right box-tools">
                <a class="btn btn-success btn-sm" href="<?php echo e(action('SellPosController@create')); ?>">
                  <strong><i class="fa fa-plus"></i> POS</strong></a>
              </div>
				</div>
				<input type="hidden" id="item_addition_method" value="<?php echo e($business_details->item_addition_method); ?>">
				<?php echo Form::open(['url' => action('SellPosController@update', [$transaction->id]), 'method' => 'post', 'id' => 'edit_pos_sell_form' ]); ?>


				<?php echo e(method_field('PUT')); ?>


				<?php echo Form::hidden('location_id', $transaction->location_id, ['id' => 'location_id', 'data-receipt_printer_type' => !empty($location_printer_type) ? $location_printer_type : 'browser']);; ?>


				<!-- /.box-header -->
				<div class="box-body">
					<div class="row">
						<?php if(config('constants.enable_sell_in_diff_currency') == true): ?>
							<div class="col-md-4 col-sm-6">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-exchange"></i>
										</span>
										<?php echo Form::text('exchange_rate', number_format($transaction->exchange_rate, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), ['class' => 'form-control input-sm input_number', 'placeholder' => __('lang_v1.currency_exchange_rate'), 'id' => 'exchange_rate']);; ?>

									</div>
								</div>
							</div>
						<?php endif; ?>
						<?php if(!empty($price_groups)): ?>
							<?php if(count($price_groups) > 1): ?>
								<div class="col-md-4 col-sm-6">
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-money"></i>
											</span>
											<?php echo Form::hidden('hidden_price_group', $transaction->selling_price_group_id, ['id' => 'hidden_price_group']); ?>

											<?php echo Form::select('price_group', $price_groups, $transaction->selling_price_group_id, ['class' => 'form-control select2', 'id' => 'price_group', 'style' => 'width: 100%;']);; ?>

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
							<?php else: ?>
								<?php echo Form::hidden('price_group', $transaction->selling_price_group_id, ['id' => 'price_group']); ?>

							<?php endif; ?>
						<?php endif; ?>
					</div>
					<div class="row">
						<div class="<?php if(!empty($commission_agent)): ?> col-sm-4 <?php else: ?> col-sm-6 <?php endif; ?>">
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-user"></i>
									</span>
									<input type="hidden" id="default_customer_id" 
									value="<?php echo e($transaction->contact->id); ?>" >
									<input type="hidden" id="default_customer_name" 
									value="<?php echo e($transaction->contact->name); ?>" >
									<?php echo Form::select('contact_id', 
										[], null, ['class' => 'form-control mousetrap', 'id' => 'customer_id', 'placeholder' => 'Enter Customer name / phone', 'required', 'style' => 'width: 100%;']);; ?>

									<span class="input-group-btn">
										<button type="button" class="btn btn-default bg-white btn-flat add_new_customer" data-name=""><i class="fa fa-plus-circle text-primary fa-lg"></i></button>
									</span>
								</div>
							</div>
						</div>

						<input type="hidden" name="pay_term_number" id="pay_term_number" value="<?php echo e($transaction->pay_term_number); ?>">
						<input type="hidden" name="pay_term_type" id="pay_term_type" value="<?php echo e($transaction->pay_term_type); ?>">

						<?php if(!empty($commission_agent)): ?>
						<div class="col-sm-4">
							<div class="form-group">
							<?php echo Form::select('commission_agent', 
										$commission_agent, $transaction->commission_agent, ['class' => 'form-control select2', 'placeholder' => __('lang_v1.commission_agent')]);; ?>

							</div>
						</div>
						<?php endif; ?>
						<div class="<?php if(!empty($commission_agent)): ?> col-sm-4 <?php else: ?> col-sm-6 <?php endif; ?>">
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-barcode"></i>
									</span>
									<?php echo Form::text('search_product', null, ['class' => 'form-control mousetrap', 'id' => 'search_product', 'placeholder' => __('lang_v1.search_product_placeholder'), 'autofocus']);; ?>

									<span class="input-group-btn">
										<button type="button" class="btn btn-default bg-white btn-flat pos_add_quick_product" data-href="<?php echo e(action('ProductController@quickAdd')); ?>" data-container=".quick_add_product_modal"><i class="fa fa-plus-circle text-primary fa-lg"></i></button>
									</span>
								</div>
							</div>
						</div>

						<!-- Call restaurant module if defined -->
				        <?php if(in_array('tables' ,$enabled_modules) || in_array('service_staff' ,$enabled_modules)): ?>
				        	<span id="restaurant_module_span" 
				        		data-transaction_id="<?php echo e($transaction->id); ?>">
				          		<div class="col-md-3"></div>
				        	</span>
				        <?php endif; ?>
				     </div>
					<div class="row col-sm-12 pos_product_div">

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
						<table class="table table-condensed table-bordered table-striped table-responsive" id="pos_table">
							<thead>
								<tr>
									<th class="text-center col-md-4">	
										<?php echo e(app('translator')->getFromJson('sale.product')); ?>
									</th>
									<th class="text-center col-md-3">
										<?php echo e(app('translator')->getFromJson('sale.qty')); ?>
									</th>
									<th class="text-center col-md-2 <?php echo e($hide_tax); ?>">
										<?php echo e(app('translator')->getFromJson('sale.price_inc_tax')); ?>
									</th>
									<th class="text-center col-md-3">
										<?php echo e(app('translator')->getFromJson('sale.subtotal')); ?>
									</th>
									<th class="text-center"><i class="fa fa-close" aria-hidden="true"></i></th>
								</tr>
							</thead>
							<tbody>
								<?php $__currentLoopData = $sell_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sell_line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php echo $__env->make('sale_pos.product_row', ['product' => $sell_line, 'row_count' => $loop->index, 'tax_dropdown' => $taxes], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</tbody>
						</table>
					</div>
					<?php echo $__env->make('sale_pos.partials.pos_details', ['edit' => true], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

					<?php echo $__env->make('sale_pos.partials.payment_modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

					<?php if(empty($pos_settings['disable_suspend'])): ?>
						<?php echo $__env->make('sale_pos.partials.suspend_note_modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<?php endif; ?>
				</div>
				<!-- /.box-body -->
				<?php echo Form::close(); ?>

			</div>
			<!-- /.box -->
		</div>

		<div class="col-md-5 col-sm-12">
			<?php echo $__env->make('sale_pos.partials.right_div', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
	</div>
</section>

<!-- This will be printed -->
<section class="invoice print_section" id="receipt_section">
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
<!-- quick product modal -->
<div class="modal fade quick_add_product_modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle"></div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
	<script src="<?php echo e(asset('js/pos.js?v=' . $asset_v)); ?>"></script>
	<script src="<?php echo e(asset('js/printer.js?v=' . $asset_v)); ?>"></script>
	<script src="<?php echo e(asset('js/product.js?v=' . $asset_v)); ?>"></script>
	<script src="<?php echo e(asset('js/opening_stock.js?v=' . $asset_v)); ?>"></script>
	<?php echo $__env->make('sale_pos.partials.keyboard_shortcuts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<!-- Call restaurant module if defined -->
    <?php if(in_array('tables' ,$enabled_modules) || in_array('modifiers' ,$enabled_modules) || in_array('service_staff' ,$enabled_modules)): ?>
    	<script src="<?php echo e(asset('js/restaurant.js?v=' . $asset_v)); ?>"></script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
	<style type="text/css">
		/*CSS to print receipts*/
		.print_section{
		    display: none;
		}
		@media  print{
		    .print_section{
		        display: block !important;
		    }
		}
		@page  {
		    size: 3.1in auto;/* width height */
		    height: auto !important;
		    margin-top: 0mm;
		    margin-bottom: 0mm;
		}
	</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>