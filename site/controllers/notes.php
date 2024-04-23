<?php

return function ($page) {
    $notes = collection('notes');
    $tag = param('tag');

    if (empty($tag) === false) {
        $notes = $notes->filterBy('tags', $tag, ',');
    }

    return [
        'tag' => $tag,
        'notes' => $notes->paginate(6)
    ];
};