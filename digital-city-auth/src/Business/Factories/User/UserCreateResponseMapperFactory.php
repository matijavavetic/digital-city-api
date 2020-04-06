<?php

namespace src\Business\Factories\User;

use src\Data\Entities\User;
use src\Business\Mappers\User\Response\UserCreateResponseMapper;

class UserCreateResponseMapperFactory
{
    public static function make(User $user) : UserCreateResponseMapper
    {
        $mapper = new UserCreateResponseMapper($user->identifier);

        return $mapper;
    }
}

