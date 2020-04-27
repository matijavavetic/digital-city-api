<?php

namespace src\Business\Factories\Role;

use src\Business\Mappers\Permission\PermissionMapper;
use src\Business\Mappers\Role\Response\RoleListResponseMapper;
use Illuminate\Database\Eloquent\Collection;
use src\Business\Mappers\Role\RoleMapper;

class RoleListResponseMapperFactory
{
    public static function make(Collection $collection) : RoleListResponseMapper
    {
        $roleMappers = [];
        $permissionMappers = [];

        foreach ($collection as $role) {
            foreach ($role->permissions as $permission) {
                $permissionMappers[] = new PermissionMapper($permission->identifier, $permission->name);
            }

            $roleMapper = new RoleMapper($role->identifier, $role->name);
            $roleMapper->setPermissions($permissionMappers);
            $roleMappers[] = $roleMapper;

            $permissionMappers = [];
        }

        $mapper = new RoleListResponseMapper();
        $mapper->setRoleMappers($roleMappers);

        return $mapper;
    }
}

