<?php

namespace src\Applications\Http\Factories\User;

use src\Business\Mappers\User\Request\UserListRequestMapper;

class UserListRequestMapperFactory
{
    public static function make(array $data) : UserListRequestMapper
    {
        $mapper = new UserListRequestMapper();
        $mapper->setRelations($data['relations']);

        if (isset($data['sort'])) {
            $mapper->setSort($data['sort']);
        }

        return $mapper;
    }
}

