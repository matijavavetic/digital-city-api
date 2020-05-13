<?php

namespace src\Business\Factories\Tender;

use src\Business\Mappers\Tender\Response\TenderDeleteResponseMapper;
use src\Data\Entities\Tender;

class TenderDeleteResponseMapperFactory
{
    public static function make(Tender $tender) : TenderDeleteResponseMapper
    {
        $mapper = new TenderDeleteResponseMapper($tender->identifier);

        return $mapper;
    }
}

