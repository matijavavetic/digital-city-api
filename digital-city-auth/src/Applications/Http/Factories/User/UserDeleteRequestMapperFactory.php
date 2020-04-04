<?php

namespace src\Applications\Http\Factories\User;

use src\Business\Mappers\User\Request\UserDeleteRequestMapper;

class UserDeleteRequestMapperFactory
{
    public static function make(array $data) : UserDeleteRequestMapper
    {
        $mapper = new UserDeleteRequestMapper($data['uuid']);

        return $mapper;
    }
}

