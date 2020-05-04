<?php

namespace src\Applications\Http\Factories\Tender;

use Ramsey\Uuid\Uuid;

class TenderCreateRequestMapperFactory
{
    public static function make(array $data) : TenderCreateRequestMapper
    {
        $identifier = Uuid::uuid4()->getHex();
        $createdByUser = auth()->user()->id;
        $organisation = 1;

        $mapper = new TenderCreateRequestMapper($identifier, $data['name'], $data['type'], $createdByUser, $organisation);

        $mapper->setDateFrom($data['dateFrom']);
        $mapper->setDateTo($data['dateTo']);

        return $mapper;
    }
}
