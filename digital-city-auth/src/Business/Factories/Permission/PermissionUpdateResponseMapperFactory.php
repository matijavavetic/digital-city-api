<?php

namespace src\Business\Factories\Permission;

use src\Business\Mappers\Permission\Response\PermissionUpdateResponseMapper;
use src\Data\Entities\Permission;

class PermissionUpdateResponseMapperFactory
{
    public static function make(Permission $permission) : PermissionUpdateResponseMapper
    {
        $mapper = new PermissionUpdateResponseMapper($permission->identifier);

        return $mapper;
    }
}

