<?php

use Beebmx\KirbyEnv;

KirbyEnv::load(dirname(__DIR__, 2));

$config = [
    'debug' => env('APP_DEBUG', true),
    'auth.methods' => ['password', 'password-reset'],
    'panel.language' => env('APP_PANEL_LANGUAGE', 'en'),
    // Installed Panel plugins do not require runtime template compilation.
    'panel.vue.compiler' => false,
    'panel.menu' => require __DIR__ . '/panelMenu.php',
    'thumbs.format' => 'webp',

    // Kirby has no current language in single-language mode, so templates use this fallback.
    'app.language' => env('APP_LANGUAGE', 'en'),
    'arnoson.kirby-deploy.token' => env('DEPLOY_TOKEN'),
];

// Keep Kirby bootable for the generator and preserve its fallbacks until secrets exist.
$contentSalt = env('APP_CONTENT_SALT');
$cookieKey = env('APP_COOKIE_KEY');

if (is_string($contentSalt) && empty($contentSalt) === false) {
    $config['content.salt'] = $contentSalt;
}

if (is_string($cookieKey) && empty($cookieKey) === false) {
    $config['cookie.key'] = $cookieKey;
}

return $config;
