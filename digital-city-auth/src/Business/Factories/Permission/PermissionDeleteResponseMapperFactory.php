<?php

namespace src\Business\Factories\Permission;

use src\Business\Mappers\Permission\Response\PermissionDeleteResponseMapper;
use src\Data\Entities\Permission;

class PermissionDeleteResponseMapperFactory
{
    public static function make(Permission $permission) : PermissionDeleteResponseMapper
    {
        $mapper = new PermissionDeleteResponseMapper($permission->identifier);

        return $mapper;
    }
}

