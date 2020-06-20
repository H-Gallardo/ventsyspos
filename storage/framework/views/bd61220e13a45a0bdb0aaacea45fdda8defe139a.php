<?php $__env->startSection('title', __( 'restaurant.kitchen' )); ?>

<?php $__env->startSection('content'); ?>
<!-- Main content -->
<section class="content min-height-90hv no-print">

<div class="row">
    <div class="col-md-12 text-center">
        <h3><?php echo e(app('translator')->getFromJson( 'restaurant.all_orders' )); ?> - <?php echo e(app('translator')->getFromJson( 'restaurant.kitchen' )); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('lang_v1.tooltip_kitchen') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></h3>
    </div>
</div>


	<div class="box">
        <div class="box-header">
            <button type="button" class="btn btn-sm btn-primary pull-right" id="refresh_orders"><i class="fa fa-refresh"></i> <?php echo e(app('translator')->getFromJson( 'restaurant.refresh' )); ?></button>
        </div>
        <div class="box-body">
            <input type="hidden" id="orders_for" value="kitchen">
        	<div class="row" id="orders_div">
             <?php echo $__env->make('restaurant.partials.show_orders', array('orders_for' => 'kitchen'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>   
            </div>
        </div>
        <div class="overlay hide">
          <i class="fa fa-refresh fa-spin"></i>
        </div>
    </div>

</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $(document).on('click', 'a.mark_as_cooked_btn', function(e){
                e.preventDefault();
                swal({
                  title: LANG.sure,
                  icon: "info",
                  buttons: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        var _this = $(this);
                        var href = _this.data('href');
                        $.ajax({
                            method: "GET",
                            url: href,
                            dataType: "json",
                            success: function(result){
                                if(result.success == true){
                                    toastr.success(result.msg);
                                    _this.closest('.order_div').remove();
                                } else {
                                    toastr.error(result.msg);
                                }
                            }
                        });
                    }
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.restaurant', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>