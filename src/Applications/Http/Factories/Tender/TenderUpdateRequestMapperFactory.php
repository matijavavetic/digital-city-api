<?php

namespace src\Applications\Http\Factories\Tender;

use src\Business\Mappers\Tender\Request\TenderUpdateRequestMapper;

class TenderUpdateRequestMapperFactory
{
    public static function make(array $data) : TenderUpdateRequestMapper
    {
        $mapper = new TenderUpdateRequestMapper($data['identifier']);

        $mapper->setName($data['name']);
        $mapper->setType($data['type']);
        $mapper->setDateFrom($data['dateFrom']);
        $mapper->setDateTo($data['dateTo']);

        return $mapper;
    }
}

