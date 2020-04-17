<?php

namespace src\Business\Factories\User;

use src\Business\Mappers\Role\RoleMapper;
use src\Data\Entities\User;
use src\Business\Mappers\User\UserMapper;
use src\Business\Mappers\User\Response\UserInfoResponseMapper;

class UserInfoResponseMapperFactory
{
    public static function make(User $user) : UserInfoResponseMapper
    {
        $roleMapper = [];

        foreach($user->Roles as $role) {
            $roleMapper[] = new RoleMapper($role->identifier, $role->name);
        }

        $userMapper = new UserMapper($user->identifier, $user->username, $user->email, $roleMapper);

        $userMapper->setFirstName($user->firstname);
        $userMapper->setLastName($user->lastname);
        $userMapper->setBirthDate($user->birth_date);
        $userMapper->setCountry($user->country);
        $userMapper->setCity($user->city);

        $mapper = new UserInfoResponseMapper();
        $mapper->setUserMapper($userMapper);

        return $mapper;
    }
}

