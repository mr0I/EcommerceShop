<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'google' => [
        'client_id' => '533264578272-d1g9usqhssfge21glr9dav19pklvgcoi.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => url('/') . 'auth/google/callback',
    ],
    'github' => [
        'client_id' => '7ea92b2041a5d281dca5',
        'client_secret' => 'ff19f2a5774ed922e9d6290c6462c7b3c414545a',
        'redirect' => url('/') . 'auth/github/callback',
    ]

];
