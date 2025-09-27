<?php

use Beebmx\KirbyEnv;

KirbyEnv::load('.');

return [
    'debug' => env('APP_DEBUG', true),
    'auth.methods' => ['password', 'password-reset'],
    'panel.language' => env('APP_PANEL_LANGUAGE', 'en'),
    'panel.menu' => require __DIR__ . '/panelMenu.php',
    'thumbs.format' => 'webp',
    'tobimori.seo.locale' => env('APP_LANGUAGE', 'en'),
    'tobimori.seo.sitemap.excludeTemplates' => ['error'],
    'ready' => require __DIR__ . '/ready.php',
    'hooks' => require __DIR__ . '/hooks.php',
];