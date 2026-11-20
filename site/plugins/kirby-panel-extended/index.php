<?php

use Kirby\Cms\App;

App::plugin('programmatordev/panel-extended', [
    'options' => require __DIR__ . '/options.php',
    'areas' => require __DIR__ . '/areas.php',
    'fields' => require __DIR__ . '/fields.php',
    'translations' => require __DIR__ . '/translations.php',
]);
