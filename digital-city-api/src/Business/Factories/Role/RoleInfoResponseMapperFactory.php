<?php

namespace src\Business\Factories\Role;

use src\Business\Mappers\Permission\PermissionMapper;
use src\Data\Entities\Role;
use src\Business\Mappers\Role\RoleMapper;
use src\Business\Mappers\Role\Response\RoleInfoResponseMapper;

class RoleInfoResponseMapperFactory
{
    public static function make(Role $role) : RoleInfoResponseMapper
    {
        $permissionMapper = [];

        foreach($role->permissions as $permission) {
            $permissionMapper = new PermissionMapper($permission->identifier, $permission->name);
        }

        $roleMapper = new RoleMapper($role->identifier, $role->name, $permissionMapper);

        $mapper = new RoleInfoResponseMapper();
        $mapper->setRoleMapper($roleMapper);

        return $mapper;
    }
}

