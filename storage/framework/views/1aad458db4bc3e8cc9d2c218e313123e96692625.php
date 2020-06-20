<div class="col-md-12">

	<form action="<?php echo e(action('\Modules\Superadmin\Http\Controllers\SubscriptionController@confirm', [$package->id])); ?>" method="POST">
		<!-- Note that the amount is in paise -->
		<script
		    src="https://checkout.razorpay.com/v1/checkout.js"
		    data-key="<?php echo e(env('RAZORPAY_KEY_ID')); ?>"
		    data-amount="<?php echo e($package->price*100); ?>"
		    data-buttontext="Pay with Razorpay"
		    data-name="<?php echo e(env('APP_NAME')); ?>"
		    data-description="<?php echo e($package->name); ?>"
		    data-theme.color="#3c8dbc"
		></script>
		<?php echo e(csrf_field()); ?>

		<input type="hidden" name="gateway" value="<?php echo e($k); ?>">
	</form>
</div>