<?php

namespace src\Business\Factories\User;

use src\Business\Mappers\Organisation\OrganisationMapper;
use src\Business\Mappers\Permission\PermissionMapper;
use src\Business\Mappers\Role\RoleMapper;
use src\Business\Mappers\User\Response\UserListResponseMapper;
use Illuminate\Database\Eloquent\Collection;
use src\Business\Mappers\User\UserMapper;

class UserListResponseMapperFactory
{
    public static function make(Collection $collection) : UserListResponseMapper
    {
        $usersMapper = [];
        $rolesMapper = [];
        $permissionsMapper = [];
        $organisationsMapper = [];

        foreach($collection as $user) {
            if ($user->relationLoaded('roles')) {
                foreach ($user->roles as $role) {
                    $rolesMapper[] = new RoleMapper($role->identifier, $role->name);
                }
            }

            if ($user->relationLoaded('organisations')) {
                foreach ($user->organisations as $organisation) {
                    $organisationMapper = new OrganisationMapper($organisation->identifier, $organisation->name, $organisation->city, $organisation->country);
                    $organisationMapper->setDescription($organisation->description);
                    $organisationMapper->setPrimaryColor($organisation->primary_color);
                    $organisationMapper->setSecondaryColor($organisation->secondary_color);
                    $organisationMapper->setTertiaryColor($organisation->tertiary_color);
                    $organisationMapper->setLogo($organisation->logo);

                    $organisationsMapper[] = $organisationMapper;
                }
            }

            if ($user->relationLoaded('permissions')) {
                foreach ($user->permissions as $permission) {
                    $permissionsMapper[] = new PermissionMapper($permission->identifier, $permission->name);
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

            $usersMapper[] = $userMapper;
            $rolesMapper = [];
            $permissionsMapper = [];
            $organisationsMapper = [];
        }

        $mapper = new UserListResponseMapper();
        $mapper->setUserMappers($usersMapper);

        return $mapper;
    }
}

