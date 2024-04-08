<?php

use Kirby\Cms\App as Kirby;
use Kirby\Cms\Find;
use Kirby\Panel\Panel;
use Kirby\Toolkit\Escape;

Kirby::plugin('programmatordev/users-extended', [
    'options' => [
        'hideAdmin' => true,
    ],
    'fields' => [
        // custom "accounts" field that always filters admin users
        'accounts' => [
            'extends' => 'users',
            'props' => [
                'query' => function(string $query = null) {
                    return $query
                        ? \sprintf('%s.filterBy("role", "!=", "admin")', $query)
                        : 'kirby.users.filterBy("role", "!=", "admin")';
                }
            ]
        ]
    ],
    'areas' => [
        'users' => function(Kirby $kirby) {
            // get all plugin options
            $options = $kirby->option('programmatordev.users-extended');

            return [
                // kirby/config/areas/users/searches.php
                'searches' => [
                    'users' => [
                        'query' => function(string $query, int $limit, int $page) use ($kirby, $options) {
                            $users = $kirby->users()->search($query);

                            // if logged-in user is not admin, do not show admin users
                            if ($options['hideAdmin'] && !$kirby->user()->isAdmin()) {
                                $users = $users->filter(fn($user) => !$user->isAdmin());
                            }

                            $users = $users->paginate($limit, $page);

                            return [
                                'results' => $users->values(fn ($user) => [
                                    'image' => $user->panel()->image(),
                                    'text'  => Escape::html($user->username()),
                                    'link'  => $user->panel()->url(true),
                                    'info'  => Escape::html($user->role()->title()),
                                    'uuid'  => $user->uuid()->toString(),
                                ]),
                                'pagination' => $users->pagination()->toArray()
                            ];
                        }
                    ]
                ],
                // kirby/config/areas/users/views.php
                'views' => [
                    'users' => [
                        'action' => function() use ($kirby, $options) {
                            $role = $kirby->request()->get('role');
                            $roles = $kirby->roles();

                            // if logged-in user is not admin, do not show admin role
                            if ($options['hideAdmin'] && !$kirby->user()->isAdmin()) {
                                $roles = $roles->filter(fn($role) => $role->id() !== 'admin');
                            }

                            $roles = $roles->toArray();

                            return [
                                'component' => 'k-users-view',
                                'props' => [
                                    'role' => function() use ($roles, $role) {
                                        if ($role) {
                                            return $roles[$role] ?? null;
                                        }

                                        return null;
                                    },
                                    'roles' => \array_values($roles),
                                    'users' => function() use ($kirby, $role, $options) {
                                        $users = $kirby->users();

                                        // if logged-in user is not admin, do not show admin users
                                        if ($options['hideAdmin'] && !$kirby->user()->isAdmin()) {
                                            $users = $users->filter(fn($user) => !$user->isAdmin());
                                        }

                                        /** @noinspection DuplicatedCode */
                                        if (empty($role) === false) {
                                            $users = $users->role($role);
                                        }

                                        // sort users alphabetically
                                        $users = $users->sortBy('username', 'asc');

                                        // paginate
                                        $users = $users->paginate([
                                            'limit' => 20,
                                            'page' => $kirby->request()->get('page')
                                        ]);

                                        return [
                                            'data' => $users->values(fn ($user) => [
                                                'id' => $user->id(),
                                                'image' => $user->panel()->image(),
                                                'info' => Escape::html($user->role()->title()),
                                                'link' => $user->panel()->url(true),
                                                'text' => Escape::html($user->username())
                                            ]),
                                            'pagination' => $users->pagination()->toArray()
                                        ];
                                    },
                                ]
                            ];
                        }
                    ],
                    'user' => [
                        'action' => function(string $id) use ($kirby, $options) {
                            $user = Find::user($id);

                            // if logged-in user is not admin and is trying to access an admin user
                            // redirect to users panel
                            if ($options['hideAdmin'] && !$kirby->user()->isAdmin() && $user->isAdmin()) {
                                Panel::go('/users');
                            }

                            return $user->panel()->view();
                        }
                    ],
                    'user.file' => [
                        'action'  => function(string $id, string $filename) use ($kirby, $options) {
                            $file = Find::file('users/' . $id, $filename);

                            // if logged-in user is not admin and is trying to access a file from an admin user
                            // redirect to users panel
                            if ($options['hideAdmin'] && !$kirby->user()->isAdmin() && $file->parent()?->isAdmin()) {
                                Panel::go('/users');
                            }

                            return $file->panel()->view();
                        }
                    ],
                ]
            ];
        }
    ]
]);