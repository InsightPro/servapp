<?php
// Aside menu

return [

    'items' => [
        // Dashboard
        [
            'title'   => 'Dashboard',
            'root'    => true,
            'icon'    => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page'    => '/',
            'new-tab' => false,
        ],

        // Admin Settings
        
        [
            'title'   => 'Admin Settings',
            'icon'    => 'media/svg/icons/Code/Settings4.svg',
            'bullet'  => 'line',
            'root'    => true,
            'submenu' => [
                [
                    'title'  => 'System Setup',
                    'bullet' => 'dot',
                    'page'   => 'admin/system-setup',
                ],
                [
                    'title'  => 'APIs',
                    'bullet' => 'dot',
                    'page'   => 'admin/apis',
                ],
                [
                    'title'  => 'Roles',
                    'bullet' => 'dot',
                    'page'   => 'admin/roles',
                ],
                [
                    'title'  => 'Permissions',
                    'bullet' => 'dot',
                    'page'   => 'admin/permissions',
                ],
                [
                    'title'  => 'Configuration Models',
                    'bullet' => 'dot',
                    'page'   => 'admin/configuration-models',
                ],
                [
                    'title'  => 'Languages',
                    'bullet' => 'dot',
                    'page'   => 'admin/languages',
                ],
            ],
        ],

        // User Management
        
        [
            'title'   => 'User Management',
            'icon'    => 'media/svg/icons/Communication/Group.svg',
            'bullet'  => 'line',
            'root'    => true,
            'submenu' => [
                [
                    'title'  => 'All Users',
                    'bullet' => 'dot',
                    'page'   => 'user/all-users',
                ],
                [
                    'title'  => 'Service Providers',
                    'bullet' => 'dot',
                    'page'   => 'user/service-providers',
                ],
                [
                    'title'  => 'Customers',
                    'bullet' => 'dot',
                    'page'   => 'user/customers',
                ],
            ],
        ],

        // Jobs
        
        [
            'title'   => 'Jobs',
            'icon'    => 'media/svg/icons/Clothes/Briefcase.svg',
            'bullet'  => 'line',
            'root'    => true,
            'submenu' => [
                [
                    'title'  => 'All Jobs',
                    'bullet' => 'dot',
                    'page'   => 'jobs/all-jobs',
                ],
                [
                    'title'  => 'Scheduled',
                    'bullet' => 'dot',
                    'page'   => 'jobs/scheduled',
                ],
                [
                    'title'  => 'In Progress',
                    'bullet' => 'dot',
                    'page'   => 'jobs/in-progress',
                ],
                [
                    'title'  => 'Completed',
                    'bullet' => 'dot',
                    'page'   => 'jobs/completed',
                ],
            ],
        ],

        // Accounts & Finance
        
        [
            'title'  => 'Accounts & Finance',
            'icon'   => 'media/svg/icons/Shopping/Chart-line1.svg',
            'bullet' => 'line',
            'root'   => true,
            'page'   => 'accounts-finance',
        ],

        // Reports
        [
            'section' => 'Reports',
        ],
        [
            'title'  => 'Reports',
            'icon'   => 'media/svg/icons/Communication/Clipboard-list.svg',
            'bullet' => 'line',
            'root'   => true,
            'page'   => 'reports',
        ],

        // Tasks
        [
            'section' => 'Tasks',
        ],
        [
            'title'  => 'Tasks',
            'icon'   => 'media/svg/icons/Text/Bullet-list.svg',
            'bullet' => 'line',
            'root'   => true,
            'page'   => 'tasks',
        ],

        // Support Center
        
        [
            'title'   => 'Support Center',
            'icon'    => 'media/svg/icons/Communication/Group-chat.svg',
            'bullet'  => 'line',
            'root'    => true,
            'submenu' => [
                [
                    'title'  => 'Chat',
                    'bullet' => 'dot',
                    'page'   => 'support-center/chat',
                ],
                [
                    'title'  => 'eMails',
                    'bullet' => 'dot',
                    'page'   => 'support-center/emails',
                ],
                [
                    'title'  => 'Tickets',
                    'bullet' => 'dot',
                    'page'   => 'support-center/tickets',
                ],
                [
                    'title'  => 'Articles',
                    'bullet' => 'dot',
                    'page'   => 'support-center/articles',
                ],
                [
                    'title'  => 'FAQS',
                    'bullet' => 'dot',
                    'page'   => 'support-center/faqs',
                ],
                [
                    'title'  => 'Training Videos',
                    'bullet' => 'dot',
                    'page'   => 'support-center/training-videos',
                ],
            ],
        ],
    ],

];
