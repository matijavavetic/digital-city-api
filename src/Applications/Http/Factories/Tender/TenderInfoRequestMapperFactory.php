<?php

namespace src\Applications\Http\Factories\Tender;

use src\Business\Mappers\Role\Request\RoleInfoRequestMapper;
use src\Business\Mappers\Tender\Request\TenderInfoRequestMapper;

class TenderInfoRequestMapperFactory
{
    public static function make(array $data) : TenderInfoRequestMapper
    {
        $mapper = new TenderInfoRequestMapper($data['identifier']);

        return $mapper;
    }
}

