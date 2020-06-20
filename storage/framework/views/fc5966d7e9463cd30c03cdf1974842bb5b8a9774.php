<!-- business information here -->

<div class="row">

	<!-- Logo -->
	<?php if(!empty($receipt_details->logo)): ?>
		<img src="<?php echo e($receipt_details->logo); ?>" class="img img-responsive center-block">
	<?php endif; ?>

	<!-- Header text -->
	<?php if(!empty($receipt_details->header_text)): ?>
		<div class="col-xs-12">
			<?php echo $receipt_details->header_text; ?>

		</div>
	<?php endif; ?>

	<!-- business information here -->
	<div class="col-xs-12 text-center">
		<h2 class="text-center">
			<!-- Shop & Location Name  -->
			<?php if(!empty($receipt_details->display_name)): ?>
				<?php echo e($receipt_details->display_name); ?>

			<?php endif; ?>
		</h2>

		<!-- Address -->
		<p>
		<?php if(!empty($receipt_details->address)): ?>
				<small class="text-center">
				<?php echo $receipt_details->address; ?>

				</small>
		<?php endif; ?>
		<?php if(!empty($receipt_details->contact)): ?>
			<br/><?php echo e($receipt_details->contact); ?>

		<?php endif; ?>	
		<?php if(!empty($receipt_details->contact) && !empty($receipt_details->website)): ?>
			, 
		<?php endif; ?>
		<?php if(!empty($receipt_details->website)): ?>
			<?php echo e($receipt_details->website); ?>

		<?php endif; ?>
		<?php if(!empty($receipt_details->location_custom_fields)): ?>
			<br><?php echo e($receipt_details->location_custom_fields); ?>

		<?php endif; ?>
		</p>
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
		<p>
		<?php if(!empty($receipt_details->tax_info1)): ?>
			<b><?php echo e($receipt_details->tax_label1); ?></b> <?php echo e($receipt_details->tax_info1); ?>

		<?php endif; ?>

		<?php if(!empty($receipt_details->tax_info2)): ?>
			<b><?php echo e($receipt_details->tax_label2); ?></b> <?php echo e($receipt_details->tax_info2); ?>

		<?php endif; ?>
		</p>

		<!-- Title of receipt -->
		<?php if(!empty($receipt_details->invoice_heading)): ?>
			<h3 class="text-center">
				<?php echo $receipt_details->invoice_heading; ?>

			</h3>
		<?php endif; ?>

		<!-- Invoice  number, Date  -->
		<p style="width: 100% !important" class="word-wrap">
			<span class="pull-left text-left word-wrap">
				<?php if(!empty($receipt_details->invoice_no_prefix)): ?>
					<b><?php echo $receipt_details->invoice_no_prefix; ?></b>
				<?php endif; ?>
				<?php echo e($receipt_details->invoice_no); ?>


				<!-- Table information-->
		        <?php if(!empty($receipt_details->table_label) || !empty($receipt_details->table)): ?>
		        	<br/>
					<span class="pull-left text-left">
						<?php if(!empty($receipt_details->table_label)): ?>
							<b><?php echo $receipt_details->table_label; ?></b>
						<?php endif; ?>
						<?php echo e($receipt_details->table); ?>


						<!-- Waiter info -->
					</span>
		        <?php endif; ?>

				<!-- customer info -->
				<?php if(!empty($receipt_details->customer_info)): ?>
					<br/>
					<b><?php echo e($receipt_details->customer_label); ?></b> <?php echo $receipt_details->customer_info; ?>

				<?php endif; ?>
				<?php if(!empty($receipt_details->client_id_label)): ?>
					<br/>
					<b><?php echo e($receipt_details->client_id_label); ?></b> <?php echo e($receipt_details->client_id); ?>

				<?php endif; ?>
				<?php if(!empty($receipt_details->customer_tax_label)): ?>
					<br/>
					<b><?php echo e($receipt_details->customer_tax_label); ?></b> <?php echo e($receipt_details->customer_tax_number); ?>

				<?php endif; ?>
				<?php if(!empty($receipt_details->customer_custom_fields)): ?>
					<br/><?php echo $receipt_details->customer_custom_fields; ?>

				<?php endif; ?>
				<?php if(!empty($receipt_details->sales_person_label)): ?>
					<br/>
					<b><?php echo e($receipt_details->sales_person_label); ?></b> <?php echo e($receipt_details->sales_person); ?>

				<?php endif; ?>
			</span>

			<span class="pull-right">
				<b><?php echo e($receipt_details->date_label); ?></b> <?php echo e($receipt_details->invoice_date); ?>

				
				<!-- Waiter info -->
				<?php if(!empty($receipt_details->service_staff_label) || !empty($receipt_details->service_staff)): ?>
		        	<br/>
					<?php if(!empty($receipt_details->service_staff_label)): ?>
						<b><?php echo $receipt_details->service_staff_label; ?></b>
					<?php endif; ?>
					<?php echo e($receipt_details->service_staff); ?>

		        <?php endif; ?>
			</span>
		</p>
	</div>
	<!-- /.col -->
</div>


