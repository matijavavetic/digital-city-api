<?php

namespace src\Applications\Http\Factories\User;

use src\Business\Mappers\User\Request\UserCreateRequestMapper;

class UserCreateRequestMapperFactory
{
    public static function make(array $data) : UserCreateRequestMapper
    {
        $mapper = new UserCreateRequestMapper($data);

        return $mapper;
    }
}

