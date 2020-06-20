<?php $__env->startSection('title', __( 'restaurant.orders' )); ?>

<?php $__env->startSection('content'); ?>

<!-- Main content -->
<section class="content min-height-90hv no-print">
    
    <div class="row">
        <div class="col-md-12 text-center">
            <h3><?php echo e(app('translator')->getFromJson( 'restaurant.all_orders' )); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('lang_v1.tooltip_serviceorder') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></h3>
        </div>
    </div>

    <?php if(!$is_service_staff): ?>
        <div class="box">
            <div class="box-body">
                <div class="col-sm-6">
                    <?php echo Form::open(['url' => action('Restaurant\OrderController@index'), 'method' => 'get', 'id' => 'select_service_staff_form' ]); ?>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-user-secret"></i>
                            </span>
                            <?php echo Form::select('service_staff', $service_staff, null, ['class' => 'form-control select2', 'placeholder' => __('restaurant.select_service_staff'), 'id' => 'service_staff_id']);; ?>

                        </div>
                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    <?php endif; ?>

	<div class="box">
        <div class="box-header">
        	<h3 class="box-title"><?php echo e(app('translator')->getFromJson( 'restaurant.all_your_orders' )); ?></h3>
            <button type="button" class="btn btn-sm btn-primary pull-right" id="refresh_orders"><i class="fa fa-refresh"></i> <?php echo e(app('translator')->getFromJson( 'restaurant.refresh' )); ?></button>
        </div>
        <div class="box-body">
        	 <input type="hidden" id="orders_for" value="waiter">
            <div class="row" id="orders_div">
             <?php echo $__env->make('restaurant.partials.show_orders', array('orders_for' => 'waiter'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>   
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
        $('select#service_staff_id').change( function(){
            $('form#select_service_staff_form').submit();
        });
        $(document).ready(function(){
            $(document).on('click', 'a.mark_as_served_btn', function(e){
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
                                    refresh_orders();
                                    toastr.success(result.msg);
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