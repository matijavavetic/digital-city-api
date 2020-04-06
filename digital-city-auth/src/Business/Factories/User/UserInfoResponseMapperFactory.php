<?php

namespace src\Business\Factories\User;

use src\Data\Entities\User;
use src\Business\Mappers\User\UserMapper;
use src\Business\Mappers\User\Response\UserInfoResponseMapper;

class UserInfoResponseMapperFactory
{
    public static function make(User $user) : UserInfoResponseMapper
    {
        $userMapper = new UserMapper($user->identifier, $user->username, $user->email, $user->firstname, $user->lastname,
        $user->birth_date, $user->country, $user->city);

        $mapper = new UserInfoResponseMapper();
        $mapper->setUserMapper($userMapper);

        return $mapper;
    }
}

