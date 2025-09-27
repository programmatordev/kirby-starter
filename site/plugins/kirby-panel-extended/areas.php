<?php

use Kirby\Cms\App;
use Kirby\Panel\Ui\Buttons\ViewButtons;
use Kirby\Panel\Ui\Item\UserItem;

return [
    'users' => function(App $kirby) {
        $options = $kirby->option('programmatordev.panel-extended');

        return [
            // kirby/config/areas/users/searches.php
            'searches' => [
                'users' => [
                    'query' => function(?string $query, int $limit, int $page) use ($kirby, $options) {
                        $users = $kirby->users()->search($query);

                        // if the logged-in user is not an admin, do not show admin users
                        if ($options['hideAdminUsers'] && !$kirby->user()->isAdmin()) {
                            $users = $users->filter(fn ($user) => !$user->isAdmin());
                        }

                        $users = $users->paginate($limit, $page);

                        return [
                            'results' => $users->values(fn ($user) => (new UserItem(user: $user))->props()),
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

                        // if the logged-in user is not an admin, do not show the admin role
                        if ($options['hideAdminUsers'] && !$kirby->user()->isAdmin()) {
                            $roles = $roles->filter(fn ($role) => $role->id() !== 'admin');
                        }

                        $roles = $roles->toArray();

                        return [
                            'component' => 'k-users-view',
                            'props' => [
                                'buttons' => fn () =>
                                    ViewButtons::view('users')
                                        ->defaults('create')
                                        ->bind(['role' => $role])
                                        ->render(),
                                'role' => function() use ($roles, $role) {
                                    if ($role) {
                                        return $roles[$role] ?? null;
                                    }

                                    return null;
                                },
                                'roles' => array_values($roles),
                                'users' => function() use ($kirby, $role, $options) {
                                    $users = $kirby->users();

                                    // if the logged-in user is not admin, do not show admin users
                                    if ($options['hideAdminUsers'] && !$kirby->user()->isAdmin()) {
                                        $users = $users->filter(fn ($user) => !$user->isAdmin());
                                    }

                                    if (empty($role) === false) {
                                        $users = $users->role($role);
                                    }

                                    $users = $users->sortBy('username', 'asc');

                                    $users = $users->paginate([
                                        'limit' => 20,
                                        'page' => $kirby->request()->get('page')
                                    ]);

                                    return [
                                        'data' => $users->values(fn ($user) => (new UserItem(user: $user))->props()),
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

                        // if the logged-in user is not an admin and is trying to access one
                        // redirect to the users panel
                        if ($options['hideAdminUsers'] && !$kirby->user()->isAdmin() && $user->isAdmin()) {
                            Panel::go('/users');
                        }

                        return $user->panel()->view();
                    }
                ],
                'user.file' => [
                    'action'  => function(string $id, string $filename) use ($kirby, $options) {
                        $file = Find::file('users/' . $id, $filename);

                        // if a logged-in user is not admin and is trying to access a file from one
                        // redirect to the users panel
                        if ($options['hideAdminUsers'] && !$kirby->user()->isAdmin() && $file->parent()?->isAdmin()) {
                            Panel::go('/users');
                        }

                        return $file->panel()->view();
                    }
                ],
            ]
        ];
    }
];