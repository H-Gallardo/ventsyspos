<div class="col-md-12">
	<form action="<?php echo e(action('\Modules\Superadmin\Http\Controllers\SubscriptionController@confirm', [$package->id])); ?>" method="POST">
	 	<?php echo e(csrf_field()); ?>

	 	<input type="hidden" name="gateway" value="<?php echo e($k); ?>">
		<script
		        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
		        data-key="<?php echo e(env('STRIPE_PUB_KEY')); ?>"
		        data-amount="<?php echo e($package->price*100); ?>"
		        data-name="<?php echo e(env('APP_NAME')); ?>"
		        data-description="<?php echo e($package->name); ?>"
		        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
		        data-locale="auto"
		        data-currency="<?php echo e(strtolower($system_currency->code)); ?>">
		</script>
	</form>
</div>