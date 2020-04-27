<?php

namespace src\Applications\Http\Factories\Permission;

use src\Business\Mappers\Permission\Request\PermissionDeleteRequestMapper;

class PermissionDeleteRequestMapperFactory
{
    public static function make(array $data) : PermissionDeleteRequestMapper
    {
        $mapper = new PermissionDeleteRequestMapper($data['identifier']);

        return $mapper;
    }
}

