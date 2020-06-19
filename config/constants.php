<?php

return [
    
     /*
    |--------------------------------------------------------------------------
    | App Constants
    |--------------------------------------------------------------------------
    |List of all constants for the app
    */

    'langs' => [
        'en' => ['full_name' => 'English', 'short_name' => 'English'],
        'es' => ['full_name' => 'Spanish - Español', 'short_name' => 'Spanish'],
        'sq' => ['full_name' => 'Albanian - Shqip', 'short_name' => 'Albanian'],
        'hi' => ['full_name' => 'Hindi - हिंदी', 'short_name' => 'Hindi'],
        'nl' => ['full_name' => 'Dutch', 'short_name' => 'Dutch'],
        'fr' => ['full_name' => 'French - Français', 'short_name' => 'French'],
        'de' => ['full_name' => 'German - Deutsch', 'short_name' => 'German'],
        'ar' => ['full_name' => 'Arabic - العَرَبِيَّة', 'short_name' => 'Arabic'],
        'tr' => ['full_name' => 'Turkish - Türkçe', 'short_name' => 'Turkish'],
    ],

    'langs_rtl' => ['ar'],
    
    'document_size_limit' => '1000000', //in Bytes,

    'asset_version' => 31,

    'disable_expiry' => false,

    'disable_purchase_in_other_currency' => true,
    
    'iraqi_selling_price_adjustment' => false,

    'currency_precision' => 2,

    'product_img_path' => 'img',

    'image_size_limit' => '500000', //in Bytes

    'enable_custom_payment_1' => true,

    'enable_custom_payment_2' => false,

    'enable_custom_payment_3' => false,

    'enable_sell_in_diff_currency' => false,
    'currency_exchange_rate' => 1,
];
