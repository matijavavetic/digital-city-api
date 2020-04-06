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
            $userMappers[] = new UserMapper($user->identifier, $user->username, $user->email, $user->firstname, $user->lastname,
                                            $user->birth_date, $user->country, $user->city);
        }

        $mapper = new UserListResponseMapper();
        $mapper->setUserMappers($userMappers);

        return $mapper;
    }
}

