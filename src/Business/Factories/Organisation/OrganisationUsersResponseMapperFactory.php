<?php

namespace src\Business\Factories\Organisation;

use src\Business\Mappers\Organisation\OrganisationMapper;
use src\Business\Mappers\User\UserMapper;
use src\Data\Entities\Organisation;
use src\Business\Mappers\Organisation\Response\OrganisationUsersResponseMapper;

class OrganisationUsersResponseMapperFactory
{
    public static function make(Organisation $organisation) : OrganisationUsersResponseMapper
    {
        $usersMapper = [];

        foreach($organisation->users as $user) {
            $userMapper = new UserMapper($user->identifier, $user->username, $user->email);

            $userMapper->setFirstName($user->firstname);
            $userMapper->setLastName($user->lastname);
            $userMapper->setBirthDate($user->birth_date);
            $userMapper->setCountry($user->country);
            $userMapper->setCity($user->city);

            $usersMapper[] = $userMapper;
        }

        $organisationMapper = new OrganisationMapper($organisation->identifier, $organisation->name, $organisation->city, $organisation->county);

        $organisationMapper->setDescription($organisation->description);
        $organisationMapper->setPrimaryColor($organisation->primary_color);
        $organisationMapper->setSecondaryColor($organisation->secondary_color);
        $organisationMapper->setTertiaryColor($organisation->tertiary_color);
        $organisationMapper->setLogo($organisation->logo);
        $organisationMapper->setUsers($usersMapper);

        $mapper = new OrganisationUsersResponseMapper();
        $mapper->setOrganisationMapper($organisationMapper);

        return $mapper;
    }
}

