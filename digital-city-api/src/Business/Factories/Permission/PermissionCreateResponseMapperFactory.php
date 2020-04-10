<?php

namespace src\Business\Factories\Permission;

use src\Data\Entities\Permission;
use src\Business\Mappers\Permission\Response\PermissionCreateResponseMapper;

class PermissionCreateResponseMapperFactory
{
    public static function make(Permission $permission) : PermissionCreateResponseMapper
    {
        $mapper = new PermissionCreateResponseMapper($permission->identifier);

        return $mapper;
    }
}

