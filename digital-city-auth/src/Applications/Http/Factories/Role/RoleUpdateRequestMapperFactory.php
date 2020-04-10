<?php

namespace src\Applications\Http\Factories\Role;

use src\Business\Mappers\Role\Request\RoleUpdateRequestMapper;

class RoleUpdateRequestMapperFactory
{
    public static function make(array $data) : RoleUpdateRequestMapper
    {
        $mapper = new RoleUpdateRequestMapper($data['identifier'], $data['name']);

        return $mapper;
    }
}

