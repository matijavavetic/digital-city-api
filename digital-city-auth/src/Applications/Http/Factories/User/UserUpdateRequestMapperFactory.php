<?php

namespace src\Applications\Http\Factories\User;

use src\Business\Mappers\User\Request\UserUpdateRequestMapper;

class UserUpdateRequestMapperFactory
{
    public static function make(array $data) : UserUpdateRequestMapper
    {
        $mapper = new UserUpdateRequestMapper($data);

        return $mapper;
    }
}

