@extends('layouts.app')
@section('title', __('lang_v1.purchase_return'))

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>@lang('lang_v1.purchase_return')</h1>
</section>

<!-- Main content -->
<section class="content">
	{!! Form::open(['url' => action('PurchaseReturnController@store'), 'method' => 'post', 'id' => 'purchase_return_form' ]) !!}
	{!! Form::hidden('transaction_id', $purchase->id); !!}
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title">@lang('lang_v1.parent_purchase')</h3>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-sm-4">
					<strong>@lang('purchase.ref_no'):</strong> {{ $purchase->ref_no }} <br>
					<strong>@lang('messages.date'):</strong> {{@format_date($purchase->transaction_date)}}
				</div>
				<div class="col-sm-4">
					<strong>@lang('purchase.supplier'):</strong> {{ $purchase->contact->name }} <br>
					<strong>@lang('purchase.business_location'):</strong> {{ $purchase->location->name }}
				</div>
			</div>
		</div>
	</div>
	<div class="box box-solid">
		<div class="box-body">
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						{!! Form::label('ref_no', __('purchase.ref_no').':') !!}
						{!! Form::text('ref_no', !empty($purchase->return_parent->ref_no) ? $purchase->return_parent->ref_no : null, ['class' => 'form-control']); !!}
					</div>
				</div>
				<div class="col-sm-12">
					<table class="table bg-gray" id="purchase_return_table">
			          	<thead>
				            <tr class="bg-green">
				              	<th>#</th>
				              	<th>@lang('product.product_name')</th>
				              	<th>@lang('sale.unit_price')</th>
				              	<th>@lang('purchase.purchase_quantity')</th>
				              	<th>@lang('lang_v1.quantity_left')</th>
				              	<th>@lang('lang_v1.return_quantity')</th>
				              	<th>@lang('lang_v1.return_subtotal')</th>
				            </tr>
				        </thead>
				        <tbody>
				          	@foreach($purchase->purchase_lines as $purchase_line)
				          	@php
				          		$qty_available = $purchase_line->quantity - $purchase_line->quantity_sold - $purchase_line->quantity_adjusted;
				          	@endphp
				            <tr>
				              	<td>{{ $loop->iteration }}</td>
				              	<td>
				                	{{ $purchase_line->product->name }}
				                 	@if( $purchase_line->product->type == 'variable')
				                  	- {{ $purchase_line->variations->product_variation->name}}
				                  	- {{ $purchase_line->variations->name}}
				                 	@endif
				              	</td>
				              	<td><span class="display_currency" data-currency_symbol="true">{{ $purchase_line->purchase_price_inc_tax }}</span></td>
				              	<td>{{ $purchase_line->quantity }}</td>
				              	<td><span class="display_currency" data-currency_symbol="false">{{ $qty_available }}</span></td>
				              	<td>
				              		@php
						                $check_decimal = 'false';
						                if($purchase_line->product->unit->allow_decimal == 0){
						                    $check_decimal = 'true';
						                }
						            @endphp
						            <input type="text" name="returns[{{$purchase_line->id}}]" value="{{@num_format($purchase_line->quantity_returned)}}"
						            class="form-control input-sm input_number return_qty"
						            data-rule-abs_digit="{{$check_decimal}}" 
						            data-msg-abs_digit="@lang('lang_v1.decimal_value_not_allowed')"
						            @if($purchase_line->product->enable_stock) 
				              			data-rule-max-value="{{$qty_available}}"
				              			data-msg-max-value="@lang('validation.custom-messages.quantity_not_available', ['qty' => $purchase_line->formatted_qty_available, 'unit' => $purchase_line->product->unit->short_name ])" 
				              		@endif
						            >
						            <input type="hidden" class="unit_price" value="{{@num_format($purchase_line->purchase_price_inc_tax)}}">
				              	</td>
				              	<td>
				              		<div class="return_subtotal"></div>
				              		
				              	</td>
				            </tr>
				          	@endforeach
			          	</tbody>
			        </table>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<strong>@lang('lang_v1.total_return_tax'): </strong>
					<span id="total_return_tax"></span> @if(!empty($purchase->tax))({{$purchase->tax->name}} - {{$purchase->tax->amount}}%)@endif
					@php
						$tax_percent = 0;
						if(!empty($purchase->tax)){
							$tax_percent = $purchase->tax->amount;
						}
					@endphp
					{!! Form::hidden('tax_id', $purchase->tax_id); !!}
					{!! Form::hidden('tax_amount', 0, ['id' => 'tax_amount']); !!}
					{!! Form::hidden('tax_percent', $tax_percent, ['id' => 'tax_percent']); !!}
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 text-right">
					<strong>@lang('lang_v1.return_total'): </strong>&nbsp;
					<span id="net_return">0</span> 
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-12">
					<button type="submit" class="btn btn-primary pull-right">@lang('messages.save')</button>
				</div>
			</div>
		</div>
	</div>
	{!! Form::close() !!}

</section>
@stop
@section('javascript')
<script type="text/javascript">
	$(document).ready( function(){
		$('form#purchase_return_form').validate();
		update_purchase_return_total();
	});
	$(document).on('change', 'input.return_qty', function(){
		update_purchase_return_total()
	});

	function update_purchase_return_total(){
		var net_return = 0;
		$('table#purchase_return_table tbody tr').each( function(){
			var quantity = __read_number($(this).find('input.return_qty'));
			var unit_price = __read_number($(this).find('input.unit_price'));
			var subtotal = quantity * unit_price;
			$(this).find('.return_subtotal').text(__currency_trans_from_en(subtotal, true));
			net_return += subtotal;
		});
		var tax_percent = $('input#tax_percent').val();
		var total_tax = __calculate_amount('percentage', tax_percent, net_return);
		var net_return_inc_tax = total_tax + net_return;

		$('input#tax_amount').val(total_tax);
		$('span#total_return_tax').text(__currency_trans_from_en(total_tax, true));
		$('span#net_return').text(__currency_trans_from_en(net_return_inc_tax, true));
	}
</script>
@endsection
