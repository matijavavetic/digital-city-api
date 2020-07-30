<?php

namespace src\Business\Factories\Role;

use src\Business\Mappers\Role\Response\RoleUpdateResponseMapper;
use src\Data\Entities\Role;

class RoleUpdateResponseMapperFactory
{
    public static function make(Role $role) : RoleUpdateResponseMapper
    {
        $mapper = new RoleUpdateResponseMapper($role->identifier, $role->name);

        return $mapper;
    }
}

