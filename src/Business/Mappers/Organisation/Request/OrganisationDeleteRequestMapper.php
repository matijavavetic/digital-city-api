<?php

namespace src\Business\Mappers\Organisation\Request;

class OrganisationDeleteRequestMapper
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
