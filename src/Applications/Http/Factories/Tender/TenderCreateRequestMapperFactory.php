<?php

namespace src\Applications\Http\Factories\Tender;

use Ramsey\Uuid\Uuid;
use src\Business\Mappers\Tender\Request\TenderCreateRequestMapper;

class TenderCreateRequestMapperFactory
{
    public static function make(array $data) : TenderCreateRequestMapper
    {
        $identifier = Uuid::uuid4()->getHex();
        $createdByUser = auth()->user()->id;

        $mapper = new TenderCreateRequestMapper($identifier, $data['name'], $data['type'], $createdByUser, $data['organisationIdentifier']);

        $mapper->setDateFrom($data['dateFrom']);
        $mapper->setDateTo($data['dateTo']);

        return $mapper;
    }
}
