<?php $__env->startSection('title', __('woocommerce::lang.sync_log')); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(app('translator')->getFromJson( 'woocommerce::lang.sync_log' )); ?>
    </h1>
</section>

<!-- Main content -->
<section class="content">

	<div class="box box-solid">
        <div class="box-body">
        	<table class="table table-bordered table-striped" id="sync_log_table">
        		<thead>
        			<tr>
                        <th>&nbsp;</th>
        				<th><?php echo e(app('translator')->getFromJson( 'messages.date' )); ?></th>
        				<th><?php echo e(app('translator')->getFromJson( 'woocommerce::lang.sync_type' )); ?></th>
        				<th><?php echo e(app('translator')->getFromJson( 'woocommerce::lang.operation' )); ?></th>
                        <th><?php echo e(app('translator')->getFromJson( 'woocommerce::lang.synced_by' )); ?></th>
                        <th class="col-sm-5"><?php echo e(app('translator')->getFromJson( 'woocommerce::lang.records' )); ?></th>
        			</tr>
        		</thead>
        	</table>
        </div>
    </div>

</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
    $(document).ready( function () {
        var sync_log_table =  $('#sync_log_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "<?php echo e(action('\Modules\Woocommerce\Http\Controllers\WoocommerceController@viewSyncLog')); ?>",
            "order": [[ 1, "desc" ]],
            columnDefs: [ {
                "targets": 5,
                "orderable": false
            } ],
            columns: [
                {
                    "orderable": false,
                    "searchable": false,
                    "data": null,
                    "defaultContent": ""
                },
                {data: 'created_at', name: 'woocommerce_sync_logs.created_at'},
                {data: 'sync_type', name: 'sync_type'},
                {data: 'operation_type', name: 'operation_type'},
                {data: 'full_name', name: 'full_name'},
                {data: 'data', name: 'woocommerce_sync_logs.data'},
            ],
            createdRow: function( row, data, dataIndex ) {
                if( data.log_details != ''){
                    $( row ).find('td:eq(0)').addClass('details-control');
                }
            },
        });

        // Array to track the ids of the details displayed rows
        var detailRows = [];
     
        $('#sync_log_table tbody').on( 'click', 'tr td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = sync_log_table.row( tr );
            var idx = $.inArray( tr.attr('id'), detailRows );
     
            if ( row.child.isShown() ) {
                tr.removeClass( 'details' );
                row.child.hide();
     
                // Remove from the 'open' array
                detailRows.splice( idx, 1 );
            }
            else {
                tr.addClass( 'details' );

                row.child( get_log_details( row.data() ) ).show();
     
                // Add to the 'open' array
                if ( idx === -1 ) {
                    detailRows.push( tr.attr('id') );
                }
            }
        } );
     
        // On each draw, loop over the `detailRows` array and show any child rows
        sync_log_table.on( 'draw', function () {
            $.each( detailRows, function ( i, id ) {
                $('#'+id+' td.details-control').trigger( 'click' );
            } );
        });
    });

    function get_log_details ( rowData ) {
        var div = $('<div/>')
            .addClass( 'loading' )
            .text( 'Loading...' );
        $.ajax( {
            url: '/woocommerce/get-log-details/' + rowData.DT_RowId,
            dataType: 'html',
            success: function ( data ) {
                div
                    .html( data )
                    .removeClass( 'loading' );
            }
        } );
     
        return div;
    }
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>