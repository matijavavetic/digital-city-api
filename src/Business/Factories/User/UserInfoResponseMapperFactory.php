<?php

namespace src\Business\Factories\User;

use src\Business\Mappers\Organisation\OrganisationMapper;
use src\Business\Mappers\Permission\PermissionMapper;
use src\Business\Mappers\Role\RoleMapper;
use src\Data\Entities\Contracts\IUserEntity;
use src\Business\Mappers\User\UserMapper;
use src\Business\Mappers\User\Response\UserInfoResponseMapper;

class  UserInfoResponseMapperFactory
{
    public static function make(IUserEntity $user) : UserInfoResponseMapper
    {
        $rolesMapper = [];
        $permissionsMapper = [];
        $organisationsMapper = [];

        if ($user->relationLoaded('roles')) {
            foreach ($user->getRoles() as $role) {
                $rolesMapper[] = new RoleMapper($role->identifier, $role->name);
            }
        }

        if ($user->relationLoaded('permissions')) {
            foreach ($user->getPermissions() as $permission) {
                $permissionsMapper[] = new PermissionMapper($permission->identifier, $permission->name);
            }
        }

        if ($user->relationLoaded('organisations')) {
            foreach ($user->getOrganisations() as $organisation) {
                $organisationsMapper[] = new OrganisationMapper($organisation->identifier, $organisation->name, $organisation->city, $organisation->country);
            }
        }

        $userMapper = new UserMapper($user->getIdentifier(), $user->getUsername(), $user->getEmail());

        $userMapper->setFirstName($user->getFirstName());
        $userMapper->setLastName($user->getLastName());
        $userMapper->setBirthDate($user->getBirthDate());
        $userMapper->setCountry($user->getCountry());
        $userMapper->setCity($user->getCity());
        $userMapper->setRoles($rolesMapper);
        $userMapper->setPermissions($permissionsMapper);
        $userMapper->setOrganisations($organisationsMapper);

        $mapper = new UserInfoResponseMapper();
        $mapper->setUserMapper($userMapper);

        return $mapper;
    }
}

