<div id="preview_body">
<?php
	$loop_count = 0;
?>
<?php $__currentLoopData = $product_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<?php while($details['qty'] > 0): ?>
		<?php
			$loop_count += 1;
			$is_new_row = (!$barcode_details->is_continuous) && (($loop_count == 1) || ($loop_count % $barcode_details->stickers_in_one_row) == 1) ? true : false;
		?>

		<?php if(($barcode_details->is_continuous && $loop_count == 1) || (!$barcode_details->is_continuous && ($loop_count % $barcode_details->stickers_in_one_sheet) == 1)): ?>
			
			<div style="<?php if(!$barcode_details->is_continuous): ?> height:<?php echo e($barcode_details->paper_height); ?>in !important; <?php else: ?> height:100% !important; <?php endif; ?> width:<?php echo e($barcode_details->paper_width); ?>in !important; line-height: 16px !important;" class="label-border-outer">

			
			<div style="margin-top:<?php echo e($barcode_details->top_margin); ?>in !important; margin-bottom:<?php echo e($barcode_details->top_margin); ?>in !important; margin-left:<?php echo e($barcode_details->left_margin); ?>in !important;margin-right:<?php echo e($barcode_details->left_margin); ?>in !important;" class="label-border-internal">
		<?php endif; ?>

		<?php if((!$barcode_details->is_continuous) && ($loop_count % $barcode_details->stickers_in_one_sheet) <= $barcode_details->stickers_in_one_row): ?>
			<?php $first_row = true ?>
		<?php elseif($barcode_details->is_continuous && ($loop_count <= $barcode_details->stickers_in_one_row) ): ?>
			<?php $first_row = true ?>
		<?php else: ?>
			<?php $first_row = false ?>
		<?php endif; ?>

		<div style="height:<?php echo e($barcode_details->height); ?>in !important; line-height: <?php echo e($barcode_details->height); ?>in; width:<?php echo e($barcode_details->width*0.97); ?>in !important; display: inline-block; <?php if(!$is_new_row): ?> margin-left:<?php echo e($barcode_details->col_distance); ?>in !important; <?php endif; ?> <?php if(!$first_row): ?>margin-top:<?php echo e($barcode_details->row_distance); ?>in !important; <?php endif; ?>" class="sticker-border text-center">
		<div style="display:inline-block;vertical-align:middle;line-height:16px !important;">
			
			<?php if(!empty($print['business_name'])): ?>
				<b style="display: block !important" class="text-uppercase"><?php echo e($business_name); ?></b>
			<?php endif; ?>

			
			<?php if(!empty($print['name'])): ?>
				<span style="display: block !important">
					<?php echo e($details['details']->product_actual_name); ?>

				</span>
			<?php endif; ?>

			
			<?php if(!empty($print['variations']) && $details['details']->is_dummy != 1): ?>
				<span style="display: block !important">
					<b><?php echo e($details['details']->product_variation_name); ?></b>:<?php echo e($details['details']->variation_name); ?>

				</span>
				
			<?php endif; ?>

			
			<?php if(!empty($print['price'])): ?>
				<b>Price:</b>
				<span class="display_currency" data-currency_symbol = true>
					<?php if($print['price_type'] == 'inclusive'): ?>
						<?php echo e($details['details']->sell_price_inc_tax); ?>

					<?php else: ?>
						<?php echo e($details['details']->default_sell_price); ?>

					<?php endif; ?>
				</span>
			<?php endif; ?>


			
			<img class="center-block" style="max-width:90% !important;max-height: <?php echo e($barcode_details->height/4); ?>in !important; opacity: 0.9" src="data:image/png;base64,<?php echo e(DNS1D::getBarcodePNG($details['details']->sub_sku, $details['details']->barcode_type, 2,30,array(39, 48, 54), true)); ?>">

		</div>
		</div>

		<?php if(!$barcode_details->is_continuous && ($loop_count % $barcode_details->stickers_in_one_sheet) == 0): ?>
			
			</div>

			
			</div>
		<?php endif; ?>

		<?php
			$details['qty'] = $details['qty'] - 1;
		?>
	<?php endwhile; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php if($barcode_details->is_continuous || ($loop_count % $barcode_details->stickers_in_one_sheet) != 0): ?>
	
	</div>

	
	</div>
<?php endif; ?>

</div>

<style type="text/css">

	@media  print{
		#preview_body{
			display: block !important;
		}
	}
	@page  {
		size: <?php echo e($barcode_details->paper_width); ?>in <?php if($barcode_details->paper_height != 0): ?><?php echo e($barcode_details->paper_height); ?>in <?php endif; ?>;

		/*width: <?php echo e($barcode_details->paper_width); ?>in !important;*/
		/*height:<?php if($barcode_details->paper_height != 0): ?><?php echo e($barcode_details->paper_height); ?>in !important <?php else: ?> auto <?php endif; ?>;*/
		margin-top: 0in;
		margin-bottom: 0in;
		margin-left: 0in;
		margin-right: 0in;
		
		<?php if($barcode_details->is_continuous): ?>
			page-break-inside : avoid !important;
		<?php endif; ?>
	}
</style>