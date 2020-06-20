<?php
	$totals = ['taxable_value' => 0];
?>

<table style="width:100%;">
	<thead>
		<tr>
			<td>

			<?php if(!empty($receipt_details->invoice_heading)): ?>
				<p class="text-right text-muted-imp" style="font-weight: bold; font-size: 18px !important"><?php echo $receipt_details->invoice_heading; ?></p>
			<?php endif; ?>

			<p class="text-right">
				<?php if(!empty($receipt_details->invoice_no_prefix)): ?>
					<?php echo $receipt_details->invoice_no_prefix; ?>

				<?php endif; ?>

				<?php echo e($receipt_details->invoice_no); ?>

			</p>

			</td>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>

<?php if(!empty($receipt_details->header_text)): ?>
	<div class="row invoice-info">
		<div class="col-xs-12">
			<?php echo $receipt_details->header_text; ?>

		</div>
	</div>
<?php endif; ?>

<!-- business information here -->
<div class="row invoice-info">

	<div class="col-md-6 invoice-col width-50 color-555">
		
		<!-- Logo -->
		<?php if(!empty($receipt_details->logo)): ?>
			<img src="<?php echo e($receipt_details->logo); ?>" class="img">
			<br/>
		<?php endif; ?>

		<!-- Shop & Location Name  -->
		<?php if(!empty($receipt_details->display_name)): ?>
			<p>
				<?php echo e($receipt_details->display_name); ?>

				<?php if(!empty($receipt_details->address)): ?>
					<br/><?php echo $receipt_details->address; ?>

				<?php endif; ?>

				<?php if(!empty($receipt_details->contact)): ?>
					<br/><?php echo e($receipt_details->contact); ?>

				<?php endif; ?>

				<?php if(!empty($receipt_details->website)): ?>
					<br/><?php echo e($receipt_details->website); ?>

				<?php endif; ?>

				<?php if(!empty($receipt_details->tax_info1)): ?>
					<br/><?php echo e($receipt_details->tax_label1); ?> <?php echo e($receipt_details->tax_info1); ?>

				<?php endif; ?>

				<?php if(!empty($receipt_details->tax_info2)): ?>
					<br/><?php echo e($receipt_details->tax_label2); ?> <?php echo e($receipt_details->tax_info2); ?>

				<?php endif; ?>

				<?php if(!empty($receipt_details->location_custom_fields)): ?>
					<br/><?php echo e($receipt_details->location_custom_fields); ?>

				<?php endif; ?>
			</p>
		<?php endif; ?>

		<!-- Table information-->
        <?php if(!empty($receipt_details->table_label) || !empty($receipt_details->table)): ?>
        	<p>
				<?php if(!empty($receipt_details->table_label)): ?>
					<?php echo $receipt_details->table_label; ?>

				<?php endif; ?>
				<?php echo e($receipt_details->table); ?>

			</p>
        <?php endif; ?>

		<!-- Waiter info -->
		<?php if(!empty($receipt_details->service_staff_label) || !empty($receipt_details->service_staff)): ?>
        	<p>
				<?php if(!empty($receipt_details->service_staff_label)): ?>
					<?php echo $receipt_details->service_staff_label; ?>

				<?php endif; ?>
				<?php echo e($receipt_details->service_staff); ?>

			</p>
        <?php endif; ?>
	</div>

	<div class="col-md-6 invoice-col width-50">

		<p class="text-right font-30">
			<?php if(!empty($receipt_details->invoice_no_prefix)): ?>
				<span class="pull-left"><?php echo $receipt_details->invoice_no_prefix; ?></span>
			<?php endif; ?>

			<?php echo e($receipt_details->invoice_no); ?>

		</p>

		<!-- Total Due-->
		<?php if(!empty($receipt_details->total_due)): ?>
			<p class="bg-light-blue-active text-right font-23 padding-5">
				<span class="pull-left bg-light-blue-active">
					<?php echo $receipt_details->total_due_label; ?>

				</span>

				<?php echo e($receipt_details->total_due); ?>

			</p>
		<?php endif; ?>
		
		<!-- Total Paid-->
		<?php if(!empty($receipt_details->total_paid)): ?>
			<p class="text-right font-23 color-555">
				<span class="pull-left"><?php echo $receipt_details->total_paid_label; ?></span>
				<?php echo e($receipt_details->total_paid); ?>

			</p>
		<?php endif; ?>
		<!-- Date-->
		<?php if(!empty($receipt_details->date_label)): ?>
			<p class="text-right font-23 color-555">
				<span class="pull-left">
					<?php echo e($receipt_details->date_label); ?>

				</span>

				<?php echo e($receipt_details->invoice_date); ?>

			</p>
		<?php endif; ?>
	</div>
