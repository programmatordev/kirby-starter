<?php

use Kirby\Cms\App;
use Kirby\Cms\Page;

App::plugin('programmatordev/site-extended', [
    'siteMethods' => [
        'analyticsPage' => function(): Page {
            return page('analytics');
        }
    ]
]);