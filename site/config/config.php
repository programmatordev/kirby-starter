<?php

use Beebmx\KirbyEnv;

KirbyEnv::load('.');

return [
    'debug' => env('KIRBY_DEBUG', true),
    'languages' => true,
    'panel' => [
        'language' => 'en'
    ],
    'auth' => [
        'methods' => ['password', 'password-reset']
    ]
];