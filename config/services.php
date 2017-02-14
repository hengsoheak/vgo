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
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],
    'facebook' => [
        'client_id' => '90205237294-l8sko5f8nctokmldut73ipsrku3kns6e.apps.googleusercontent.com',
        'client_secret' => 'ay-DMR-rh3cWvvPl3lQDCMx5',
        'redirect' => 'http://camvgo.com/callback/google',
    ],
    'google' => [
        'client_id' => '90205237294-l8sko5f8nctokmldut73ipsrku3kns6e.apps.googleusercontent.com',
        'client_secret' => 'ay-DMR-rh3cWvvPl3lQDCMx5',
        'redirect' => 'http://camvgo.com/callback/google',
    ],
    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

];
