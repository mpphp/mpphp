<?php

function _env($key, $default) {
    $vars = [
        'APP_NAME'              => 'MpPHP',
        'APP_URL'               => 'http://localhost:4000',

        'SESSION_LIFETIME'      => 120,

        'DB_CONNECTION'         => 'mysql',
        'DB_HOST'               => '127.0.0.1',
        'DB_PORT'               => '3306',
        'DB_DATABASE'           => 'mpphp',
        'DB_USERNAME'           => 'root',
        'DB_PASSWORD'           => '',
        'DB_SOCKET'             => ''
    ];

    return _get($vars, $key, $default);
}
