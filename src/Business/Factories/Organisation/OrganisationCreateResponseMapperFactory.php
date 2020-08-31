<?php

namespace src\Business\Factories\Organisation;

use src\Data\Entities\Organisation;
use src\Business\Mappers\Organisation\Response\OrganisationCreateResponseMapper;

class OrganisationCreateResponseMapperFactory
{
    public static function make(Organisation $organisation) : OrganisationCreateResponseMapper
    {
        $mapper = new OrganisationCreateResponseMapper($organisation->identifier);

        return $mapper;
    }
}

