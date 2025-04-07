<?php

use Kirby\Cms\App;

return function(App $kirby) {
    $user = $kirby->user();
    $isAdmin = $user?->isAdmin() ?? false;

    return [
        // show robots settings to admins only
        'tobimori.seo.robots.pageSettings' => $isAdmin,
        'tobimori.seo.robots.indicator' => $isAdmin
    ];
};