<?php

return [
    'admin' => [
        'sidebar' => [
            [
                'name'     => 'Dashboard',
                'icon'     => 'fas fa-home',
                'route'    => 'admin.home',
                'sort'     => 0,
                'children' => []
            ],
            [
                'name'     => 'Catalogue',
                'icon'     => 'fas fa-cubes',
                'route'    => 'admin.products.index',
                'sort'     => 0,
                'children' => [
                    [
                        'name'     => 'Products',
                        'icon'     => 'fas fa-home',
                        'route'    => 'admin.products.index',
                        'sort'     => 0,
                        'children' => []
                    ],
                    [
                        'name'     => 'Categories',
                        'icon'     => 'fas fa-home',
                        'route'    => 'admin.categories.index',
                        'sort'     => 1,
                        'children' => []
                    ],
                    [
                        'name'     => 'Tags',
                        'icon'     => 'fas fa-home',
                        'route'    => 'admin.tags.index',
                        'sort'     => 2,
                        'children' => []
                    ],
                    [
                        'name'     => 'Attributes',
                        'icon'     => 'fas fa-home',
                        'route'    => 'admin.attributes.index',
                        'sort'     => 3,
                        'children' => []
                    ],
                ]
            ],
            [
                'name'     => 'Settings',
                'icon'     => 'fas fa-sliders-h',
                'route'    => 'admin.settings.index',
                'sort'     => 3,
                'children' => [
                    [
                        'name'     => 'General',
                        'icon'     => 'fas fa-sliders-h',
                        'route'    => 'admin.settings.index',
                        'sort'     => 0,
                        'children' => []
                    ],
                ]
            ],
        ],
    ],
];