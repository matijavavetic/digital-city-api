<?php

namespace src\Applications\Http\Factories\Organisation;

use src\Business\Mappers\Organisation\Request\OrganisationDeleteRequestMapper;

class OrganisationDeleteRequestMapperFactory
{
    public static function make(array $data) : OrganisationDeleteRequestMapper
    {
        $mapper = new OrganisationDeleteRequestMapper($data['identifier']);

        return $mapper;
    }
}

