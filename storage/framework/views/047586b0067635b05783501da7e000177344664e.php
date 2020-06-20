<?php $__env->startSection('title', 'Payment Account'); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo app('translator')->getFromJson( 'lang_v1.payment_account' ); ?>
        <small><?php echo app('translator')->getFromJson( 'lang_v1.manage_payment_account' ); ?></small>
    </h1>
</section>

<!-- Main content -->
<section class="content">

	<div class="box">
        <div class="box-header">
        	<h3 class="box-title"><?php echo app('translator')->getFromJson( 'lang_v1.all_payments' ); ?></h3>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('payment_account.create')): ?>
            	<div class="box-tools">
                    <button type="button" class="btn btn-block btn-primary add_payment_account" 
                    data-container=".payment_account_model"
                    data-href="<?php echo e(action('PaymentAccountController@create')); ?>">
                    <i class="fa fa-plus"></i> <?php echo app('translator')->getFromJson( 'messages.add' ); ?></button>
                </div>
            <?php endif; ?>
        </div>

        <div class="box-body">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('payment_account.view')): ?>
                <div class="table-responsive">
            	<table class="table table-bordered table-striped" id="payment_account_table">
            		<thead>
            			<tr>
                            <th><?php echo app('translator')->getFromJson( 'lang_v1.name' ); ?></th>
            				<th><?php echo app('translator')->getFromJson( 'lang_v1.payment_type' ); ?></th>
                            <th><?php echo app('translator')->getFromJson( 'lang_v1.payment_note' ); ?></th>
            				<th><?php echo app('translator')->getFromJson( 'messages.action' ); ?></th>
            			</tr>
            		</thead>
            	</table>
                </div>
            <?php endif; ?>
        </div>

    </div>
    

    <div class="modal fade payment_account_model" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
    </div>

</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<script>
    $(document).ready(function(){

        $(document).on('click', 'button.delete_payment_account', function(){
            swal({
                title: LANG.sure,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete)=>{
                if(willDelete){
                     var url = $(this).data('url');
                     var data = $(this).serialize();

                     $.ajax({
                         method: "DELETE",
                         url: url,
                         dataType: "json",
                         data: data,
                         success: function(result){
                             if(result.success == true){
                                toastr.success(result.msg);
                                payment_account_table.ajax.reload();
                             }else{
                                toastr.error(result.msg);
                            }

                        }
                    });
                }
            });
        });


        $(document).on('click', 'button.edit_payment_account', function(){
            $("div.payment_account_model").load($(this).data('url'),function(){
                $(this).modal('show');
                $('form#edit_payment_account_form').submit(function(e){
                    e.preventDefault();
                    var data = $(this).serialize();
                    $.ajax({
                        method: "POST",
                        url: $(this).attr("action"),
                        dataType: "json",
                        data: data,
                        success:function(result){
                            if(result.success == true){
                                $('div.payment_account_model').modal('hide');
                                toastr.success(result.msg);
                                payment_account_table.ajax.reload();
                            }else{
                                toastr.error(result.msg);
                            }
                        }
                    });
                });
            });
        });
        
        $('button.add_payment_account').click(function(){
            $("div.payment_account_model").load($(this).data('href'),function(){
                $(this).modal('show');
                $('form#payment_account_form').submit(function(e){
                    e.preventDefault();
                    var data = $(this).serialize();
                    $.ajax({
                        method: "post",
                        url: $(this).attr("action"),
                        dataType: "json",
                        data: data,
                        success:function(result){
                            if(result.success == true){
                                $('div.payment_account_model').modal('hide');
                                toastr.success(result.msg);
                                payment_account_table.ajax.reload();
                            }else{
                                toastr.error(result.msg);
                            }
                        }
                    });
                });

            });    
        });

        // payment_account_table
        var payment_account_table = $('#payment_account_table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: '/payment-account',
                        columnDefs:[{
                                "targets": 3,
                                "orderable": false,
                                "searchable": false
                            }]
                    });

    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>