<?php

namespace src\Applications\Http\Factories\Tender;

use src\Business\Mappers\Tender\Request\TenderListRequestMapper;

class TenderListRequestMapperFactory
{
    public static function make(array $data) : TenderListRequestMapper
    {
        $mapper = new TenderListRequestMapper();

        if (isset($data['sort'])) {
            $mapper->setSort($data['sort']);
        }

        return $mapper;
    }
}

