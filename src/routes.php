<?php

return [
    // Route "/index"
    'index' => [
        'controller'    => 'index',
        'action'        => 'index'
    ],

    // Route "/page-not-found"
    'page-not-found' => [
        'controller'    => 'error',
        'action'        => 'pageNotFound'
    ]
];