<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],


    'google' => [
        'client_id' => '1017454897078-pl09qa6hqi42esqdeqi64ibqal6io6mp.apps.googleusercontent.com',
        'client_secret' => '8n8jCGZazTXhxmItroQZKD_Z',
        'redirect' => '/auth/google/callback',
    ],

    'facebook' => [
    'client_id' => '2237705199779361',
    'client_secret' => '5756e7d3a7c7a0119097dfd0e1eca519',
    'redirect' => '/auth/facebook/callback',
],
];
