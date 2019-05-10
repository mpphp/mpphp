<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by MpPPH Router within a group which.
|
*/

return [
    'web' => [
        // Route "/index"
        'index' => ['view' => ['welcome.phtml']],

        // Route "/page-not-found"
        'page-not-found' => ['view' => ['404.phtml']],

        // Route "/home"
        'home' => [
            'controller'    => 'home',
            'middleware'    => [
                'before' => [
                    MPPHP_ROOT . 'app/http/middleware/authentication.middleware.php'
                ]
            ]
        ],

        // Route "/login"
        'logout' => [
            'controller' => 'auth/login',
            'action' => 'logout',
            'middleware'    => [
                'before' => [
                    MPPHP_ROOT . 'app/http/middleware/authentication.middleware.php'
                ]
            ]
        ],

        // Route "/register"
        'register' => [
            'controller' => 'auth/register',
            'action' => _request_action([
                'GET' => 'showRegistrationForm',
                'POST' => 'register'
            ]),
            'middleware'    => [
                'before' => [
                    MPPHP_ROOT . 'app/http/middleware/guest.middleware.php',
                    MPPHP_ROOT . 'app/http/middleware/connectDatabase.middleware.php'
                ],

                'after' => [
                    MPPHP_ROOT . 'app/http/middleware/disconnectDatabase.middleware.php'
                ]
            ]
        ],

        // Route "/login"
        'login' => [
            'controller' => 'auth/login',
            'action' => _request_action([
                'GET' => 'showLoginForm',
                'POST' => 'login'
            ]),
            'middleware'    => [
                'before' => [
                    MPPHP_ROOT . 'app/http/middleware/guest.middleware.php',
                    MPPHP_ROOT . 'app/http/middleware/connectDatabase.middleware.php'
                ],

                'after' => [
                    MPPHP_ROOT . 'app/http/middleware/disconnectDatabase.middleware.php'
                ]
            ]
        ]
    ]
];
