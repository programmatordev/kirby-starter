<?php

use Beebmx\KirbyEnv;
use Kirby\Cms\App;
use KirbyStarter\PanelHelper;

KirbyEnv::load('.');

return [
    'debug' => env('APP_DEBUG', true),
    'auth.methods' => ['password', 'password-reset'],
    'panel.language' => env('APP_PANEL_LANGUAGE', 'en'),
    'panel.menu' => [
        'site' => ['current' => fn() => PanelHelper::isCurrentPage('site')],
        'languages',
        'users',
        'system',
        'analytics' => PanelHelper::buildMenuPage('chart', 'analytics.page.title', 'pages/analytics')
    ],
    'thumbs.format' => 'webp',
    'tobimori.seo.lang' => env('APP_LANGUAGE', 'en'),
    'ready' => function(App $kirby) {
        $user = $kirby->user();
        $isAdmin = $user?->isAdmin() ?? false;

        return [
            // show robots settings to admins only
            'tobimori.seo.robots.pageSettings' => $isAdmin,
            'tobimori.seo.robots.indicator' => $isAdmin
        ];
    },
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
    ]
];