<?php

namespace src\Applications\Http\Factories\Permission;

use src\Business\Mappers\Permission\Request\PermissionCreateRequestMapper;

class PermissionCreateRequestMapperFactory
{
    public static function make(array $data) : PermissionCreateRequestMapper
    {
        $mapper = new PermissionCreateRequestMapper($data['name']);

        return $mapper;
    }
}

