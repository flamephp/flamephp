<?php

return [
    'context_path' => '/',
    'rewrite_on' => true,
    'rewrite_rule' => [
        '<app>/<c>/<a>' => '<app>/<c>/<a>',
        '<app>/<c>' => '<app>/<c>/index',
        '<app>' => '<app>/index/index',
    ],
    'default_app' => 'Web',
    'default_controller' => 'Index',
    'default_action' => 'index',
];
