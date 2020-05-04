<?php

namespace src\Business\Factories\Organisation;

use src\Business\Mappers\Organisation\OrganisationMapper;
use src\Data\Entities\Organisation;
use src\Business\Mappers\Organisation\Response\OrganisationInfoResponseMapper;

class OrganisationInfoResponseMapperFactory
{
    public static function make(Organisation $organisation) : OrganisationInfoResponseMapper
    {
        $organisationMapper = new OrganisationMapper($organisation->identifier, $organisation->name, $organisation->city, $organisation->county);

        $organisationMapper->setDescription($organisation->description);
        $organisationMapper->setPrimaryColor($organisation->primary_color);
        $organisationMapper->setSecondaryColor($organisation->secondary_color);
        $organisationMapper->setTertiaryColor($organisation->tertiary_color);
        $organisationMapper->setLogo($organisation->logo);

        $mapper = new OrganisationInfoResponseMapper();
        $mapper->setOrganisationMapper($organisationMapper);

        return $mapper;
    }
}

