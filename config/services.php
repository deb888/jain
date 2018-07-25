<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
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

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'paypal' => [
    'client_id' => 'Afk0qBX6kjrnuoM3GYslOC4RBRmP4k0Pubmlryqb8mGtk_GfjqmQallVyv3vb4RG-64kxuyjZOuPVieJ',
    'secret' => 'EFjEF8YLdmvoUKzoiE7Riy58PRgtvhUVViD8tNwx528QonTU1kX73XteTDJwZ401kRHmO8xU_4q3-tQ6'
],
];
