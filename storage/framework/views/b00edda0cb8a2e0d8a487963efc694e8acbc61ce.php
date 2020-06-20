<div class="modal-dialog modal-xl" role="document">
  <div class="modal-content">
    <?php echo $__env->make('purchase.partials.show_details', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary no-print" aria-label="Print" 
      onclick="$(this).closest('div.modal-content').printThis();"><i class="fa fa-print"></i> <?php echo e(app('translator')->getFromJson( 'messages.print' )); ?>
      </button>
      <button type="button" class="btn btn-default no-print" data-dismiss="modal"><?php echo e(app('translator')->getFromJson( 'messages.close' )); ?></button>
    </div>
  </div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		var element = $('div.modal-xl');
		__currency_convert_recursively(element);
	});
</script>