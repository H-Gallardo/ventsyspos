@extends('layouts.app')
@section('title', __('sale.products'))

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>@lang('sale.products')
        <small>@lang('lang_v1.manage_products')</small>
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
        	<h3 class="box-title">@lang('lang_v1.all_products')</h3>
            @can('product.create')
            	<div class="box-tools">
                    <a class="btn btn-block btn-primary" href="{{action('ProductController@create')}}">
    				<i class="fa fa-plus"></i> @lang('messages.add')</a>
                </div>
            @endcan
        </div>
        <div class="box-body">
            @can('product.view')
                <div class="table-responsive">
            	<table class="table table-bordered table-striped ajax_view table-text-center" id="product_table">
            		<thead>
            			<tr>
                            @can('product.delete')
                                <th><input type="checkbox" id="select-all-row"></th>
                            @endcan
                            <th>&nbsp;</th>
            				<th>@lang('sale.product')</th>
    						<th>@lang('product.product_type')</th>
            				<th>@lang('product.category')</th>
    						<th>@lang('product.sub_category')</th>
                            <th>@lang('product.unit')</th>
    						<th>@lang('product.brand')</th>
    						<th>@lang('product.tax')</th>
    						<th>@lang('product.sku')</th>
    						<th>@lang('messages.action')</th>
            			</tr>
            		</thead>
                    @can('product.delete')
                        <tfoot>
                            <tr>
                                <td colspan="11">
                                {!! Form::open(['url' => action('ProductController@massDestroy'), 'method' => 'post', 'id' => 'mass_delete_form' ]) !!}
                                    {!! Form::hidden('selected_rows', null, ['id' => 'selected_rows']); !!}
                                        {!! Form::submit(__('lang_v1.delete_selected'), array('class' => 'btn btn-xs btn-danger', 'id' => 'delete-selected')) !!}
                                        {!! Form::close() !!}
                                    </td>
                            </tr>
                        </tfoot>
                    @endcan
            	</table>
                </div>
            @endcan
        </div>
    </div>

    <input type="hidden" id="is_rack_enabled" value="{{$rack_enabled}}">

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

@endsection

@section('javascript')
    <script src="{{ asset('js/product.js?v=' . $asset_v) }}"></script>
    <script src="{{ asset('js/opening_stock.js?v=' . $asset_v) }}"></script>
    <script type="text/javascript">
        $(document).ready( function(){
            var col_targets = [0, 9];
            var col_sort = [1, 'asc'];
            @can('product.delete')
                col_targets = [0, 1, 10];
                col_sort = [2, 'asc'];
            @endcan

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
                    @can('product.delete')
                        { data: 'mass_delete'  },
                    @endcan
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
                            @can('product.delete')
                                target_col = 1;
                            @endcan
                            $( row ).find('td:eq('+target_col+') div').prepend('<i style="margin:auto;" class="fa fa-plus-circle text-success cursor-pointer no-print rack-details" title="' + LANG.details + '"></i>&nbsp;&nbsp;');
                        }
                        @can('product.delete')
                            $( row ).find('td:eq(0)').attr('class', 'selectable_td');
                        @endcan
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
                    swal('@lang("lang_v1.no_row_selected")');
                }    
            })
        });
    </script>
@endsection