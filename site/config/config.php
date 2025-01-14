<?php

use Beebmx\KirbyEnv;
use Kirby\Cms\App;

KirbyEnv::load('.');

return [
    'debug' => env('APP_DEBUG', true),
    'auth' => [
        'methods' => ['password', 'password-reset']
    ],
    'panel' => [
        'language' => env('APP_PANEL_LANGUAGE', 'en')
    ],
    'tobimori.seo' => [
        'lang' => env('APP_LANGUAGE', 'en')
    ],
    'zephir.cookieconsent' => [
        'cdn' => true,
        'language' => [
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
    'hooks' => [
        'page.update:after' => function() {
            /** @var App $this */
            $debug = $this->option('debug');

            if ($debug && $this->user()->isAdmin()) {
                // improve when command is executed
                // ideally, it should execute only when a blueprint has been changed
                shell_exec('~/.composer/vendor/bin/kirby types:create --force');
            }
        }
    ],
    'ready' => function(App $kirby) {
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