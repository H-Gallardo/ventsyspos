<?php $__env->startSection('title', __('sale.products')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(app('translator')->getFromJson('sale.products')); ?>
        <small><?php echo e(app('translator')->getFromJson('lang_v1.manage_products')); ?></small>
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
        	<h3 class="box-title"><?php echo e(app('translator')->getFromJson('lang_v1.all_products')); ?></h3>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product.create')): ?>
            	<div class="box-tools">
                    <a class="btn btn-block btn-primary" href="<?php echo e(action('ProductController@create')); ?>">
    				<i class="fa fa-plus"></i> <?php echo e(app('translator')->getFromJson('messages.add')); ?></a>
                </div>
            <?php endif; ?>
        </div>
        <div class="box-body">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product.view')): ?>
                <div class="table-responsive">
            	<table class="table table-bordered table-striped ajax_view table-text-center" id="product_table">
            		<thead>
            			<tr>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product.delete')): ?>
                                <th><input type="checkbox" id="select-all-row"></th>
                            <?php endif; ?>
                            <th>&nbsp;</th>
            				<th><?php echo e(app('translator')->getFromJson('sale.product')); ?></th>
    						<th><?php echo e(app('translator')->getFromJson('product.product_type')); ?></th>
            				<th><?php echo e(app('translator')->getFromJson('product.category')); ?></th>
    						<th><?php echo e(app('translator')->getFromJson('product.sub_category')); ?></th>
                            <th><?php echo e(app('translator')->getFromJson('product.unit')); ?></th>
    						<th><?php echo e(app('translator')->getFromJson('product.brand')); ?></th>
    						<th><?php echo e(app('translator')->getFromJson('product.tax')); ?></th>
    						<th><?php echo e(app('translator')->getFromJson('product.sku')); ?></th>
    						<th><?php echo e(app('translator')->getFromJson('messages.action')); ?></th>
            			</tr>
            		</thead>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product.delete')): ?>
                        <tfoot>
                            <tr>
                                <td colspan="11">
                                <?php echo Form::open(['url' => action('ProductController@massDestroy'), 'method' => 'post', 'id' => 'mass_delete_form' ]); ?>

                                    <?php echo Form::hidden('selected_rows', null, ['id' => 'selected_rows']);; ?>

                                        <?php echo Form::submit(__('lang_v1.delete_selected'), array('class' => 'btn btn-xs btn-danger', 'id' => 'delete-selected')); ?>

                                        <?php echo Form::close(); ?>

                                    </td>
                            </tr>
                        </tfoot>
                    <?php endif; ?>
            	</table>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <input type="hidden" id="is_rack_enabled" value="<?php echo e($rack_enabled); ?>">

    <div class="modal fade product_modal" tabindex="-1" role="dialog" 
    	aria-labelledby="gridSystemModalLabel">
    </div>

    <div class="modal fade" id="view_product_modal" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel">
    </div>

    <div class="modal fade" id="opening_stock_modal" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel">
    </div>

</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script src="<?php echo e(asset('js/product.js?v=' . $asset_v)); ?>"></script>
    <script src="<?php echo e(asset('js/opening_stock.js?v=' . $asset_v)); ?>"></script>
    <script type="text/javascript">
        $(document).ready( function(){
            var col_targets = [0, 9];
            var col_sort = [1, 'asc'];
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product.delete')): ?>
                col_targets = [0, 1, 10];
                col_sort = [2, 'asc'];
            <?php endif; ?>

            var product_table = $('#product_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/products',
                columnDefs: [ {
                    "targets": col_targets,
                    "orderable": false,
                    "searchable": false
                } ],
                aaSorting: [col_sort],
                columns: [
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product.delete')): ?>
                        { data: 'mass_delete'  },
                    <?php endif; ?>
                        { data: 'image', name: 'products.image'  },
                      { data: 'product', name: 'products.name'  },
                      { data: 'type', name: 'products.type'},
                      { data: 'category', name: 'c1.name'},
                      { data: 'sub_category', name: 'c2.name'},
                      { data: 'unit', name: 'units.actual_name'},
                      { data: 'brand', name: 'brands.name'},
                      { data: 'tax', name: 'tax_rates.name'},
                      { data: 'sku', name: 'products.sku'},
                      { data: 'action', name: 'action'}
                    ],
                    createdRow: function( row, data, dataIndex ) {
                        if($('input#is_rack_enabled').val() == 1){
                            var target_col = 0;
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product.delete')): ?>
                                target_col = 1;
                            <?php endif; ?>
                            $( row ).find('td:eq('+target_col+') div').prepend('<i style="margin:auto;" class="fa fa-plus-circle text-success cursor-pointer no-print rack-details" title="' + LANG.details + '"></i>&nbsp;&nbsp;');
                        }
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product.delete')): ?>
                            $( row ).find('td:eq(0)').attr('class', 'selectable_td');
                        <?php endif; ?>
                    }
            });
            // Array to track the ids of the details displayed rows
            var detailRows = [];

            $('#product_table tbody').on( 'click', 'tr i.rack-details', function () {
                var i = $(this);
                var tr = $(this).closest('tr');
                var row = product_table.row( tr );
                var idx = $.inArray( tr.attr('id'), detailRows );

                if ( row.child.isShown() ) {
                    i.addClass( 'fa-plus-circle text-success' );
                    i.removeClass( 'fa-minus-circle text-danger' );

                    row.child.hide();
         
                    // Remove from the 'open' array
                    detailRows.splice( idx, 1 );
                } else {
                    i.removeClass( 'fa-plus-circle text-success' );
                    i.addClass( 'fa-minus-circle text-danger' );

                    row.child( get_product_details( row.data() ) ).show();
         
                    // Add to the 'open' array
                    if ( idx === -1 ) {
                        detailRows.push( tr.attr('id') );
                    }
                }
            });

            $('table#product_table tbody').on('click', 'a.delete-product', function(e){
                e.preventDefault();
                swal({
                  title: LANG.sure,
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        var href = $(this).attr('href');
                        $.ajax({
                            method: "DELETE",
                            url: href,
                            dataType: "json",
                            success: function(result){
                                if(result.success == true){
                                    toastr.success(result.msg);
                                    product_table.ajax.reload();
                                } else {
                                    toastr.error(result.msg);
                                }
                            }
                        });
                    }
                });
            });

            $(document).on('click', '#delete-selected', function(e){
                e.preventDefault();
                var selected_rows = [];
                var i = 0;
                $('.row-select:checked').each(function () {
                    selected_rows[i++] = $(this).val();
                }); 
                
                if(selected_rows.length > 0){
                    $('input#selected_rows').val(selected_rows);
                    swal({
                        title: LANG.sure,
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            $('form#mass_delete_form').submit();
                        }
                    });
                } else{
                    $('input#selected_rows').val('');
                    swal('<?php echo e(app('translator')->getFromJson("lang_v1.no_row_selected")); ?>');
                }    
            })
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>