</div>

<div class="row invoice-info color-555">
	<br/>
	<div class="col-md-6 invoice-col width-50 word-wrap">
		<b><?php echo e($receipt_details->customer_label); ?></b><br/>

		<!-- customer info -->
		<?php if(!empty($receipt_details->customer_info)): ?>
			<?php echo $receipt_details->customer_info; ?>

		<?php endif; ?>
		<?php if(!empty($receipt_details->client_id_label)): ?>
			<br/>
			<strong><?php echo e($receipt_details->client_id_label); ?></strong> <?php echo e($receipt_details->client_id); ?>

		<?php endif; ?>
		<?php if(!empty($receipt_details->customer_tax_label)): ?>
			<br/>
			<strong><?php echo e($receipt_details->customer_tax_label); ?></strong> <?php echo e($receipt_details->customer_tax_number); ?>

		<?php endif; ?>
		<?php if(!empty($receipt_details->customer_custom_fields)): ?>
			<br/><?php echo $receipt_details->customer_custom_fields; ?>

		<?php endif; ?>
		<?php if(!empty($receipt_details->sales_person_label)): ?>
			<br/>
			<strong><?php echo e($receipt_details->sales_person_label); ?></strong> <?php echo e($receipt_details->sales_person); ?>

		<?php endif; ?>
	</div>

	
	<div class="col-md-6 invoice-col width-50 word-wrap">
		<p>
			<?php if(!empty($receipt_details->sub_heading_line1)): ?>
				<?php echo e($receipt_details->sub_heading_line1); ?>

			<?php endif; ?>
			<?php if(!empty($receipt_details->sub_heading_line2)): ?>
				<br><?php echo e($receipt_details->sub_heading_line2); ?>

			<?php endif; ?>
			<?php if(!empty($receipt_details->sub_heading_line3)): ?>
				<br><?php echo e($receipt_details->sub_heading_line3); ?>

			<?php endif; ?>
			<?php if(!empty($receipt_details->sub_heading_line4)): ?>
				<br><?php echo e($receipt_details->sub_heading_line4); ?>

			<?php endif; ?>		
			<?php if(!empty($receipt_details->sub_heading_line5)): ?>
				<br><?php echo e($receipt_details->sub_heading_line5); ?>

			<?php endif; ?>
		</p>
	</div>
	
</div>

