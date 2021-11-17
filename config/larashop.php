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
                'route'    => 'admin.catalogue.products.index',
                'sort'     => 1,
                'children' => [
                    [
                        'name'     => 'Products',
                        'icon'     => 'fas fa-home',
                        'route'    => 'admin.catalogue.products.index',
                        'sort'     => 0,
                        'children' => []
                    ],
                    [
                        'name'     => 'Categories',
                        'icon'     => 'fas fa-home',
                        'route'    => 'admin.catalogue.categories.index',
                        'sort'     => 1,
                        'children' => []
                    ],
                    [
                        'name'     => 'Attributes',
                        'icon'     => 'fas fa-home',
                        'route'    => 'admin.catalogue.attributes.index',
                        'sort'     => 2,
                        'children' => []
                    ],
                ]
            ],
        ],
    ],
];