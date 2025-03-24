<?php

return [

    'models' => [

        'permission' => \Spatie\Permission\Models\Permission::class,

        'role' => \Spatie\Permission\Models\Role::class,

    ],

    'table_names' => [

        'permissions' => 'permissions', // Fixed typo

        'roles' => 'roles',

        'model_has_permissions' => 'model_has_permissions', // Fixed typo

        'model_has_roles' => 'model_has_roles',

        'role_has_permissions' => 'role_has_permissions', // Fixed typo
    ],

    'column_names' => [

        'role_pivot_key' => null,
        'permission_pivot_key' => null, // Fixed key
        'model_morph_key' => 'model_id',
        'team_foreign_key' => 'team_id',
    ],

    'register_permission_check_method' => true, // Fixed double underscore

    'register_octane_reset_listener' => false,

    'events_enabled' => false,

    'teams' => false,

    'team_resolver' => \Spatie\Permission\DefaultTeamResolver::class,

    'use_passport_client_credentials' => false,

    'display_permission_in_exception' => false, // Fixed key

    'display_role_in_exception' => false,

    'enable_wildcard_permissions' => false, // Fixed key

    'cache' => [

        'expiration_time' => \DateInterval::createFromDateString('24 hours'),

        'key' => 'spatie.permission.cache', // Fixed key

        'store' => 'default',
    ],
];
