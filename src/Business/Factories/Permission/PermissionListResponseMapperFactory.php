<?php

namespace src\Business\Factories\Permission;

use src\Business\Mappers\Permission\Response\PermissionListResponseMapper;
use Illuminate\Database\Eloquent\Collection;
use src\Business\Mappers\Permission\PermissionMapper;

class PermissionListResponseMapperFactory
{
    public static function make(Collection $collection) : PermissionListResponseMapper
    {
        $permissionMappers = [];

        foreach($collection as $permission) {
            $permissionMappers[] = new PermissionMapper($permission->identifier, $permission->name);
        }

        $mapper = new PermissionListResponseMapper();
        $mapper->setPermissionMappers($permissionMappers);

        return $mapper;
    }
}

