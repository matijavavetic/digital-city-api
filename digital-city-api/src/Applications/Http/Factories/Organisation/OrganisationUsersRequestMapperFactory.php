<?php

namespace src\Applications\Http\Factories\Organisation;

use src\Business\Mappers\Organisation\Request\OrganisationUsersRequestMapper;

class OrganisationUsersRequestMapperFactory
{
    public static function make(array $data) : OrganisationUsersRequestMapper
    {
        $mapper = new OrganisationUsersRequestMapper($data['identifier']);

        return $mapper;
    }
}

