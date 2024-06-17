<?php

use Beebmx\KirbyEnv;
use Kirby\Cms\App as Kirby;
use Kirby\Cms\Page;

KirbyEnv::load('.');

return [
    'debug' => env('KIRBY_DEBUG', true),
    'auth' => [
        'methods' => ['password', 'password-reset']
    ],
    'panel' => [
        // it is used before a user logs in or when it does not have a valid language configured
        'language' => env('KIRBY_PANEL_LANGUAGE', 'en')
    ],
    'tobimori.seo' => [
        // is applied to the lang attribute of the <html> tag in a single-language setup
        // in case the setup has multiple languages, the locale string configured in them will be used instead
        'lang' => env('DEFAULT_LANGUAGE', 'en')
    ],
    'treast.debugbar' => [
        'tabs' => [
            // temporarily disabled because of incompatibility with kirby-seo plugin sitemap
            'files' => false
        ]
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
    'ready' => function(Kirby $kirby) {
        $user = $kirby->user();

        return [
            'tobimori.seo' => [
                'robots' => [
                    // show robots settings to admins only
                    'pageSettings' => $user?->isAdmin() ?? false,
                    'indicator' => $user?->isAdmin() ?? false
                ]
            ]
        ];
    }
];