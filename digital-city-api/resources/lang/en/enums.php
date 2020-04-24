<?php

use src\Applications\Http\Enum\ErrorCodes\RoleErrorCode;
use src\Applications\Http\Enum\ErrorCodes\UserErrorCode;
use src\Applications\Http\Enum\ErrorCodes\PermissionErrorCode;
use src\Applications\Http\Enum\ErrorCodes\OrganisationErrorCode;



return [
    RoleErrorCode::class => [
        RoleErrorCode::ERR_EMPTY_NAME                => 'Empty role name. Role name is required.',
        RoleErrorCode::ERR_INVALID_SORT              => 'Invalid sort value. Sort should be ASC or DESC.',
        RoleErrorCode::ERR_EMPTY_IDENTIFIER          => 'Empty identifier. Identifier is required.',
        RoleErrorCode::ERR_INVALID_IDENTIFIER        => 'Invalid identifier value. Identifier should be a string.',
        RoleErrorCode::ERR_EMPTY_PERMISSIONS_FIELD   => 'Empty permissions field. Permissions field is required.',
        RoleErrorCode::ERR_INVALID_PERMISSIONS_FIELD => 'Invalid permissions field. Permissions field should be an array.',
        RoleErrorCode::ERR_EMPTY_PERMISSIONS_VALUE   => 'Empty permissions value. Permissions value are required.',
        RoleErrorCode::ERR_INDISTINCT_PERMISSIONS    => 'Indistinct permissions value. Permissions value have to be unique.',
        RoleErrorCode::ERR_INVALID_PERMISSIONS_VALUE => 'Invalid permissions value. Permissions value should be an integer.'
    ],

    UserErrorCode::class => [
        UserErrorCode::ERR_INVALID_SORT                => 'Invalid sort value. Sort should be ASC or DESC.',
        UserErrorCode::ERR_EMPTY_IDENTIFIER            => 'Empty identifier. Identifier is required.',
        UserErrorCode::ERR_INVALID_IDENTIFIER          => 'Invalid identifier value. Identifier should be a string.',
        UserErrorCode::ERR_EMPTY_PASSWORD              => 'Empty password. Password is required.',
        UserErrorCode::ERR_INVALID_PASSWORD            => 'Invalid password value. Password should be a string.',
        UserErrorCode::ERR_INVALID_FIRSTNAME           => 'Invalid first name value. First name should be a string.',
        UserErrorCode::ERR_INVALID_LASTNAME            => 'Invalid last name value. Last name should be a string.',
        UserErrorCode::ERR_INVALID_EMAIL               => 'Invalid e-mail address format.',
        UserErrorCode::ERR_INVALID_DATE                => 'Invalid date format.',
        UserErrorCode::ERR_INVALID_COUNTRY             => 'Invalid country value. Country should be a string.',
        UserErrorCode::ERR_INVALID_CITY                => 'Invalid city value. City should be a string.',
        UserErrorCode::ERR_EMPTY_ROLES_FIELD           => 'Empty roles field. Roles field is required.',
        UserErrorCode::ERR_INVALID_ROLES_FIELD         => 'Invalid roles field. Roles field should be an array.',
        UserErrorCode::ERR_INVALID_PERMISSIONS_FIELD   => 'Invalid permissions field. Permissions field should be an array.',
        UserErrorCode::ERR_INVALID_RELATIONS           => 'Invalid relations field. Relations field should be an array.',
        UserErrorCode::ERR_EMPTY_ORGANISATIONS_FIELD   => 'Empty organisations field. Organisations field is required.',
        UserErrorCode::ERR_INVALID_ORGANISATIONS_FIELD => 'Invalid organisations field. Organisations field should be an array.'
    ],

    PermissionErrorCode::class => [
        PermissionErrorCode::ERR_EMPTY_NAME         => 'Empty permission name. Permission name is required.',
        PermissionErrorCode::ERR_INVALID_NAME       => 'Invalid permission name. Permission name should be a string.',
        PermissionErrorCode::ERR_INVALID_SORT       => 'Invalid sort value. Sort should be ASC or DESC.',
        PermissionErrorCode::ERR_EMPTY_IDENTIFIER   => 'Empty identifier. Identifier is required.',
        PermissionErrorCode::ERR_INVALID_IDENTIFIER => 'Invalid identifier value. Identifier should be a string.',
    ],

    OrganisationErrorCode::class => [
        OrganisationErrorCode::ERR_EMPTY_NAME              => 'Empty organisation name. Organisation name is required.',
        OrganisationErrorCode::ERR_INVALID_NAME            => 'Invalid organisation name. Organisation name should be a string.',
        OrganisationErrorCode::ERR_INVALID_SORT            => 'Invalid sort value. Sort should be ASC or DESC.',
        OrganisationErrorCode::ERR_EMPTY_IDENTIFIER        => 'Empty identifier. Identifier is required.',
        OrganisationErrorCode::ERR_INVALID_IDENTIFIER      => 'Invalid identifier value. Identifier should be a string.',
        OrganisationErrorCode::ERR_INVALID_CITY            => 'Invalid city name. City name should be a string.',
        OrganisationErrorCode::ERR_EMPTY_CITY              => 'Empty city name. City name is required.',
        OrganisationErrorCode::ERR_INVALID_COUNTY          => 'Invalid county name. County name is required.',
        OrganisationErrorCode::ERR_EMPTY_COUNTY            => 'Empty county name. County name should be a string.',
        OrganisationErrorCode::ERR_INVALID_COUNTRY         => 'Invalid country name. Country name is required.',
        OrganisationErrorCode::ERR_EMPTY_COUNTRY           => 'Empty country name. Country name should be a string.',
        OrganisationErrorCode::ERR_INVALID_DESCRIPTION     => 'Invalid description. Description should be a string.',
        OrganisationErrorCode::ERR_INVALID_PRIMARY_COLOR   => 'Invalid primary color. Primary color should be a string.',
        OrganisationErrorCode::ERR_INVALID_SECONDARY_COLOR => 'Invalid secondary color. Secondary color should be a string.',
        OrganisationErrorCode::ERR_INVALID_TERTIARY_COLOR  => 'Invalid tertiary color. Tertiary color should be a string.',
        OrganisationErrorCode::ERR_INVALID_LOGO            => 'Invalid logo. Logo should be a string.',
    ]
];
