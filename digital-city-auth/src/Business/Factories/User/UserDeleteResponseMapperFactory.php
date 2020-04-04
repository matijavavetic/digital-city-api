<?php

namespace src\Business\Factories\User;

use src\Business\Mappers\User\Response\UserDeleteResponseMapper;
use src\Data\Entities\User;

class UserDeleteResponseMapperFactory
{
    public static function make(User $user) : UserDeleteResponseMapper
    {
        $mapper = new UserDeleteResponseMapper($user->uuid);

        return $mapper;
    }
}

