<?php $__env->startSection('title', __('user.roles')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(app('translator')->getFromJson( 'user.roles' )); ?>
        <small><?php echo e(app('translator')->getFromJson( 'user.manage_roles' )); ?></small>
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
        	<h3 class="box-title"><?php echo e(app('translator')->getFromJson( 'user.all_roles' )); ?></h3>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles.create')): ?>
        	<div class="box-tools">
                <a class="btn btn-block btn-primary" 
                	href="<?php echo e(action('RoleController@create')); ?>" >
                	<i class="fa fa-plus"></i> <?php echo e(app('translator')->getFromJson( 'messages.add' )); ?></a>
            </div>
            <?php endif; ?>
        </div>
        <div class="box-body">
            <div class="table-responsive">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles.view')): ?>
        	<table class="table table-bordered table-striped" id="roles_table">
        		<thead>
        			<tr>
        				<th><?php echo e(app('translator')->getFromJson( 'user.roles' )); ?></th>
        				<th><?php echo e(app('translator')->getFromJson( 'messages.action' )); ?></th>
        			</tr>
        		</thead>
        	</table>
            <?php endif; ?>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
    //Roles table
    $(document).ready( function(){
        var roles_table = $('#roles_table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '/roles',
                    buttons:[],
                    columnDefs: [ {
                        "targets": 1,
                        "orderable": false,
                        "searchable": false
                    } ]
                });
        $(document).on('click', 'button.delete_role_button', function(){
            swal({
              title: LANG.sure,
              text: LANG.confirm_delete_role,
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
                            if(result.success == true){
                                toastr.success(result.msg);
                                roles_table.ajax.reload();
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

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>