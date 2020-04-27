<?php

namespace src\Applications\Http\Factories\Role;

use src\Business\Mappers\Role\Request\RoleDeleteRequestMapper;

class RoleDeleteRequestMapperFactory
{
    public static function make(array $data) : RoleDeleteRequestMapper
    {
        $mapper = new RoleDeleteRequestMapper($data['identifier']);

        return $mapper;
    }
}

