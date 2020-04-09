<?php

use src\Data\Enums\PermissionEnum;
use Ramsey\Uuid\Uuid;


return [
    [
        'id'         => 1,
        'identifier' => Uuid::uuid4()->getHex(),
        'name'       => PermissionEnum::SCHOLARSHIP_CREATE
    ],

    [
        'id'         => 2,
        'identifier' => Uuid::uuid4()->getHex(),
        'name'       => PermissionEnum::SCHOLARSHIP_READ
    ],

    [
        'id'         => 3,
        'identifier' => Uuid::uuid4()->getHex(),
        'name'       => PermissionEnum::SCHOLARSHIP_UPDATE
    ],

    [
        'id'          => 4,
        'identifier' => Uuid::uuid4()->getHex(),
        'name'       => PermissionEnum::SCHOLARSHIP_DELETE
    ],
];
