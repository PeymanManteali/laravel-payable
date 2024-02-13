<?php

/*
 * You can place your custom package configuration in here.
 */
return [
    'payment' => [
        'tax' => env('PAYMENT_DEFAULT_TAX',0),
        'generalDiscount' => env('PAYMENT_GENERAL_DISCOUNT',0),
    ],

    'cafebazaar' => [
        // From Cafebazaar Account
        "package_id" => env('CAFEBAZAAR_PACKAGE_ID'),

        // Replace your grant_type
        "grant_type" => env('CAFEBAZAAR_GRANT_TYPE','authorization_code'),

        // Replace your client_id
        "client_id" => env('CAFEBAZAAR_CLIENT_ID'),

        // Replace your client_secret
        "client_secret" => env('CAFEBAZAAR_CLIENT_SECRET'),

        // Replace your redirect_uri
        "redirect_uri" => env('CAFEBAZAAR_REDIRECT_URI'),
    ]
];
