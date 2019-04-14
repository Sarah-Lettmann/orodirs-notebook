<?php
return [
    '@class' => 'Grav\\Common\\File\\CompiledYamlFile',
    'filename' => 'C:/xampp/htdocs/orodirs-notebook/user/config/groups.yaml',
    'modified' => 1555174263,
    'data' => [
        'Game Masters' => [
            'groupname' => 'Game Masters',
            'description' => 'Alle Spielleiter',
            'access' => [
                'site' => [
                    'login' => 'true'
                ],
                'admin' => [
                    'login' => 'true',
                    'cache' => 'true',
                    'pages' => 'true',
                    'statistics' => 'true'
                ],
                'admin-addon-user-manager' => [
                    
                ]
            ]
        ],
        'Spieler' => [
            'groupname' => 'Spieler',
            'description' => 'Alle Spieler',
            'access' => [
                'site' => [
                    'login' => 'true'
                ],
                'admin' => [
                    'login' => 'true',
                    'cache' => 'true',
                    'pages' => 'true',
                    'statistics' => 'true'
                ],
                'admin-addon-user-manager' => [
                    
                ]
            ]
        ]
    ]
];
