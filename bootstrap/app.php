<?php

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new mpphp application instance
| which serves as the "glue" for all the components of mpphp, and is
| the IoC container for the system binding all of the various parts.
|
*/

$app = mpphp_application(
    // Register Configuration files.
    [
        require MPPHP_ROOT . 'config/app.php',
        require MPPHP_ROOT . 'config/view.php',
        //
    ],

    // Register Controller Locations.
    [
        MPPHP_ROOT . 'app/http/controllers/',
        //
    ],

    // Register Route files.
    [
        require MPPHP_ROOT . 'routes/web.php',
        //
    ],

    [
        require MPPHP_ROOT . 'app/http/kernel.php'
    ]
);

return $app;