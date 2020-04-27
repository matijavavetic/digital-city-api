<?php

namespace src\Applications\Http\Factories\Permission;

use src\Business\Mappers\Permission\Request\PermissionListRequestMapper;

class PermissionListRequestMapperFactory
{
    public static function make(array $data) : PermissionListRequestMapper
    {
        $mapper = new PermissionListRequestMapper();

        if (isset($data['sort'])) {
            $mapper->setSort($data['sort']);
        }

        return $mapper;
    }
}

