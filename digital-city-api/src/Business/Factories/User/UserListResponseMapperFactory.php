<?php

namespace src\Business\Factories\User;

use src\Business\Mappers\User\Response\UserListResponseMapper;
use Illuminate\Database\Eloquent\Collection;
use src\Business\Mappers\User\UserMapper;

class UserListResponseMapperFactory
{
    public static function make(Collection $collection) : UserListResponseMapper
    {
        $userMappers = [];

        foreach($collection as $user) {
            $userMapper = new UserMapper($user->identifier, $user->username, $user->email);

            $userMapper->setFirstName($user->firstname);
            $userMapper->setLastName($user->lastname);
            $userMapper->setBirthDate($user->birth_date);
            $userMapper->setCountry($user->country);
            $userMapper->setCity($user->city);

            $userMappers[] = $userMapper;
        }

        $mapper = new UserListResponseMapper();
        $mapper->setUserMappers($userMappers);

        return $mapper;
    }
}

