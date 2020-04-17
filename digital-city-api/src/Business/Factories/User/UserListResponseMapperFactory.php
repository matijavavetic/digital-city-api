<?php

namespace src\Business\Factories\User;

use src\Business\Mappers\Role\RoleMapper;
use src\Business\Mappers\User\Response\UserListResponseMapper;
use Illuminate\Database\Eloquent\Collection;
use src\Business\Mappers\User\UserMapper;

class UserListResponseMapperFactory
{
    public static function make(Collection $collection) : UserListResponseMapper
    {
        $userMappers = [];
        $roleMappers = [];

        foreach($collection as $user) {
            foreach($user->Roles as $role) {
                $roleMappers[] = new RoleMapper($role->identifier, $role->name, []);
                dump($roleMappers);
            }

            dd($roleMappers);

            $userMapper = new UserMapper($user->identifier, $user->username, $user->email, $roleMapper);

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

