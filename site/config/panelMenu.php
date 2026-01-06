<?php

use App\PanelHelper;

return function () {
    return [
        'site' => ['current' => PanelHelper::isCurrentPage('site')],
        'languages',
        'users',
        '-',
        'trackers' => PanelHelper::buildMenuEntry('preview', 'trackers.page.title', 'pages/trackers'),
        '-',
        'system'
    ];
};