<?php

return [
    'view' => [

        'compile' => false,

        /*
        |--------------------------------------------------------------------------
        | Compiled View Path
        |--------------------------------------------------------------------------
        |
        | This option determines where all the compiled Blade templates will be
        | stored for your application. Typically, this is within the storage
        | directory. However, as usual, you are free to change this value.
        |
        */

        'compiled' => MPPHP_ROOT . 'storage/framework/views',

        /*
        |--------------------------------------------------------------------------
        | View Storage Paths
        |--------------------------------------------------------------------------
        |
        | Most templating systems load templates from disk. Here you may specify
        | an array of paths that should be checked for your views. Of course
        | the usual Laravel view path has already been registered for you.
        |
        */

        'paths' => [
            MPPHP_ROOT . 'resources/views'
        ],
    ]
];