<?php

namespace src\Business\Factories\User;

use src\Data\Entities\Contracts\IUserEntity;
use src\Business\Mappers\User\Response\UserCreateResponseMapper;

class UserCreateResponseMapperFactory
{
    public static function make(IUserEntity $user) : UserCreateResponseMapper
    {
        $mapper = new UserCreateResponseMapper($user->getIdentifier());

        return $mapper;
    }
}

