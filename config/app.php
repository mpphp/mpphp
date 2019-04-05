<?php

return [
    'app' => [

        'database' => [
            /*
            |--------------------------------------------------------------------------
            | Default Database Connection Name
            |--------------------------------------------------------------------------
            |
            | Here you may specify which of the database connections below you wish
            | to use as your default connection for all database work. Of course
            | you may use many connections at once using the Database library.
            |
            */

            'default' => _env('DB_CONNECTION', 'mysql'),

            /*
            |--------------------------------------------------------------------------
            | Database Connections
            |--------------------------------------------------------------------------
            |
            | Here are each of the database connections setup for your application.
            | Of course, examples of configuring each database platform that is
            | supported by Laravel is shown below to make development simple.
            |
            |
            | All database work in Laravel is done through the PHP PDO facilities
            | so make sure you have the driver for your particular database of
            | choice installed on your machine before you begin development.
            |
            */

            'connections' => [
                //

                'mysql' => [
                    'host' => _env('DB_HOST', '127.0.0.1'),
                    'port' => _env('DB_PORT', '3306'),
                    'database' => _env('DB_DATABASE', 'mpphp'),
                    'username' => _env('DB_USERNAME', 'root'),
                    'password' => _env('DB_PASSWORD', ''),
                    'socket' => _env('DB_SOCKET', '')
                ],
            ],
        ],

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

        'name' => _env('APP_NAME', 'MpPHP'),

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

        'url' => _env('APP_URL', 'http://localhost:4000'),

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
        
        'views' => MPPHP_ROOT . 'resources/views',

        'session' => [

            /*
            |--------------------------------------------------------------------------
            | Session Lifetime
            |--------------------------------------------------------------------------
            |
            | Here you may specify the number of minutes that you wish the session
            | to be allowed to remain idle before it expires. If you want them
            | to immediately expire on the browser closing, set that option.
            |
            */

            'lifetime' => _env('SESSION_LIFETIME', 120),

            /*
            |--------------------------------------------------------------------------
            | Session Cookie Name
            |--------------------------------------------------------------------------
            |
            | Here you may change the name of the cookie used to identify a session
            | instance by ID. The name specified here will get used every time a
            | new session cookie is created by the framework for every driver.
            |
            */

            'cookie' => _env(
                'SESSION_COOKIE',
                _slug(_env('APP_NAME', 'MpPHP'), '_').'_session'
            ),

            /*
            |--------------------------------------------------------------------------
            | Session Cookie Path
            |--------------------------------------------------------------------------
            |
            | The session cookie path determines the path for which the cookie will
            | be regarded as available. Typically, this will be the root path of
            | your application but you are free to change this when necessary.
            |
            */

            'path' => '/',

            /*
            |--------------------------------------------------------------------------
            | Session Cookie Domain
            |--------------------------------------------------------------------------
            |
            | Here you may change the domain of the cookie used to identify a session
            | in your application. This will determine which domains the cookie is
            | available to in your application. A sensible default has been set.
            |
            */

            'domain' => _env('SESSION_DOMAIN', null),

            /*
            |--------------------------------------------------------------------------
            | HTTPS Only Cookies
            |--------------------------------------------------------------------------
            |
            | By setting this option to true, session cookies will only be sent back
            | to the server if the browser has a HTTPS connection. This will keep
            | the cookie from being sent to you if it can not be done securely.
            |
            */
        
            'secure' => _env('SESSION_SECURE_COOKIE', null),

            /*
            |--------------------------------------------------------------------------
            | HTTP Access Only
            |--------------------------------------------------------------------------
            |
            | Setting this value to true will prevent JavaScript from accessing the
            | value of the cookie and the cookie will only be accessible through
            | the HTTP protocol. You are free to modify this option if needed.
            |
            */
        
            'http_only' => true,
        ]
    ]
];
