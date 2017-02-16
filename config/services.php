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
        'client_id' => '102782740235682',
        'client_secret' => '4ef4cebe7e4648aae71c624e7d45c481',
        'redirect' => 'http://camvgo.com/callback/facebook',
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
    'twitter' => [
        'client_id' => '96XRrvkPk0EKb0JJJtJVtMjSd',
        'client_secret' => '519akawAj4PZTWE4RfgOgiFY6z53pvqFVmpNddshypKwzJTO5T',
        'redirect' => 'http://camvgo.com/callback/twitter',
    ],
    'linkedin' => [
        'client_id' => '81e08f89cqv33m',
        'client_secret' => 'UHJzfdd8QVgMuZHO',
        'redirect' => 'http://camvgo.com/callback/linkedin',
    ],

];
