<?php

	$random_reference = Pesapal::random_reference();
	session(['pesapal' => ['ref' => $random_reference, 'package_id' => $package->id]]);

	$details = [
	        'amount' => $package->price,
	        'description' => $package->name,
	        'type' => 'MERCHANT',
	        'first_name' => $user['first_name'],
	        'last_name' => $user['last_name'],
	        'email' => $user['email'],
	        'phonenumber' => '',
	        'height' => '400px',
	        'reference' => $random_reference,
    	];
    $iframe = Pesapal::makePayment($details);
?>

<div class="col-md-12">
	<?php echo $iframe; ?>

</div>