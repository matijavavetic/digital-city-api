<?php

namespace src\Applications\Http\Factories\Permission;

use src\Business\Mappers\Permission\Request\PermissionUpdateRequestMapper;

class PermissionUpdateRequestMapperFactory
{
    public static function make(array $data) : PermissionUpdateRequestMapper
    {
        $mapper = new PermissionUpdateRequestMapper($data['identifier'], $data['name']);

        return $mapper;
    }
}

