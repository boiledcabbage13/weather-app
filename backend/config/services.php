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

    'weather' => [
        'open_weather_map' => [
            'key' => env('OPEN_WEATHER_MAP_APP_KEY'),
            'one_location_url' => 'api.openweathermap.org/data/2.5/weather',
            'one_call_url' => 'api.openweathermap.org/data/2.5/onecall'
        ],
        'foursquare' => [
            'key' => env('FOURSQUARE_CLIENT_ID'),
            'secret' => env('FOURSQUARE_CLIENT_SECRET'),
            'venue_category_url' => 'api.foursquare.com/v2/venues/categories',
            'expore_url' => 'api.foursquare.com/v2/venues/explore'
        ]
    ]

];
