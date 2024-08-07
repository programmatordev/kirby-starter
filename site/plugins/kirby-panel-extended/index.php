<?php

use Kirby\Cms\App as Kirby;

Kirby::plugin('programmatordev/panel-extended', [
    // register translations based on language files in the site/translations directory
    'translations' => A::keyBy(
        A::map(
            // get all language files
            Dir::read($dir = dirname(__DIR__, 2) . '/translations'),
            // create array with lang value and translation content
            fn ($file) => A::merge(
                ['lang' => F::name($file)],
                Yaml::decode(F::read($dir . '/' . $file))
            )
        ),
        'lang'
    )
]);