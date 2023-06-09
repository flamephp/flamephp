<?php

return [
    // 默认缓存驱动
    'default' => env('CACHE_DRIVER', 'redis'),
    // 缓存连接方式配置
    'redis' => [
        'cache_type' => 'RedisCache',
        'host' => env('REDIS_HOST', '127.0.0.1'),
        'password' => env('REDIS_PASSWORD'),
        'port' => env('REDIS_PORT', '6379'),
        'database' => env('REDIS_DB', '0'),
    ],
];
