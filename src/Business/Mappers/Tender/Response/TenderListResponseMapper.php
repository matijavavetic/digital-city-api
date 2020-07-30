<?php

namespace src\Business\Mappers\Tender\Response;

use Illuminate\Contracts\Support\Arrayable;
use JsonSerializable;

class TenderListResponseMapper implements Arrayable, JsonSerializable
{
    private array $tenderMappers;

    public function getTenderMappers(): array
    {
        return $this->tenderMappers;
    }

    public function setTenderMappers(array $tenderMappers): void
    {
        $this->tenderMappers = $tenderMappers;
    }

    public function toArray()
    {
        return [
            'data' => $this->tenderMappers
        ];
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
