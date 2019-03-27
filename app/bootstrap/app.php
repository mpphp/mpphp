<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Register Configuration files.
    |--------------------------------------------------------------------------
    |
    |
    */

    'configs' => _merge_recursive([
        require MPPHP_ROOT . 'app/config/app.php',
    ]),

    /*
    |--------------------------------------------------------------------------
    | Register Controller Locations.
    |--------------------------------------------------------------------------
    |
    |
    */

    'controllers' => [
        MPPHP_ROOT . 'src/controllers/',
        //
    ],

    /*
    |--------------------------------------------------------------------------
    | Register Route files.
    |--------------------------------------------------------------------------
    |
    |
    */
    
    'routes' => _merge_recursive([
        require MPPHP_ROOT . 'src/routes.php',
        //
    ])
];