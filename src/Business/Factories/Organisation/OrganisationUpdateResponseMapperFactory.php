<?php

namespace src\Business\Factories\Organisation;

use src\Business\Mappers\Organisation\Response\OrganisationUpdateResponseMapper;
use src\Data\Entities\Organisation;

class OrganisationUpdateResponseMapperFactory
{
    public static function make(Organisation $organisation) : OrganisationUpdateResponseMapper
    {
        $mapper = new OrganisationUpdateResponseMapper($organisation->identifier);

        return $mapper;
    }
}

