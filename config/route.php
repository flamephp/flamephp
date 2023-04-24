<?php

return [
    'context_path' => '/api/',
    'rewrite_on' => true,
    'rewrite_rule' => [
        '<app>/<c>/<a>' => '<app>/<c>/<a>',
        '<app>/<c>' => '<app>/<c>/index',
        '<app>' => '<app>/index/index',
    ],
    'default_app' => 'index',
    'default_controller' => 'Index',
    'default_action' => 'index',
];
