<?php

namespace src\Business\Factories\User;

use src\Business\Mappers\User\Response\UserUpdateResponseMapper;
use src\Data\Entities\Contracts\IUserEntity;

class UserUpdateResponseMapperFactory
{
    public static function make(IUserEntity $user) : UserUpdateResponseMapper
    {
        $mapper = new UserUpdateResponseMapper($user->getIdentifier());

        return $mapper;
    }
}

