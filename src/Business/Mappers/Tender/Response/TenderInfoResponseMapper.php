<?php

namespace src\Business\Mappers\Tender\Response;

use JsonSerializable;
use src\Business\Mappers\Tender\TenderMapper;

class TenderInfoResponseMapper implements JsonSerializable
{
    private TenderMapper $tenderMapper;

    public function getTenderMapper(): TenderMapper
    {
        return $this->tenderMapper;
    }

    public function setTenderMapper(TenderMapper $tenderMapper): void
    {
        $this->tenderMapper = $tenderMapper;
    }

    public function jsonSerialize()
    {
        return [
            'data' => $this->tenderMapper
        ];
    }
}
