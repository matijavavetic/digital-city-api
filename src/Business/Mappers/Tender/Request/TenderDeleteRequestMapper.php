<?php

namespace src\Business\Mappers\Tender\Request;

class TenderDeleteRequestMapper
{
    private string $identifier;

    public function __construct(string $identifier)
    {
        $this->identifier = $identifier;
    }

    public function getIdentifier() : string
    {
        return $this->identifier;
    }
}