<div class="row">
	<div class="col-xs-12">
		<br/><br/>
		<table class="table table-responsive">
			<thead>
				<tr>
					<th><?php echo e($receipt_details->table_product_label); ?></th>
					<th><?php echo e($receipt_details->table_qty_label); ?></th>
					<th><?php echo e($receipt_details->table_unit_price_label); ?></th>
					<th><?php echo e($receipt_details->table_subtotal_label); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php $__empty_1 = true; $__currentLoopData = $receipt_details->lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
					<tr>
						<td style="word-break: break-all;">
                            <?php echo e($line['name']); ?> <?php echo e($line['variation']); ?> 
                            <?php if(!empty($line['sub_sku'])): ?>, <?php echo e($line['sub_sku']); ?> <?php endif; ?> <?php if(!empty($line['brand'])): ?>, <?php echo e($line['brand']); ?> <?php endif; ?> <?php if(!empty($line['cat_code'])): ?>, <?php echo e($line['cat_code']); ?><?php endif; ?>
                            <?php if(!empty($line['sell_line_note'])): ?>(<?php echo e($line['sell_line_note']); ?>) <?php endif; ?> 
                            <?php if(!empty($line['lot_number'])): ?><br> <?php echo e($line['lot_number_label']); ?>:  <?php echo e($line['lot_number']); ?> <?php endif; ?> 
                            <?php if(!empty($line['product_expiry'])): ?>, <?php echo e($line['product_expiry_label']); ?>:  <?php echo e($line['product_expiry']); ?> <?php endif; ?> 
                        </td>
						<td><?php echo e($line['quantity']); ?> <?php echo e($line['units']); ?> </td>
						<td><?php echo e($line['unit_price_inc_tax']); ?></td>
						<td><?php echo e($line['line_total']); ?></td>
					</tr>
					<?php if(!empty($line['modifiers'])): ?>
						<?php $__currentLoopData = $line['modifiers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modifier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td>
		                            <?php echo e($modifier['name']); ?> <?php echo e($modifier['variation']); ?> 
		                            <?php if(!empty($modifier['sub_sku'])): ?>, <?php echo e($modifier['sub_sku']); ?> <?php endif; ?> <?php if(!empty($modifier['cat_code'])): ?>, <?php echo e($modifier['cat_code']); ?><?php endif; ?>
		                            <?php if(!empty($modifier['sell_line_note'])): ?>(<?php echo e($modifier['sell_line_note']); ?>) <?php endif; ?> 
		                        </td>
								<td><?php echo e($modifier['quantity']); ?> <?php echo e($modifier['units']); ?> </td>
								<td><?php echo e($modifier['unit_price_inc_tax']); ?></td>
								<td><?php echo e($modifier['line_total']); ?></td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
					<tr>
						<td colspan="4">&nbsp;</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>

<div class="row">
	<br/>
	<div class="col-md-12"><hr/></div>
	<br/>


	<div class="col-xs-6">

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

			<!-- Total Paid-->
			<?php if(!empty($receipt_details->total_paid)): ?>
				<tr>
					<th>
					&nbsp;
					</th>
					<th>
						<?php echo $receipt_details->total_paid_label; ?>

					</th>
					<td>
						<?php echo e($receipt_details->total_paid); ?>

					</td>
				</tr>
			<?php endif; ?>

			<!-- Total Due-->
			<?php if(!empty($receipt_details->total_due)): ?>
			<tr>
				<th>
					<?php echo $receipt_details->total_due_label; ?>

				</th>
				<td>
					<?php echo e($receipt_details->total_due); ?>

				</td>
			</tr>
			<?php endif; ?>
		</table>

		<?php echo e($receipt_details->additional_notes); ?>

	</div>

	<div class="col-xs-6">
        <div class="table-responsive">
          	<table class="table">
				<tbody>
					<tr>
						<th style="width:70%">
							<?php echo $receipt_details->subtotal_label; ?>

						</th>
						<td>
							<?php echo e($receipt_details->subtotal); ?>

						</td>
					</tr>
					
					<!-- Shipping Charges -->
					<?php if(!empty($receipt_details->shipping_charges)): ?>
						<tr>
							<th style="width:70%">
								<?php echo $receipt_details->shipping_charges_label; ?>

							</th>
							<td>
								<?php echo e($receipt_details->shipping_charges); ?>

							</td>
						</tr>
					<?php endif; ?>

					<!-- Discount -->
					<?php if( !empty($receipt_details->discount) ): ?>
						<tr>
							<th>
								<?php echo $receipt_details->discount_label; ?>

							</th>

							<td>
								(-) <?php echo e($receipt_details->discount); ?>

							</td>
						</tr>
					<?php endif; ?>

					<!-- Tax -->
					<?php if( !empty($receipt_details->tax) ): ?>
						<tr>
							<th>
								<?php echo $receipt_details->tax_label; ?>

							</th>
							<td>
								(+) <?php echo e($receipt_details->tax); ?>

							</td>
						</tr>
					<?php endif; ?>

					<!-- Total -->
					<tr>
						<th>
							<?php echo $receipt_details->total_label; ?>

						</th>
						<td>
							<?php echo e($receipt_details->total); ?>

						</td>
					</tr>
				</tbody>
        	</table>
        </div>
    </div>
</div>

<?php if($receipt_details->show_barcode): ?>
	<div class="row">
		<div class="col-xs-12">
			
			<img class="center-block" src="data:image/png;base64,<?php echo e(DNS1D::getBarcodePNG($receipt_details->invoice_no, 'C128', 2,30,array(39, 48, 54), true)); ?>">
		</div>
	</div>
<?php endif; ?>

<?php if(!empty($receipt_details->footer_text)): ?>
	<div class="row">
		<div class="col-xs-12">
			<?php echo $receipt_details->footer_text; ?>

		</div>
	</div>
<?php endif; ?>