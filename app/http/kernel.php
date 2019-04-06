<?php

return [
    'web' => [
        'beforeMiddleware' => [
            __DIR__ . '/middleware/startSession.middleware.php'
        ],

        'afterMiddleware' => [
            __DIR__ . '/middleware/clearFlashData.middleware.php'
        ]
    ]
];