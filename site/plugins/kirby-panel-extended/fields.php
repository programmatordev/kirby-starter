<?php

return [
    'accounts' => [
        'extends' => 'users',
        'props' => [
            'query' => function(?string $query = null): string {
                $query ??= 'kirby.users';

                return $query . '.filterBy("role", "!=", "admin")';
            }
        ]
    ]
];
