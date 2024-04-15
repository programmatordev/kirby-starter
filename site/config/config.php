<?php

use Beebmx\KirbyEnv;
use Kirby\Cms\App as Kirby;

KirbyEnv::load('.');

return [
    'debug' => env('KIRBY_DEBUG', true),
    'languages' => true,
    'panel' => [
        'language' => 'en'
    ],
    'auth' => [
        'methods' => ['password', 'password-reset']
    ],
    'ready' => function(Kirby $kirby) {
        $user = $kirby->user();

        return [
            // show robots settings to admins only
            'tobimori.seo.robots.pageSettings' => $user?->isAdmin() ?? false,
            'tobimori.seo.robots.indicator' => $user?->isAdmin() ?? false
        ];
    }
];