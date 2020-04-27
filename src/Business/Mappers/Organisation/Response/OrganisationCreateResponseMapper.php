<?php

namespace src\Business\Mappers\Organisation\Response;

use JsonSerializable;

class OrganisationCreateResponseMapper implements JsonSerializable
{
    private string $identifier;

    public function __construct(string $identifier)
    {
        $this->identifier = $identifier;
    }

    public function getIdentifier()
    {
        return $this->identifier;
    }

    public function jsonSerialize()
    {
        return [
            'data' =>  [
                'identifier' => $this->identifier
            ]
        ];
    }
}
