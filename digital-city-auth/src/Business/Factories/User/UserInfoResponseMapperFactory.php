<?php

namespace src\Business\Factories\User;

use src\Data\Entities\User;
use src\Business\Mappers\User\UserMapper;
use src\Business\Mappers\User\Response\UserInfoResponseMapper;

class UserInfoResponseMapperFactory
{
    public static function make(User $role) : UserInfoResponseMapper
    {
        $roleMapper = new UserMapper($role->uuid, $role->name);

        $mapper = new UserInfoResponseMapper();
        $mapper->setRoleMapper($roleMapper);

        return $mapper;
    }
}

