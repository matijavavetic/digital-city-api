<?php

use src\Applications\Http\Enum\ErrorCodes\RoleErrorCode;
use src\Applications\Http\Enum\ErrorCodes\UserErrorCode;
use src\Applications\Http\Enum\ErrorCodes\PermissionErrorCode;


return [
    RoleErrorCode::class => [
        RoleErrorCode::ERR_EMPTY_NAME         => 'Empty role name. Role name is required.',
        RoleErrorCode::ERR_INVALID_SORT       => 'Invalid sort value. Sort should be ASC or DESC.',
        RoleErrorCode::ERR_EMPTY_IDENTIFIER   => 'Empty identifier. Identifier is required.',
        RoleErrorCode::ERR_INVALID_IDENTIFIER => 'Invalid identifier value. Identifier should be a string.',
    ],

    UserErrorCode::class => [
        UserErrorCode::ERR_INVALID_SORT            => 'Invalid sort value. Sort should be ASC or DESC.',
        UserErrorCode::ERR_EMPTY_IDENTIFIER        => 'Empty identifier. Identifier is required.',
        UserErrorCode::ERR_INVALID_IDENTIFIER      => 'Invalid identifier value. Identifier should be a string.',
        UserErrorCode::ERR_EMPTY_PASSWORD          => 'Empty password. Password is required.',
        UserErrorCode::ERR_INVALID_PASSWORD        => 'Invalid password value. Password should be a string.',
        UserErrorCode::ERR_INVALID_FIRSTNAME       => 'Invalid first name value. First name should be a string.',
        UserErrorCode::ERR_INVALID_LASTNAME        => 'Invalid last name value. Last name should be a string.',
        UserErrorCode::ERR_INVALID_EMAIL           => 'Invalid e-mail address format.',
        UserErrorCode::ERR_INVALID_DATE            => 'Invalid date format.',
        UserErrorCode::ERR_INVALID_COUNTRY         => 'Invalid country value. Country should be a string.',
        UserErrorCode::ERR_INVALID_CITY            => 'Invalid city value. City should be a string.',
        UserErrorCode::ERR_EMPTY_ROLE_IDENTIFIER   => 'Empty role identifier. Role identifier is required.',
        UserErrorCode::ERR_INVALID_ROLE_IDENTIFIER => 'Invalid role identifier. Role identifier should be a string.',
    ],

    PermissionErrorCode::class => [
        PermissionErrorCode::ERR_EMPTY_NAME         => 'Empty permission name. Permission name is required.',
        PermissionErrorCode::ERR_INVALID_NAME       => 'Invalid permission name. Permission name should be a string.',
        PermissionErrorCode::ERR_INVALID_SORT       => 'Invalid sort value. Sort should be ASC or DESC.',
        PermissionErrorCode::ERR_EMPTY_IDENTIFIER   => 'Empty identifier. Identifier is required.',
        PermissionErrorCode::ERR_INVALID_IDENTIFIER => 'Invalid identifier value. Identifier should be a string.',
    ],
];
