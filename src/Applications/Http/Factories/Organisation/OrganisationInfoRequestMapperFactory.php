<?php

namespace src\Applications\Http\Factories\Organisation;

use src\Business\Mappers\Organisation\Request\OrganisationInfoRequestMapper;

class OrganisationInfoRequestMapperFactory
{
    public static function make(array $data) : OrganisationInfoRequestMapper
    {
        $mapper = new OrganisationInfoRequestMapper($data['identifier']);

        return $mapper;
    }
}

