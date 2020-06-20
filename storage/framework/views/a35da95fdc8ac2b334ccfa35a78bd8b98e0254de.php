<!-- Page level currency setting -->
<?php if(!empty($__system_currency)): ?>
	<input type="hidden" id="p_code" value="<?php echo e($__system_currency->code); ?>">
	<input type="hidden" id="p_symbol" value="<?php echo e($__system_currency->symbol); ?>">
	<input type="hidden" id="p_thousand" value="<?php echo e($__system_currency->thousand_separator); ?>">
	<input type="hidden" id="p_decimal" value="<?php echo e($__system_currency->decimal_separator); ?>">
<?php endif; ?>