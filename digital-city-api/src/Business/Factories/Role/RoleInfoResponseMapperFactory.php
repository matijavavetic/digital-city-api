<?php

namespace src\Business\Factories\Role;

use src\Data\Entities\Role;
use src\Business\Mappers\Role\RoleMapper;
use src\Business\Mappers\Role\Response\RoleInfoResponseMapper;

class RoleInfoResponseMapperFactory
{
    public static function make(Role $role) : RoleInfoResponseMapper
    {
        $roleMapper = new RoleMapper($role->identifier, $role->name);

        $mapper = new RoleInfoResponseMapper();
        $mapper->setRoleMapper($roleMapper);

        return $mapper;
    }
}

