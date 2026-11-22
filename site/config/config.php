<?php

use Beebmx\KirbyEnv;

KirbyEnv::load(dirname(__DIR__, 2));

return [
    'debug' => env('APP_DEBUG', true),
    'auth.methods' => ['password', 'password-reset'],
    'panel.language' => env('APP_PANEL_LANGUAGE', 'en'),
    'panel.menu' => require __DIR__ . '/panelMenu.php',
    'thumbs.format' => 'webp',

    // Kirby has no current language in single-language mode, so templates use this fallback.
    'app.language' => env('APP_LANGUAGE', 'en'),
    'arnoson.kirby-deploy.token' => env('DEPLOY_TOKEN'),
];
