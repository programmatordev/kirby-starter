<?php

use Beebmx\KirbyEnv;
use Kirby\Cms\App as Kirby;
use Kirby\Cms\Page;

KirbyEnv::load('.');

return [
    'debug' => env('KIRBY_DEBUG', true),
    'languages' => true,
    'auth' => [
        'methods' => ['password', 'password-reset']
    ],
    'hooks' => [
        'page.update:after' => function (Page $newPage, Page $oldPage) {
            /** @var Kirby $kirby */
            $kirby = $this;
            $debug = $kirby->option('debug');

            if ($debug === true) {
                // improve when command is executed
                // ideally, it should execute only when a blueprint has been changed
                \shell_exec('~/.composer/vendor/bin/kirby types:create --force');
            }
        }
    ],
    'treast.debugbar' => [
        'tabs' => [
            // temporarily disabled because of incompatibility with kirby-seo plugin sitemap
            'files' => false
        ]
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