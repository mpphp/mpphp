<?php

/**
 * MpPHP - Micro Procedural PHP Framework
 *
 * @package  MpPHP
 * @author   Anitche Chisom <anitchec.dev@gmail.com>
 */

 
define('MPPHP_ROOT', __DIR__. '/../');

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our files later on. It feels great to relax.
|
*/

require MPPHP_ROOT . 'vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Connect to the bootstrap file
|--------------------------------------------------------------------------
|
| This gives us a single entry point into our entire application.
|
*/

$app = require MPPHP_ROOT . 'bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the router, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

_router($app['routes'], $app['controllers']);