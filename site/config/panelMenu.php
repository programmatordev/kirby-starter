<?php

use App\PanelHelper;

return function () {
    return [
        'site' => ['current' => PanelHelper::isCurrentPage('site')],
        'languages',
        'users',
        '-',
        'analytics' => PanelHelper::buildMenuEntry('chart', 'analytics.page.title', 'pages/analytics'),
        '-',
        'system'
    ];
};