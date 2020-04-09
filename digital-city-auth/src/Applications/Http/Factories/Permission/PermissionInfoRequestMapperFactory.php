<?php

namespace src\Applications\Http\Factories\Permission;

use src\Business\Mappers\Permission\Request\PermissionInfoRequestMapper;

class PermissionInfoRequestMapperFactory
{
    public static function make(array $data) : PermissionInfoRequestMapper
    {
        $mapper = new PermissionInfoRequestMapper($data['identifier']);

        return $mapper;
    }
}

