<?php $__env->startSection('title', 'Superadmin Subscription'); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(app('translator')->getFromJson( 'superadmin::lang.subscription' )); ?>
        <small><?php echo e(app('translator')->getFromJson( 'superadmin::lang.view_subscription' )); ?></small>
    </h1>
</section>

<!-- Main content -->
<section class="content">

    <?php echo $__env->make('superadmin::layouts.partials.currency', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="box">  
        <div class="box-body">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('superadmin')): ?>
                <div class="table-responsive">
            	<table class="table table-bordered table-striped" id="superadmin_subscription_table">
            		<thead>
            			<tr>
                            <th><?php echo e(app('translator')->getFromJson( 'superadmin::lang.business_name' )); ?></th>
            				<th><?php echo e(app('translator')->getFromJson( 'superadmin::lang.package_name' )); ?></th>
                            <th><?php echo e(app('translator')->getFromJson( 'superadmin::lang.status' )); ?></th>
                            <th><?php echo e(app('translator')->getFromJson( 'superadmin::lang.start_date' )); ?></th>
            				<th><?php echo e(app('translator')->getFromJson( 'superadmin::lang.trial_end_date' )); ?></th>
                            <th><?php echo e(app('translator')->getFromJson( 'superadmin::lang.end_date' )); ?></th>
            				<th><?php echo e(app('translator')->getFromJson( 'superadmin::lang.price' )); ?></th>
                            <th><?php echo e(app('translator')->getFromJson( 'superadmin::lang.paid_via' )); ?></th>
            				<th><?php echo e(app('translator')->getFromJson( 'superadmin::lang.payment_transaction_id' )); ?></th>
                            <th><?php echo e(app('translator')->getFromJson( 'superadmin::lang.action' )); ?></th>
            			</tr>
            		</thead>
            	</table>
                </div>
            <?php endif; ?>
        </div>

    </div>
    <div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"></div>

</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<script>
    $(document).ready(function(){

        // superadmin_subscription_table
        var superadmin_subscription_table = $('#superadmin_subscription_table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: '/superadmin/superadmin-subscription',
                        columnDefs:[{
                                "targets": 9,
                                "orderable": false,
                                "searchable": false
                            }],
                        "fnDrawCallback": function (oSettings) {
                         __currency_convert_recursively($('#superadmin_subscription_table'), true);
                        }
                    });


        // change_status button
        $(document).on('click', 'button.change_status', function(){
            $("div#statusModal").load($(this).data('href'), function(){
                $(this).modal('show');
                $("form#status_change_form").submit(function(e){
                    e.preventDefault();
                    var url = $(this).attr("action");
                    var data = $(this).serialize();
                    $.ajax({
                        method: "POST",
                        dataType: "json",
                        data: data,
                        url: url,
                        success:function(result){
                            if( result.success == true){
                                $("div#statusModal").modal('hide');
                                toastr.success(result.msg);
                                superadmin_subscription_table.ajax.reload();
                            }else{
                                toastr.error(result.msg);
                            }
                        }
                    });
                });
            });
        });

        $(document).on('shown.bs.modal', '.view_modal', function(){
            $('.edit-subscription-modal .datepicker').datepicker({
                autoclose: true,
                format:datepicker_date_format
            });
            $("form#edit_subscription_form").submit(function(e){
              e.preventDefault();
              var url = $(this).attr("action");
              var data = $(this).serialize();
              $.ajax({
                  method: "POST",
                  dataType: "json",
                  data: data,
                  url: url,
                  success:function(result){
                      if( result.success == true){
                          $("div.view_modal").modal('hide');
                          toastr.success(result.msg);
                          superadmin_subscription_table.ajax.reload();
                      }else{
                          toastr.error(result.msg);
                      }
                  }
              });
            });
        });

    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>