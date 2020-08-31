<?php

namespace src\Business\Factories\Permission;

use src\Data\Entities\Permission;
use src\Business\Mappers\Permission\PermissionMapper;
use src\Business\Mappers\Permission\Response\PermissionInfoResponseMapper;

class PermissionInfoResponseMapperFactory
{
    public static function make(Permission $permission) : PermissionInfoResponseMapper
    {
        $permissionMapper = new PermissionMapper($permission->identifier, $permission->name);

        $mapper = new PermissionInfoResponseMapper();
        $mapper->setPermissionMapper($permissionMapper);

        return $mapper;
    }
}

