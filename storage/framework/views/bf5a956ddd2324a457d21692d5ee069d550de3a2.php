<div class="modal-dialog modal-xl" role="document">
	<div class="modal-content">
	<?php echo Form::open(['url' => action('OpeningStockController@save'), 'method' => 'post', 'id' => 'add_opening_stock_form' ]); ?>

	<?php echo Form::hidden('product_id', $product->id);; ?>

		<div class="modal-header">
		    <button type="button" class="close no-print" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		      <h4 class="modal-title" id="modalTitle"><?php echo e(app('translator')->getFromJson('lang_v1.add_opening_stock')); ?></h4>
	    </div>
	    <div class="modal-body">
			<?php echo $__env->make('opening_stock.form-part', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-primary" id="add_opening_stock_btn"><?php echo e(app('translator')->getFromJson('messages.save')); ?></button>
		    <button type="button" class="btn btn-default no-print" data-dismiss="modal"><?php echo e(app('translator')->getFromJson( 'messages.close' )); ?></button>
		 </div>
	 <?php echo Form::close(); ?>

	</div>
</div>
