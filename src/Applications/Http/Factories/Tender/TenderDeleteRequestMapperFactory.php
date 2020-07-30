<?php

namespace src\Applications\Http\Factories\Tender;

use src\Business\Mappers\Tender\Request\TenderDeleteRequestMapper;

class TenderDeleteRequestMapperFactory
{
    public static function make(array $data) : TenderDeleteRequestMapper
    {
        $mapper = new TenderDeleteRequestMapper($data['identifier']);

        return $mapper;
    }
}

