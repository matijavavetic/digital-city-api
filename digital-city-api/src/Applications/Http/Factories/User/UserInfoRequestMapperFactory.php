<?php

namespace src\Applications\Http\Factories\User;

use src\Business\Mappers\User\Request\UserInfoRequestMapper;

class UserInfoRequestMapperFactory
{
    public static function make(array $data) : UserInfoRequestMapper
    {
        $mapper = new UserInfoRequestMapper($data['identifier']);

        $mapper->setRelations($data['relations']);

        return $mapper;
    }
}

