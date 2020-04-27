<?php

namespace src\Applications\Http\Factories\Role;

use src\Business\Mappers\Role\Request\RoleUpdateRequestMapper;

class RoleUpdateRequestMapperFactory
{
    public static function make(array $data) : RoleUpdateRequestMapper
    {
        $mapper = new RoleUpdateRequestMapper($data['identifier'], $data['name']);

        if (is_null($data['permissions']) === false) {
            $mapper->setPermissions($data['permissions']);
        } else {
            $mapper->setPermissions(null);
        }

        return $mapper;
    }
}

