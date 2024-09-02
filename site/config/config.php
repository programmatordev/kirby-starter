<?php

use Beebmx\KirbyEnv;
use Kirby\Cms\App as Kirby;

KirbyEnv::load('.');

return [
    'debug' => env('APP_DEBUG', true),
    'auth' => [
        'methods' => ['password', 'password-reset']
    ],
    'panel' => [
        // it is used before a user logs in or when it does not have a valid language configured
        'language' => env('APP_PANEL_LANGUAGE', 'en')
    ],
    'tobimori.seo' => [
        // is applied to the lang attribute of the <html> tag in a single-language setup
        // in case the setup has multiple languages, the locale string configured in them will be used instead
        'lang' => env('APP_LANGUAGE', 'en')
    ],
    'zephir.cookieconsent' => [
        'cdn' => true,
        'language' => [
            // in case the setup has multiple languages, the locale string configured in them will be used instead
            'locale' => env('APP_LANGUAGE', 'en')
        ],
        'categories' => [
            'measurement' => env('CONSENT_GOOGLE_TRACKING_ID') ? [] : false,
            'functionality' => false,
            'experience' => false,
            'marketing' => env('CONSENT_GOOGLE_TRACKING_ID') ? [] : false
        ],
        'guiOptions' => [
            'consentModal' => [
                'layout' => 'box wide'
            ]
        ]
    ],
    'treast.debugbar' => [
        'tabs' => [
            // temporarily disabled because of incompatibility with kirby-seo plugin sitemap
            'files' => false
        ]
    ],
    'hooks' => [
        'page.update:after' => function() {
            /** @var Kirby $kirby */
            $kirby = $this;
            $debug = $kirby->option('debug');

            if ($debug && $kirby->user()->isAdmin()) {
                // improve when command is executed
                // ideally, it should execute only when a blueprint has been changed
                shell_exec('~/.composer/vendor/bin/kirby types:create --force');
            }
        }
    ],
    'ready' => function(Kirby $kirby) {
        $user = $kirby->user();
        $isAdmin = $user?->isAdmin() ?? false;

        return [
            'tobimori.seo' => [
                'robots' => [
                    // show robots settings to admins only
                    'pageSettings' => $isAdmin,
                    'indicator' => $isAdmin
                ]
            ]
        ];
    }
];