<div class="pos-tab-content">
    <div class="row">
    	<div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('print_receipt_on_invoice', __('receipt.print_receipt_on_invoice') . ':'); ?>

                <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.print_receipt_on_invoice') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-file-text-o"></i>
                    </span>
                    <?php echo Form::select('print_receipt_on_invoice', $printReceiptOnInvoice, $location->print_receipt_on_invoice, ['class' => 'form-control select2', 'required', 'style' => 'width: 100%;']);; ?>

                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('receipt_printer_type', __('receipt.receipt_printer_type') . ':*'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.receipt_printer_type') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-print"></i>
                    </span>
                    <?php echo Form::select('receipt_printer_type', $receiptPrinterType, $location->receipt_printer_type, ['class' => 'form-control select2', 'required', 'style' => 'width: 100%;']);; ?>

                </div>
                <?php if(config('app.env') == 'demo'): ?>
                    <span class="help-block">Only Browser based option is enabled in demo.</span>
                <?php endif; ?>
                
            </div>
        </div>

        <div class="col-sm-4" 
            id="location_printer_div">
            <div class="form-group">
                <?php echo Form::label('printer_id', __('printer.receipt_printers') . ':*'); ?>

                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-share-alt"></i>
                    </span>
                    <?php echo Form::select('printer_id', $printers, $location->printer_id, ['class' => 'form-control select2', 'style' => 'width: 100%;']);; ?>

                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <br/>

        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('invoice_layout_id', __('invoice.invoice_layout') . ':*'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.invoice_layout') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-info"></i>
                    </span>
                    <?php echo Form::select('invoice_layout_id', $invoice_layouts, $location->invoice_layout_id, ['class' => 'form-control select2', 'required', 'style' => 'width: 100%;']);; ?>

                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <?php echo Form::label('invoice_scheme_id', __('invoice.invoice_scheme') . ':*'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto" 
                    data-content="' . __('tooltip.invoice_scheme') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-info"></i>
                    </span>
                    <?php echo Form::select('invoice_scheme_id', $invoice_schemes, $location->invoice_scheme_id, ['class' => 'form-control select2', 'required', 'style' => 'width: 100%;']);; ?>

                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <hr>
        <div class="col-sm-3">
	        <div class="form-group">
	            <?php echo Form::label('custom_field1', __('lang_v1.custom_field', ['number' => 1]) . ':'); ?>

	            <?php echo Form::text('custom_field1', $location->custom_field1, ['class' => 'form-control', 
	                'placeholder' => __('lang_v1.custom_field', ['number' => 1])]);; ?>

	        </div>
	    </div>
	    <div class="col-sm-3">
	        <div class="form-group">
	            <?php echo Form::label('custom_field2', __('lang_v1.custom_field', ['number' => 2]) . ':'); ?>

	            <?php echo Form::text('custom_field2', $location->custom_field2, ['class' => 'form-control', 
	                'placeholder' => __('lang_v1.custom_field', ['number' => 2])]);; ?>

	        </div>
	   	</div>
	      <div class="col-sm-3">
	        <div class="form-group">
	            <?php echo Form::label('custom_field3', __('lang_v1.custom_field', ['number' => 3]) . ':'); ?>

	            <?php echo Form::text('custom_field3', $location->custom_field3, ['class' => 'form-control', 
	                'placeholder' => __('lang_v1.custom_field', ['number' => 3])]);; ?>

	        </div>
	      </div>
	    <div class="col-sm-3">
	        <div class="form-group">
	            <?php echo Form::label('custom_field4', __('lang_v1.custom_field', ['number' => 4]) . ':'); ?>

	            <?php echo Form::text('custom_field4', $location->custom_field4, ['class' => 'form-control', 
	                'placeholder' => __('lang_v1.custom_field', ['number' => 4])]);; ?>

	        </div>
	    </div>
    </div>
</div>