<div class="col-sm-12"><br>
	<div class="col-sm-8 col-sm-offset-2">
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon">
					<i class="fa fa-search"></i>
				</span>
				<?php echo Form::text('search_product', null, ['class' => 'form-control mousetrap', 'id' => 'search_product', 'placeholder' => __('lang_v1.search_product_placeholder')]);; ?>

			</div>
		</div>
	</div>
	<div class="col-sm-12">
		<div class="table-responsive">
			<table class="table table-condensed table-bordered table-striped table-responsive add-product-price-table composite_product_table">
				<thead>
					<tr>
						<th class="text-center">
							<?php echo e(app('translator')->getFromJson('product.product_name')); ?>
						</th>
						<th class="text-center"> 
							<?php echo e(app('translator')->getFromJson('sale.qty')); ?>
						</th>
						<th class="text-center">
							<?php echo e(app('translator')->getFromJson('lang_v1.purchase_price_exc_tax')); ?>
						</th>
						<th class="text-center">
							<?php echo e(app('translator')->getFromJson('lang_v1.item_level_purchase_price')); ?>
						</th>
						<th class="text-center">
							<span>
								<i class="fa fa-trash"></i>
							</span>
						</th>
					</tr>
				</thead>
				<tbody></tbody><br>
				<tfoot class="composite_product_table_footer">
				<tr>
					<td></td>
					<td class="text-center"> 
						<b> <?php echo e(app('translator')->getFromJson( 'purchase.net_total_amount' )); ?></b> :
					</td>
					<td>
					</td>
					<td class="text-center">
						<span class="item_level_purchase_price_total display_currency" data-currency_symbol="true">
							0
						</span>
						<input type="hidden" name="item_level_purchase_price_total" id="item_level_purchase_price_total" value="0">
					</td>
				</tr>
				</tfoot>	
			</table>
		</div>
		<div class="col-sm-12 col-sm-offset-4">
			<div class="col-sm-4">
				<?php echo Form::label('margin', __('product.profit_percent')) .":"; ?>

				<?php echo Form::text('margin', number_format($profit_percent, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), ['class' => 'form-control input-sm input_number mousetrap']); ?>

			</div>
			<div class="col-sm-4">
				<?php echo Form::label('selling_price', __('product.default_selling_price')). ":"; ?>

				<?php echo Form::text('selling_price', number_format(0, 2, session('currency')['decimal_separator'], session('currency')['thousand_separator']), ['class' => 'form-control input-sm input_number mousetrap']); ?>

			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		//Add products
	    if($( "#search_product" ).length > 0){
	        $( "#search_product" ).autocomplete({
	            source: "/purchases/get_products",
	            minLength: 2,
	            response: function(event,ui) {
	                if (ui.content.length == 1)
	                {
	                    ui.item = ui.content[0];
	                    $(this).data('ui-autocomplete')._trigger('select', 'autocompleteselect', ui);
	                    $(this).autocomplete('close');
	                }
	            },
	            select: function( event, ui ) {
	                $(this).val(null);
	                get_product_entry_row( ui.item.product_id, ui.item.variation_id);
	            }
	        })
	        .autocomplete( "instance" )._renderItem = function( ul, item ) {
	            return $( "<li>" ).append( "<div>" + item.text + "</div>" ).appendTo( ul );
	        };
	    }

	    function get_product_entry_row(product_id, variation_id) {

	    	if (product_id) {
	    		$.ajax({
	    			method : 'POST',
	    			url: '/products/get-composite-product-entry-row',
	    			dataType : "html",
	    			data: { 'product_id' : product_id, 'variation_id' : variation_id},
	    			success :function(result){
	    				$(result).find('input.quantity').each(function(){
	    					var row = $(this).closest('tr');
	    					$(".composite_product_table tbody").append(update_composite_product_row_values(row));
	    					update_net_total_amount();
	    				});
	    			}
	    		});
	    	}
	    }

	    $(document).on('click', '.remove_composite_product_entry_row', function(){
	    	swal({ 
            title: LANG.sure,
            icon: "warning",
            buttons: true,
            dangerMode: true,
        	}).then((value) => {
	            if(value){
	                $(this).closest('tr').remove();
	                update_net_total_amount();
	            }
	        });
	    });

	    function update_composite_product_row_values(row) {
			var purchase_price = __read_number(row.find('input.purchase_price'), false);
			var quantity = __read_number(row.find('input.quantity'), false);

			var item_level_purchase_price = quantity * purchase_price;
			row.find('span.item_level_purchase_price').text(item_level_purchase_price);
			__currency_convert_recursively(row);

			row.find('input.item_level_purchase_price').val(item_level_purchase_price);
			
			return row;
	    }

	    function update_net_total_amount() {
	    	
	    	var item_level_purchase_price_total = 0;
	    	$('.composite_product_table').find('tr').each(function(){
	    		
	    		item_level_purchase_price_total += __read_number($(this).find('input.item_level_purchase_price'),false);

	    	});

	    	$(".composite_product_table").find('span.item_level_purchase_price_total').text(item_level_purchase_price_total);
	    	$(".composite_product_table").find('input#item_level_purchase_price_total').val(item_level_purchase_price_total);

	    	__currency_convert_recursively($(".composite_product_table_footer").find('tr'));
	    	
	    	var margin = __read_number($('input#margin'), false);
	    	var selling_price = __add_percent(item_level_purchase_price_total, margin);
	    	__write_number($('input#selling_price'), selling_price);
	    }

	    $(document).on('change', 'input.quantity', function(){
	    	var row = $(this).closest('tr');
	    	var quantity = __read_number(row.find('input.quantity'), false);
	    	var purchase_price = __read_number(row.find('input.purchase_price'), false);
	    	var item_level_purchase_price = quantity * purchase_price;

	    	row.find('span.item_level_purchase_price').text(item_level_purchase_price);
	    	row.find('input.item_level_purchase_price').val(item_level_purchase_price);
	    	__currency_convert_recursively(row);
	    	update_net_total_amount();
	    });

	    $(document).on('change', 'input#margin', function(){
	    	update_net_total_amount();
	    });

	    $(document).on('change', 'input#selling_price', function(){
	    	var amount = __read_number($('input#selling_price'), false);
			var principal = __read_number($('input#item_level_purchase_price_total'), false);

	    	var margin = __get_rate(principal, amount);
	    	__write_number($('input#margin'), margin);
	    });

	    
	});
</script>