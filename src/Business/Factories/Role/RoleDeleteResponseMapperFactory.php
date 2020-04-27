<?php

namespace src\Business\Factories\Role;

use src\Business\Mappers\Role\Response\RoleDeleteResponseMapper;
use src\Data\Entities\Role;

class RoleDeleteResponseMapperFactory
{
    public static function make(Role $role) : RoleDeleteResponseMapper
    {
        $mapper = new RoleDeleteResponseMapper($role->identifier);

        return $mapper;
    }
}

