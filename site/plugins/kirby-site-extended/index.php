<?php

use Kirby\Cms\App;

App::plugin('programmatordev/site-extended', [
    'siteMethods' => [
        'trackers' => function(): array {
            $trackersPage = page('trackers');

            return [
                'googleAnalyticsId' => $trackersPage->googleAnalyticsId()->value() ?: null
            ];
        }
    ]
]);