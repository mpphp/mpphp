<?php

return [
    'app' => [
        /*
        |--------------------------------------------------------------------------
        | Application Name
        |--------------------------------------------------------------------------
        |
        | This value is the name of your application. This value is used when the
        | framework needs to place the application's name in a notification or
        | any other location as required by the application or its packages.
        |
        */

        'name' => 'Micro Procedural PHP',

        /*
        |--------------------------------------------------------------------------
        | Application URL
        |--------------------------------------------------------------------------
        |
        | This URL is used by the console to properly generate URLs when using
        | the Artisan command line tool. You should set this to the root of
        | your application so that it is used when running Artisan tasks.
        |
        */

        'url' => 'http://localhost:4000',

        /*
        |--------------------------------------------------------------------------
        | Application Locale Configuration
        |--------------------------------------------------------------------------
        |
        | The application locale determines the default locale that will be used
        | by the translation service provider. You are free to set this value
        | to any of the locales which will be supported by the application.
        |
        */

        'locale' => 'en',

        /*
        |--------------------------------------------------------------------------
        | View Storage Paths
        |--------------------------------------------------------------------------
        |
        | Here you may specify a path that should be checked for your views. 
        |
        */
        
        'views' => MPPHP_ROOT . 'web/views',
    ]
];
