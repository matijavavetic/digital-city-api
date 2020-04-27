<?php

namespace src\Applications\Http\Factories\Organisation;

use src\Business\Mappers\Organisation\Request\OrganisationListRequestMapper;

class OrganisationListRequestMapperFactory
{
    public static function make(array $data) : OrganisationListRequestMapper
    {
        $mapper = new OrganisationListRequestMapper();

        if (isset($data['sort'])) {
            $mapper->setSort($data['sort']);
        }

        return $mapper;
    }
}