<div class="row color-555">
	<div class="col-xs-12">
		<br/>
		<table class="table table-bordered table-no-top-cell-border">
			<thead>
				<tr style="background-color: #357ca5 !important; color: white !important; font-size: 15px !important font-weight: bold;" class="table-no-side-cell-border table-no-top-cell-border text-center">
					<td style="background-color: #357ca5 !important; color: white !important;">#</td>
					
					<td style="background-color: #357ca5 !important; color: white !important;" class="text-left">
						<?php echo $receipt_details->table_product_label; ?>

					</td>

					<?php if($receipt_details->show_cat_code == 1): ?>
						<td style="background-color: #357ca5 !important; color: white !important;" class="text-right"><?php echo $receipt_details->cat_code_label; ?></td>
					<?php endif; ?>
					
					<td style="background-color: #357ca5 !important; color: white !important;" class="text-right">
						<?php echo $receipt_details->table_qty_label; ?>

					</td>
					<td style="background-color: #357ca5 !important; color: white !important;" class="text-right">
						<?php echo $receipt_details->table_unit_price_label; ?> <span class="small color-white"> (<?php echo e($receipt_details->currency['symbol']); ?>)</span>
					</td>
					<!-- <td style="background-color: #357ca5 !important; color: white !important;">
						<?php echo $receipt_details->line_discount_label; ?>

					</td> -->
					<td style="background-color: #357ca5 !important; color: white !important;" class="text-right">
						Taxable Value <span class="small color-white"> (<?php echo e($receipt_details->currency['symbol']); ?>)</span>
					</td>

					<?php if(!empty($receipt_details->table_tax_headings)): ?>
					
						<?php $__currentLoopData = $receipt_details->table_tax_headings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax_heading): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<td style="background-color: #357ca5 !important; color: white !important;" class="word-wrap text-right">
								<?php echo e($tax_heading); ?> <span class="small color-white"> (<?php echo e($receipt_details->currency['symbol']); ?>)</span>
							</td>

							<?php
								$totals[$tax_heading] = 0;
							?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

					<?php endif; ?>
					
					<td style="background-color: #357ca5 !important; color: white !important;" class="text-right">
						<?php echo $receipt_details->table_subtotal_label; ?>  <span class="small color-white"> (<?php echo e($receipt_details->currency['symbol']); ?>)</span>
					</td>
				</tr>
			</thead>
			<tbody>
				<?php $__currentLoopData = $receipt_details->lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td class="text-center">
							<?php echo e($loop->iteration); ?>

						</td>
						<td class="text-left" style="word-break: break-all;">
                            <?php echo e($line['name']); ?> <?php echo e($line['variation']); ?> 
                            <?php if(!empty($line['sub_sku'])): ?>, <?php echo e($line['sub_sku']); ?> <?php endif; ?> <?php if(!empty($line['brand'])): ?>, <?php echo e($line['brand']); ?> <?php endif; ?>
                            <?php if(!empty($line['sell_line_note'])): ?>(<?php echo e($line['sell_line_note']); ?>) <?php endif; ?>
                            <?php if(!empty($line['lot_number'])): ?><br> <?php echo e($line['lot_number_label']); ?>:  <?php echo e($line['lot_number']); ?> <?php endif; ?> 
                            <?php if(!empty($line['product_expiry'])): ?>, <?php echo e($line['product_expiry_label']); ?>:  <?php echo e($line['product_expiry']); ?> <?php endif; ?> 
                        </td>

						<?php if($receipt_details->show_cat_code == 1): ?>
	                        <td class="text-right">
	                        	<?php if(!empty($line['cat_code'])): ?>
	                        		<?php echo e($line['cat_code']); ?>

	                        	<?php endif; ?>
	                        </td>
	                    <?php endif; ?>

						<td class="text-right">
							<?php echo e($line['quantity']); ?> <?php echo e($line['units']); ?>

						</td>
						<td class="text-right">
							<?php echo e($line['unit_price_before_discount']); ?>

						</td>
						<!-- <td class="text-right">
							<?php echo e($line['line_discount']); ?>

						</td> -->
						<td class="text-right">
							<span class="display_currency" data-currency_symbol="false">
								<?php echo e($line['price_exc_tax']); ?>

							</span>

							<?php
								$totals['taxable_value'] += $line['price_exc_tax'];
							?>
						</td>

						<?php if(!empty($receipt_details->table_tax_headings)): ?>
					
						<?php $__currentLoopData = $receipt_details->table_tax_headings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax_heading): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<td class="text-right word-wrap">
								<?php if(!empty($line['group_tax_details'])): ?>
								
								<?php $__currentLoopData = $line['group_tax_details']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax_detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if(strpos($tax_detail['name'], $tax_heading) !== FALSE): ?>
										
										<?php
											$totals[$tax_heading] += $tax_detail['calculated_tax'];
										?>

										<span class="display_currency" data-currency_symbol="false">
										<?php echo e($tax_detail['calculated_tax']); ?>

										</span>
										<br/>
										<span class="small">
											<?php echo e($tax_detail['amount']); ?>%
										</span>
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

								<?php else: ?>
									<?php if(strpos($line['tax_name'], $tax_heading) !== FALSE): ?>

									<?php
										$totals[$tax_heading] += $line['tax_unformatted'];
									?>

									<span class="display_currency" data-currency_symbol="false">
									<?php echo e($line['tax_unformatted']); ?>

									</span>
									<br/>
									<span class="small">
										<?php echo e($line['tax_percent']); ?>%
									</span>
									<?php endif; ?>
								<?php endif; ?>
							</td>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						<?php endif; ?>

						<!-- <?php if(!empty($line->group_tax_details)): ?>
					
						<?php $__currentLoopData = $line->group_tax_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax_detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<td class="text-right">
								<?php echo e($line['line_discount']); ?>

							</td>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						<?php endif; ?> -->

						<td class="text-right">
							<?php echo e($line['line_total']); ?>

						</td>
					</tr>
					
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

				<?php
					$lines = count($receipt_details->lines);
				?>

				<?php for($i = $lines; $i < 5; $i++): ?>
    				<tr>
    					<td>&nbsp;</td>
    					<td>&nbsp;</td>
    					<td>&nbsp;</td>
    					<td>&nbsp;</td>
    					<td>&nbsp;</td>
    					<td>&nbsp;</td>
    					<!-- <td>&nbsp;</td> -->

    					<?php if(!empty($receipt_details->table_tax_headings)): ?>
						<?php $__currentLoopData = $receipt_details->table_tax_headings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax_heading): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<td>&nbsp;</td>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php endif; ?>
    					
    					<?php if($receipt_details->show_cat_code == 1): ?>
    						<td>&nbsp;</td>
    					<?php endif; ?>
    				</tr>
				<?php endfor; ?>
				<tr>
					<?php
						$colspan = 4;
					?>
					<?php if($receipt_details->show_cat_code == 1): ?>
						<?php
							$colspan = 5;
						?>
					<?php endif; ?>
					
					<th colspan="<?php echo e($colspan); ?>" class="text-right" 
						style="background-color: #d2d6de !important;">
						Total
					</th>
					<th class="text-right" style="background-color: #d2d6de !important;">
						<span class="display_currency" data-currency_symbol="false">
							<?php echo e($totals['taxable_value']); ?>

						</span>
					</th>
					
					<!-- <td>&nbsp;</td> -->

					<?php if(!empty($receipt_details->table_tax_headings)): ?>
					<?php $__currentLoopData = $receipt_details->table_tax_headings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax_heading): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<th class="text-right" style="background-color: #d2d6de !important;">
							<span class="display_currency" data-currency_symbol="false">
							<?php echo e($totals[$tax_heading]); ?>

							</span>
						</th>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>

					<th class="text-right" style="background-color: #d2d6de !important;">
						<span class="display_currency" data-currency_symbol="false">
							<?php echo e($receipt_details->subtotal_unformatted); ?>

						</span>
					</th>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<div class="row invoice-info color-555" style="page-break-inside: avoid !important">
	<div class="col-md-6 invoice-col width-50">
		<table class="table table-condensed">
			<?php if(!empty($receipt_details->payments)): ?>
				<?php $__currentLoopData = $receipt_details->payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($payment['method']); ?></td>
						<td><?php echo e($payment['amount']); ?></td>
						<td><?php echo e($payment['date']); ?></td>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endif; ?>
		</table>
		<b class="pull-left">Authorized Signatory</b>
	</div>

	<div class="col-md-6 invoice-col width-50">
		<table class="table-no-side-cell-border table-no-top-cell-border width-100">
			<tbody>
				<tr class="color-555">
					<td style="width:50%">
						<?php echo $receipt_details->subtotal_label; ?>

					</td>
					<td class="text-right">
						<?php echo e($receipt_details->subtotal); ?>

					</td>
				</tr>
				
				<!-- Shipping Charges -->
				<?php if(!empty($receipt_details->shipping_charges)): ?>
					<tr class="color-555">
						<td style="width:50%">
							<?php echo $receipt_details->shipping_charges_label; ?>

						</td>
						<td class="text-right">
							<?php echo e($receipt_details->shipping_charges); ?>

						</td>
					</tr>
				<?php endif; ?>

				<!-- Discount -->
				<?php if( !empty($receipt_details->discount) ): ?>
					<tr class="color-555">
						<td>
							<?php echo $receipt_details->discount_label; ?>

						</td>

						<td class="text-right">
							(-) <?php echo e($receipt_details->discount); ?>

						</td>
					</tr>
				<?php endif; ?>

				<?php if(!empty($receipt_details->group_tax_details)): ?>
					<?php $__currentLoopData = $receipt_details->group_tax_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr class="color-555">
							<td>
								<?php echo $key; ?>

							</td>
							<td class="text-right">
								(+) <?php echo e($value); ?>

							</td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php else: ?>
					<?php if( !empty($receipt_details->tax) ): ?>
						<tr class="color-555">
							<td>
								<?php echo $receipt_details->tax_label; ?>

							</td>
							<td class="text-right">
								(+) <?php echo e($receipt_details->tax); ?>

							</td>
						</tr>
					<?php endif; ?>
				<?php endif; ?>
				
				
				<!-- Total -->
				<tr>
					<th style="background-color: #357ca5 !important; color: white !important" class="font-23 padding-10">
						<?php echo $receipt_details->total_label; ?>

					</th>
					<td class="text-right font-23 padding-10" style="background-color: #357ca5 !important; color: white !important">
						<?php echo e($receipt_details->total); ?>

					</td>
				</tr>
			</tbody>
        </table>
	</div>
</div>

<div class="row color-555">
	<div class="col-xs-6">
		<?php echo e($receipt_details->additional_notes); ?>

	</div>
</div>

<?php if($receipt_details->show_barcode): ?>
<br>
<div class="row">
		<div class="col-xs-12">
			<img class="center-block" src="data:image/png;base64,<?php echo e(DNS1D::getBarcodePNG($receipt_details->invoice_no, 'C128', 2,30,array(39, 48, 54), true)); ?>">
		</div>
</div>
<?php endif; ?>

<?php if(!empty($receipt_details->footer_text)): ?>
	<div class="row color-555">
		<div class="col-xs-12">
			<?php echo $receipt_details->footer_text; ?>

		</div>
	</div>
<?php endif; ?>

			</td>
		</tr>
	</tbody>
</table>