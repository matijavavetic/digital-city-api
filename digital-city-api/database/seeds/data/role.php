<?php

use src\Data\Enums\RoleEnum;
use Ramsey\Uuid\Uuid;

return [
    [
        'id'         => 1,
        'identifier' => Uuid::uuid4()->getHex(),
        'name'       => RoleEnum::SUPER_ADMIN
    ],

    [
        'id'         => 2,
        'identifier' => Uuid::uuid4()->getHex(),
        'name'       => RoleEnum::ADMIN
    ],

    [
        'id'         => 3,
        'identifier' => Uuid::uuid4()->getHex(),
        'name'       => RoleEnum::EMPLOYEE
    ],

    [
        'id'          => 4,
        'identifier' => Uuid::uuid4()->getHex(),
        'name'       => RoleEnum::CITIZEN
    ],
];