<?php
return [
    '@class' => 'Grav\\Common\\File\\CompiledYamlFile',
    'filename' => 'C:\\xampp\\htdocs\\grav\\user\\plugins\\admin-addon-user-manager/modals.yaml',
    'modified' => 1555170556,
    'data' => [
        'add_user' => [
            'fields' => [
                0 => [
                    'type' => 'section',
                    'title' => 'PLUGIN_ADMIN.ADD_ACCOUNT'
                ],
                1 => [
                    'type' => 'text',
                    'label' => 'PLUGIN_ADMIN.USERNAME',
                    'help' => 'PLUGIN_ADMIN.USERNAME_HELP',
                    'name' => 'username',
                    'placeholder' => 'PLUGIN_ADMIN.USERNAME_PLACEHOLDER',
                    'validate' => [
                        'required' => true,
                        'message' => 'PLUGIN_LOGIN.USERNAME_NOT_VALID'
                    ]
                ]
            ]
        ],
        'add_group' => [
            'fields' => [
                0 => [
                    'type' => 'section',
                    'title' => 'PLUGIN_ADMIN_ADDON_USER_MANAGER.ADD_GROUP'
                ],
                1 => [
                    'type' => 'text',
                    'label' => 'PLUGIN_ADMIN.NAME',
                    'name' => 'name',
                    'validate' => [
                        'required' => true
                    ]
                ]
            ]
        ],
        'bulk_user' => [
            'fields' => [
                0 => [
                    'type' => 'section',
                    'title' => 'PLUGIN_ADMIN_ADDON_USER_MANAGER.BULK_DELETE_USER'
                ],
                1 => [
                    'type' => 'button',
                    'text' => 'PLUGIN_ADMIN_ADDON_USER_MANAGER.BULK_DELETE',
                    'name' => 'bulk_delete',
                    'style' => 'vertical',
                    'classes' => 'large warning'
                ],
                2 => [
                    'type' => 'section',
                    'title' => 'PLUGIN_ADMIN_ADDON_USER_MANAGER.BULK_USER_GROUP'
                ],
                3 => [
                    'type' => 'select',
                    'name' => 'groups',
                    'multiple' => true,
                    'size' => 'large',
                    'label' => 'PLUGIN_ADMIN.GROUPS',
                    'classes' => 'fancy',
                    'help' => 'PLUGIN_ADMIN.GROUPS_HELP',
                    'validate' => [
                        'type' => 'commalist'
                    ]
                ],
                4 => [
                    'type' => 'button',
                    'text' => 'PLUGIN_ADMIN_ADDON_USER_MANAGER.BULK_ADD_GROUP',
                    'name' => 'bulk_add_to_group',
                    'style' => 'vertical',
                    'classes' => 'large'
                ],
                5 => [
                    'type' => 'button',
                    'text' => 'PLUGIN_ADMIN_ADDON_USER_MANAGER.BULK_REMOVE_GROUP',
                    'name' => 'bulk_remove_from_group',
                    'style' => 'vertical',
                    'classes' => 'large warning'
                ],
                6 => [
                    'type' => 'selectize',
                    'name' => 'permissions',
                    'multiple' => true,
                    'size' => 'large',
                    'label' => 'PLUGIN_ADMIN.PERMISSIONS',
                    'classes' => 'fancy',
                    'help' => 'PLUGIN_ADMIN.PERMISSIONS_HELP',
                    'validate' => [
                        'type' => 'commalist'
                    ]
                ],
                7 => [
                    'type' => 'button',
                    'text' => 'PLUGIN_ADMIN_ADDON_USER_MANAGER.BULK_ADD_PERMISSIONS',
                    'name' => 'bulk_add_acl',
                    'style' => 'vertical',
                    'classes' => 'large'
                ],
                8 => [
                    'type' => 'button',
                    'text' => 'PLUGIN_ADMIN_ADDON_USER_MANAGER.BULK_REMOVE_PERMISSIONS',
                    'name' => 'bulk_remove_acl',
                    'style' => 'vertical',
                    'classes' => 'large warning'
                ]
            ]
        ],
        'bulk_group' => [
            'fields' => [
                0 => [
                    'type' => 'section',
                    'title' => 'PLUGIN_ADMIN_ADDON_USER_MANAGER.BULK_DELETE_GROUP'
                ],
                1 => [
                    'type' => 'button',
                    'text' => 'PLUGIN_ADMIN_ADDON_USER_MANAGER.BULK_DELETE',
                    'name' => 'bulk_delete',
                    'style' => 'vertical',
                    'classes' => 'large warning'
                ]
            ]
        ]
    ]
];
