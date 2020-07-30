<?php

namespace src\Applications\Http\Factories\Role;

use src\Business\Mappers\Role\Request\RoleInfoRequestMapper;

class RoleInfoRequestMapperFactory
{
    public static function make(array $data) : RoleInfoRequestMapper
    {
        $mapper = new RoleInfoRequestMapper($data['identifier']);

        return $mapper;
    }
}

