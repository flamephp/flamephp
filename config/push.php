<?php

return [
    'server' => [
        'listen' => 'websocket://127.0.0.1:2347',
        'count' => 1,
        'reloadable' => false,
    ],
    'api' => 'http://127.0.0.1:2348', // 服务端推送地址
    'app_key' => env('PUSH_APP_KEY', 'abc'),
    'app_secret' => env('PUSH_APP_SECRET', '123456'),
    'auth' => env('APP_URL').'/api/common/push/auth',
    'channel_hook' => env('APP_URL').'/api/common/push/hook',
];
