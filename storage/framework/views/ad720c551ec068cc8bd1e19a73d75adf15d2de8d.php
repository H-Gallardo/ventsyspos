<?php $__env->startSection('title', __('printer.printers')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(app('translator')->getFromJson('printer.printers')); ?>
        <small><?php echo e(app('translator')->getFromJson('printer.manage_your_printers')); ?></small>
    </h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">

	<div class="box">
        <div class="box-header">
        	<h3 class="box-title"><?php echo e(app('translator')->getFromJson('printer.all_your_printer')); ?></h3>
        	<div class="box-tools">
                <a class="btn btn-block btn-primary" href="<?php echo e(action('PrinterController@create')); ?>">
				<i class="fa fa-plus"></i> <?php echo e(app('translator')->getFromJson('printer.add_printer')); ?></a>
            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive">
        	<table class="table table-bordered table-striped" id="printer_table">
        		<thead>
        			<tr>
        				<th><?php echo e(app('translator')->getFromJson('printer.name')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('printer.connection_type')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('printer.capability_profile')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('printer.character_per_line')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('printer.ip_address')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('printer.port')); ?></th>
                        <th><?php echo e(app('translator')->getFromJson('printer.path')); ?></th>
						<th><?php echo e(app('translator')->getFromJson('messages.action')); ?></th>
        			</tr>
        		</thead>
        	</table>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
    $(document).ready( function(){
        var printer_table = $('#printer_table').DataTable({
            processing: true,
            serverSide: true,
            buttons:[],
            ajax: '/printers',
            bPaginate: false,
            columnDefs: [ {
                "targets": 2,
                "orderable": false,
                "searchable": false
            } ]
        });
        $(document).on('click', 'button.delete_printer_button', function(){
            swal({
              title: LANG.sure,
              text: LANG.confirm_delete_printer,
              icon: "warning",
              buttons: true,
              dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    var href = $(this).data('href');
                    var data = $(this).serialize();

                    $.ajax({
                        method: "DELETE",
                        url: href,
                        dataType: "json",
                        data: data,
                        success: function(result){
                            if(result.success === true){
                                toastr.success(result.msg);
                                printer_table.ajax.reload();
                            } else {
                                toastr.error(result.msg);
                            }
                        }
                    });
                }
            });
        });
        $(document).on('click', 'button.set_default', function(){
            var href = $(this).data('href');
            var data = $(this).serialize();

            $.ajax({
                method: "get",
                url: href,
                dataType: "json",
                data: data,
                success: function(result){
                    if(result.success === true){
                        toastr.success(result.msg);
                        printer_table.ajax.reload();
                    } else {
                        toastr.error(result.msg);
                    }
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>