<?php

return [
    'context_path' => '/',
    'rewrite_on' => true,
    'rewrite_rule' => [
        '<app>/<c>/<a>' => '<app>/<c>/<a>',
        '<c>/<a>' => 'index/<c>/<a>',
        '<c>' => 'index/<c>/index',
    ],
    'default_app' => 'Index',
    'default_controller' => 'Index',
    'default_action' => 'index',
];
