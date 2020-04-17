<?php

namespace src\Business\Factories\Role;

use src\Data\Entities\Role;
use src\Business\Mappers\Role\Response\RoleCreateResponseMapper;

class RoleCreateResponseMapperFactory
{
    public static function make(Role $role) : RoleCreateResponseMapper
    {
        $mapper = new RoleCreateResponseMapper($role->identifier, $role->name);

        return $mapper;
    }
}

