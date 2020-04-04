<?php

namespace src\Business\Factories\User;

use src\Business\Mappers\User\Response\UserUpdateResponseMapper;
use src\Data\Entities\User;

class UserUpdateResponseMapperFactory
{
    public static function make(User $user) : UserUpdateResponseMapper
    {
        $mapper = new UserUpdateResponseMapper($user->uuid);

        return $mapper;
    }
}

