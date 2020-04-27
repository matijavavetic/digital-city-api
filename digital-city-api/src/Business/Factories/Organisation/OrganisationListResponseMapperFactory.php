<?php

namespace src\Business\Factories\Organisation;

use src\Business\Mappers\Organisation\OrganisationMapper;
use src\Business\Mappers\Organisation\Response\OrganisationListResponseMapper;
use Illuminate\Database\Eloquent\Collection;

class OrganisationListResponseMapperFactory
{
    public static function make(Collection $collection) : OrganisationListResponseMapper
    {
        $organisationsMapper = [];

        foreach($collection as $organisation) {
            $organisationMapper = new OrganisationMapper($organisation->identifier, $organisation->name, $organisation->city, $organisation->county, $organisation->country);

            $organisationMapper->setDescription($organisation->description);
            $organisationMapper->setPrimaryColor($organisation->primary_color);
            $organisationMapper->setSecondaryColor($organisation->secondary_color);
            $organisationMapper->setTertiaryColor($organisation->tertiary_color);
            $organisationMapper->setLogo($organisation->logo);

            $organisationsMapper[] = $organisationMapper;
        }

        $mapper = new OrganisationListResponseMapper();
        $mapper->setOrganisationMappers($organisationsMapper);

        return $mapper;
    }
}

