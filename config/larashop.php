<?php

return [
    'admin' => [
        'sidebar' => [
            [
                'name'   => 'Dashboard',
                'icon'   => 'fas fa-home',
                'url'    => 'admin.home',
                'children' => []
            ],
            [
                'name'   => 'Products',
                'icon'   => 'fas fa-cubes',
                'url'    => 'admin.home',
                'children' => [
                    [
                        'name'   => 'All Products',
                        'url'    => 'admin.home',
                    ],
                    [
                        'name'   => 'Add New',
                        'url'    => 'admin.home',
                    ],
                    [
                        'name'   => 'Categories',
                        'url'    => 'admin.home',
                    ],
                    [
                        'name'   => 'Tags',
                        'url'    => 'admin.home',
                    ],
                    [
                        'name'   => 'Attributes',
                        'url'    => 'admin.home',
                    ],
                ]
            ],
            [
                'name'   => 'Shop',
                'icon'   => 'fas fa-store',
                'url'    => 'admin.home',
                'children' => [
                    [
                        'name'   => 'Orders',
                        'url'    => 'admin.home',
                    ],
                    [
                        'name'   => 'Coupons',
                        'url'    => 'admin.home',
                    ],
                    [
                        'name'   => 'Customers',
                        'url'    => 'admin.home',
                    ],
                    [
                        'name'   => 'Settings',
                        'url'    => 'admin.home',
                    ],
                ]
            ],
            [
                'name'   => 'Payment Getways',
                'icon'   => 'fas fa-wallet',
                'url'    => 'admin.home',
                'children' => [
                    [
                        'name'   => 'Stripe',
                        'url'    => 'admin.home',
                    ],
                    [
                        'name'   => 'PayPal',
                        'url'    => 'admin.home',
                    ],
                ]
            ],            
            [
                'name'   => 'Users',
                'icon'   => 'fas fa-user',
                'url'    => 'admin.users.index',
                'children' => [
                    [
                        'name'   => 'All Users',
                        'url'    => 'admin.users.index',
                    ],
                    [
                        'name'   => 'Add New',
                        'url'    => 'admin.users.create',
                    ],
                    [
                        'name'   => 'My Profile',
                        'url'    => 'admin.home',
                    ],
                ]
            ],
            [
                'name'   => 'Settings',
                'icon'   => 'fas fa-sliders-h',
                'url'    => 'admin.home',
                'children' => [
                    [
                        'name'   => 'General',
                        'url'    => 'admin.home',
                    ],
                ]
            ],
        ],
    ],
];