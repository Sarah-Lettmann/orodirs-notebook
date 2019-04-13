<?php
return [
    '@class' => 'Grav\\Common\\File\\CompiledYamlFile',
    'filename' => 'C:/xampp/htdocs/grav/user/plugins/admin-addon-user-manager/blueprints/user/group.yaml',
    'modified' => 1555170556,
    'data' => [
        'title' => 'Group',
        'form' => [
            'validation' => 'loose',
            'fields' => [
                'groupname' => [
                    'type' => 'text',
                    'size' => 'large',
                    'label' => 'PLUGIN_ADMIN.NAME',
                    'readonly' => true,
                    'disabled' => true
                ],
                'readableName' => [
                    'type' => 'text',
                    'size' => 'large',
                    'label' => 'PLUGIN_ADMIN_ADDON_USER_MANAGER.READABLE_NAME'
                ],
                'description' => [
                    'type' => 'text',
                    'size' => 'large',
                    'label' => 'PLUGIN_ADMIN.DESCRIPTION'
                ],
                'icon' => [
                    'type' => 'text',
                    'size' => 'small',
                    'label' => 'PLUGIN_ADMIN_ADDON_USER_MANAGER.ICON'
                ],
                'access' => [
                    'type' => 'permissions',
                    'label' => 'PLUGIN_ADMIN.PERMISSIONS',
                    'ignore_empty' => true,
                    'validate' => [
                        'type' => 'array'
                    ]
                ],
                'users' => [
                    'type' => 'select',
                    'multiple' => true,
                    'size' => 'large',
                    'label' => 'PLUGIN_ADMIN_ADDON_USER_MANAGER.USERS',
                    'data-options@' => '\\AdminAddonUserManager\\Users\\Manager::userNames',
                    'classes' => 'fancy',
                    'help' => 'PLUGIN_ADMIN_ADDON_USER_MANAGER.USERS_HELP',
                    'validate' => [
                        'type' => 'commalist'
                    ]
                ]
            ]
        ]
    ]
];
