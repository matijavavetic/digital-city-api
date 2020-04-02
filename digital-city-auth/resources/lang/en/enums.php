<?php

use src\Applications\Http\Enum\ErrorCodes\RoleErrorCode;

return [
    RoleErrorCode::class => [
        RoleErrorCode::ERR_EMPTY_NAME => 'Empty role name. Role name is required.',
        RoleErrorCode::ERR_INVALID_SORT => 'Invalid sort value. Sort should be ASC or DESC.',
    ],
];