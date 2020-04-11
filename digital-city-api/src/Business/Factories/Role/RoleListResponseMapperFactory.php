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
        $permissionMapper = [];

        foreach($collection as $role) {
            foreach($role->permissions as $permission) {
                $permissionMapper[] = new PermissionMapper($permission->identifier, $permission->name);
            }

            $roleMappers[] = new RoleMapper($role->identifier, $role->name, $permissionMapper);
        }

        $mapper = new RoleListResponseMapper();
        $mapper->setRoleMappers($roleMappers);

        return $mapper;
    }
}

