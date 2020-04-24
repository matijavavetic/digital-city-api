<?php

namespace src\Business\Factories\User;

use src\Business\Mappers\Organisation\OrganisationMapper;
use src\Business\Mappers\Permission\PermissionMapper;
use src\Business\Mappers\Role\RoleMapper;
use src\Data\Entities\User;
use src\Business\Mappers\User\UserMapper;
use src\Business\Mappers\User\Response\UserInfoResponseMapper;

class UserInfoResponseMapperFactory
{
    public static function make(User $user) : UserInfoResponseMapper
    {
        $rolesMapper = [];
        $userPermissionsMapper = [];
        $rolePermissionsMapper = [];
        $organisationsMapper = [];

        if ($user->relationLoaded('roles')) {
            foreach ($user->roles as $role) {
                foreach ($role->permissions as $permission) {
                    $rolePermissionsMapper[] = new PermissionMapper($permission->identifier, $permission->name);
                }

                $rolesMapper[] = new RoleMapper($role->identifier, $role->name, $rolePermissionsMapper);
            }
        }

        if ($user->relationLoaded('permissions')) {
            foreach ($user->permissions as $permission) {
                $userPermissionsMapper[] = new PermissionMapper($permission->identifier, $permission->name);
            }
        }

        if ($user->relationLoaded('organisations')) {
            foreach ($user->organisations as $organisation) {
                $organisationsMapper[] = new OrganisationMapper($organisation->identifier, $organisation->name, $organisation->city, $organisation->county, $organisation->country);
            }
        }

        $userMapper = new UserMapper($user->identifier, $user->username, $user->email, $rolesMapper, $userPermissionsMapper, $organisationsMapper);

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

