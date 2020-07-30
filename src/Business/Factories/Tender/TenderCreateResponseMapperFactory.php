<?php

namespace src\Business\Factories\Tender;

use src\Data\Entities\Tender;
use src\Business\Mappers\Tender\Response\TenderCreateResponseMapper;

class TenderCreateResponseMapperFactory
{
    public static function make(Tender $tender) : TenderCreateResponseMapper
    {
        $mapper = new TenderCreateResponseMapper($tender->identifier);

        return $mapper;
    }
}

