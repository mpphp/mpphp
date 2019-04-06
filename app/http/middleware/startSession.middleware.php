<?php

// This file is used inside of the router function which
// does not have the $app variable in its scope.
// So we call it here and not in the router function 
// mainly to avoid a "Cannot start session when headers already sent" error.
global $app;

// Start the session.
_session_start(
    $app['configs']['app']['session']['cookie'],
    $app['configs']['app']['session']['lifetime'],
    $app['configs']['app']['session']['path'],
    $app['configs']['app']['session']['domain'],
    $app['configs']['app']['session']['secure'],
    $app['configs']['app']['session']['http_only']
);