<?php

namespace src\Applications\Http\Factories\Role;

use src\Business\Mappers\Request\Role\RoleListRequestMapper;

class RoleListRequestMapperFactory
{
    public static function make(array $data) : RoleListRequestMapper
    {
        $mapper = new RoleListRequestMapper();

        if(isset($data['sort'])) {
            $mapper->setSort($data['sort']);
        }

        return $mapper;
    }
}

