<?php

namespace src\Applications\Http\Factories\Role;

use src\Business\Mappers\Role\Request\RoleCreateRequestMapper;

class RoleCreateRequestMapperFactory
{
    public static function make(array $data) : RoleCreateRequestMapper
    {
        $mapper = new RoleCreateRequestMapper($data['name']);

        return $mapper;
    }
}

