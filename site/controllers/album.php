<?php

return function(\Kirby\Cms\Page $page) {
    $gallery = $page->images()->sortBy('sort', 'filename');

    return [
        'gallery' => $gallery
    ];
};