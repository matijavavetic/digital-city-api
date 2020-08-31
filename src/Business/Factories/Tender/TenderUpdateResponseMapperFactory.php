<?php

namespace src\Business\Factories\Tender;

use src\Data\Entities\Tender;
use src\Business\Mappers\Tender\Response\TenderUpdateResponseMapper;

class TenderUpdateResponseMapperFactory
{
    public static function make(Tender $tender) : TenderUpdateResponseMapper
    {
        $mapper = new TenderUpdateResponseMapper($tender->identifier);

        return $mapper;
    }
}

