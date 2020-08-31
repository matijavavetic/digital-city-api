<?php

namespace src\Business\Factories\User;

use src\Business\Mappers\User\Response\UserDeleteResponseMapper;
use src\Data\Entities\Contracts\IUserEntity;

class UserDeleteResponseMapperFactory
{
    public static function make(IUserEntity $user) : UserDeleteResponseMapper
    {
        $mapper = new UserDeleteResponseMapper($user->getIdentifier());

        return $mapper;
    }
}

