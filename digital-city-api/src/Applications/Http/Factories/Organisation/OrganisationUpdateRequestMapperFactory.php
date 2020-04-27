<?php

namespace src\Applications\Http\Factories\Organisation;

use src\Business\Mappers\Organisation\Request\OrganisationUpdateRequestMapper;

class OrganisationUpdateRequestMapperFactory
{
    public static function make(array $data) : OrganisationUpdateRequestMapper
    {
        $mapper = new OrganisationUpdateRequestMapper($data['identifier']);

        $mapper->setName($data['name']);
        $mapper->setCity($data['city']);
        $mapper->setCounty($data['county']);
        $mapper->setCountry($data['country']);
        $mapper->setDescription($data['description']);
        $mapper->setPrimaryColor($data['primaryColor']);
        $mapper->setSecondaryColor($data['secondaryColor']);
        $mapper->setTertiaryColor($data['tertiaryColor']);
        $mapper->setLogo($data['logo']);

        return $mapper;
    }
}

