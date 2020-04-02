<?php

namespace src\Business\Factories\Role;

use src\Business\Mappers\Role\Response\RoleListResponseMapper;
use Illuminate\Database\Eloquent\Collection;
use src\Business\Mappers\Role\RoleMapper;

class RoleListResponseMapperFactory
{
    public static function make(Collection $collection) : RoleListResponseMapper
    {
        $roleMappers = [];

        foreach($collection as $role) {
            $roleMappers[] = new RoleMapper($role->name);
        }

        $mapper = new RoleListResponseMapper();
        $mapper->setRoleMappers($roleMappers);

        return $mapper;
    }
}

