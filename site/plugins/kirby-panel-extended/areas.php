<?php

use Kirby\Cms\App;
use Kirby\Cms\Find;
use Kirby\Panel\Panel;
use Kirby\Panel\Ui\Buttons\ViewButtons;
use Kirby\Panel\Ui\Item\UserItem;

return [
    'users' => function(App $kirby) {
        $hideAdminUsers = $kirby->option('programmatordev.panel-extended.hideAdminUsers', true)
            && $kirby->user()?->isAdmin() !== true;

        $filterHiddenAdminUsers = fn ($users) => $hideAdminUsers
            ? $users->filter(fn ($user) => !$user->isAdmin())
            : $users;

        return [
            // kirby/config/areas/users/searches.php
            'searches' => [
                'users' => [
                    'query' => function(?string $query, int $limit, int $page) use ($filterHiddenAdminUsers) {
                        $users = Find::users()->search($query);
                        $users = $filterHiddenAdminUsers($users);
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
                    'action' => function() use ($kirby, $hideAdminUsers, $filterHiddenAdminUsers) {
                        $role = $kirby->request()->get('role');
                        $roles = Find::roles();

                        if ($hideAdminUsers) {
                            $roles = $roles->filter(fn ($role) => $role->id() !== 'admin');
                        }

                        $roles = $roles->toArray(fn ($role) => [
                            'id' => $role->id(),
                            'title' => $role->title(),
                        ]);

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
                                'users' => function() use ($kirby, $role, $filterHiddenAdminUsers) {
                                    $users = Find::users();
                                    $users = $filterHiddenAdminUsers($users);

                                    if (empty($role) === false) {
                                        $users = $users->role($role);
                                    }

                                    $users = $users->sortBy('username', 'asc');

                                    $users = $users->paginate([
                                        'limit' => 20,
                                        'page' => $kirby->request()->get('page', 1),
                                        'method' => 'none'
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
                    'action' => function(string $id) use ($hideAdminUsers) {
                        $user = Find::user($id);

                        if ($hideAdminUsers && $user->isAdmin()) {
                            Panel::go('/users');
                        }

                        return $user->panel()->view();
                    }
                ],
                'user.file' => [
                    'action'  => function(string $id, string $filename) use ($hideAdminUsers) {
                        $file = Find::file('users/' . $id, $filename);

                        if ($hideAdminUsers && $file->parent()?->isAdmin()) {
                            Panel::go('/users');
                        }

                        return $file->panel()->view();
                    }
                ],
            ]
        ];
    }
];
