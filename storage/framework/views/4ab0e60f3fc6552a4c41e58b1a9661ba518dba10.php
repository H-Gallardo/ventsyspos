<?php $__env->startSection('title', __('lang_v1.add_selling_price_group_prices')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(app('translator')->getFromJson('lang_v1.add_selling_price_group_prices')); ?></h1>
</section>

<!-- Main content -->
<section class="content">
	<?php echo Form::open(['url' => action('ProductController@saveSellingPrices'), 'method' => 'post', 'id' => 'selling_price_form' ]); ?>

	<?php echo Form::hidden('product_id', $product->id);; ?>

	<div class="row">
		<div class="col-xs-12">
		<div class="box box-solid">
			<div class="box-header">
	            <h3 class="box-title"><?php echo e(app('translator')->getFromJson('sale.product')); ?>: <?php echo e($product->name); ?> (<?php echo e($product->sku); ?>)</h3>
	        </div>
			<div class="box-body">
				<div class="row">
					<div class="col-xs-12">
						<div class="table-responsive">
							<table class="table table-condensed table-bordered table-th-green text-center table-striped">
								<thead>
									<tr>
										<?php if($product->type == 'variable'): ?>
											<th>
												<?php echo e(app('translator')->getFromJson('lang_v1.variation')); ?>
											</th>
										<?php endif; ?>
										<th><?php echo e(app('translator')->getFromJson('lang_v1.default_selling_price_inc_tax')); ?></th>
										<?php $__currentLoopData = $price_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $price_group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<th><?php echo e($price_group->name); ?></th>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</tr>
								</thead>
								<tbody>
									<?php $__currentLoopData = $product->variations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr>
										<?php if($product->type == 'variable'): ?>
											<td>
												<?php echo e($variation->product_variation->name); ?> - <?php echo e($variation->name); ?> (<?php echo e($variation->sub_sku); ?>)
											</td>
										<?php endif; ?>
										<td><span class="display_currency" data-currency_symbol="true"><?php echo e($variation->sell_price_inc_tax); ?></span></td>
											<?php $__currentLoopData = $price_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $price_group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<td>
													<?php echo Form::text('group_prices[' . $price_group->id . '][' . $variation->id . ']', !empty($variation_prices[$variation->id][$price_group->id]) ? @number_format($variation_prices[$variation->id][$price_group->id]) : 0, ['class' => 'form-control input_number input-sm'] );; ?>

												</td>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<?php echo Form::hidden('submit_type', 'save', ['id' => 'submit_type']);; ?>

			<div class="text-center">
      			<div class="btn-group">
					<button id="opening_stock_button" <?php if($product->enable_stock == 0): ?> disabled <?php endif; ?> type="submit" value="submit_n_add_opening_stock" class="btn bg-purple submit_form"><?php echo e(app('translator')->getFromJson('lang_v1.save_n_add_opening_stock')); ?></button>
					<button type="submit" value="save_n_add_another" class="btn bg-maroon submit_form"><?php echo e(app('translator')->getFromJson('lang_v1.save_n_add_another')); ?></button>
          			<button type="submit" value="submit" class="btn btn-primary submit_form"><?php echo e(app('translator')->getFromJson('messages.save')); ?></button>
          		</div>
          	</div>
		</div>
	</div>

	<?php echo Form::close(); ?>

</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
	<script type="text/javascript">
		$(document).ready(function(){
			$('button.submit_form').click( function(e){
				e.preventDefault();
				$('input#submit_type').val($(this).attr('value'));

				if($("form#selling_price_form").valid()) {
		            $("form#selling_price_form").submit();
		        }
			});
		});
	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>