<?php

use Kirby\Cms\App;
use KirbyStarter\PanelHelper;

return function (App $kirby) {
    return [
        'site' => [
            'current' => PanelHelper::isCurrentPage('site')
        ],
        'languages',
        'users',
        'analytics' => PanelHelper::buildMenuEntry('chart', 'analytics.page.title', 'pages/analytics'),
        'system'
    ];
};