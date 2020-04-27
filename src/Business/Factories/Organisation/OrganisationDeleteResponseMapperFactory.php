<?php

namespace src\Business\Factories\Organisation;

use src\Business\Mappers\Organisation\Response\OrganisationDeleteResponseMapper;
use src\Data\Entities\Organisation;

class OrganisationDeleteResponseMapperFactory
{
    public static function make(Organisation $organisation) : OrganisationDeleteResponseMapper
    {
        $mapper = new OrganisationDeleteResponseMapper($organisation->identifier);

        return $mapper;
    }
}

