<?php

return function(\Kirby\Cms\Page $page) {
    return [
        'tags' => $page->tags()->split(),
    ];
};
