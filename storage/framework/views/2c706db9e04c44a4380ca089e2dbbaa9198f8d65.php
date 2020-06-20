<!-- Edit Order tax Modal -->
<div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title"><?php echo e(app('translator')->getFromJson('lang_v1.suspended_sales')); ?></h4>
		</div>
		<div class="modal-body">
			<div class="row">
				<?php
					$c = 0;
				?>
				<?php $__empty_1 = true; $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
					<?php if($sale->is_suspend): ?>
						<div class="col-xs-6 col-sm-3">
							<div class="small-box bg-yellow">
					            <div class="inner text-center">
						            <?php if(!empty($sale->additional_notes)): ?>
						            	<p><i class="fa fa-edit"></i> <?php echo e($sale->additional_notes); ?></p>
						            <?php endif; ?>
					              <p><?php echo e($sale->invoice_no); ?><br>
					              <?php echo e(\Carbon::createFromTimestamp(strtotime($sale->transaction_date))->format(session('business.date_format'))); ?><br>
					              <strong><i class="fa fa-user"></i> <?php echo e($sale->name); ?></strong></p>
					              <p><i class="fa fa-cubes"></i><?php echo e(app('translator')->getFromJson('lang_v1.total_items')); ?>: <?php echo e(count($sale->sell_lines)); ?><br>
					              <i class="fa fa-money"></i> <?php echo e(app('translator')->getFromJson('sale.total')); ?>: <span class="display_currency" data-currency_symbol=true><?php echo e($sale->final_total); ?></span>
					              </p>
					              <?php if($is_tables_enabled && !empty($sale->table->name)): ?>
					              	<?php echo e(app('translator')->getFromJson('restaurant.table')); ?>: <?php echo e($sale->table->name); ?>

					              <?php endif; ?>
					              <?php if($is_service_staff_enabled && !empty($sale->service_staff)): ?>
					              	<br><?php echo e(app('translator')->getFromJson('restaurant.service_staff')); ?>: <?php echo e($sale->service_staff->user_full_name); ?>

					              <?php endif; ?>
					            </div>
					            <a href="<?php echo e(action('SellPosController@edit', ['id' => $sale->id])); ?>" class="small-box-footer">
					              <?php echo e(app('translator')->getFromJson('sale.edit_sale')); ?> <i class="fa fa-arrow-circle-right"></i>
					            </a>
					         </div>
				         </div>
				        <?php
				         	$c++;
				        ?>
					<?php endif; ?>

					<?php if($c%4==0): ?>
						<div class="clearfix"></div>
					<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
					<p class="text-center"><?php echo e(app('translator')->getFromJson('purchase.no_records_found')); ?></p>
				<?php endif; ?>
			</div>
		</div>
		<div class="modal-footer">
		    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(app('translator')->getFromJson('messages.close')); ?></button>
		</div>
	</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->