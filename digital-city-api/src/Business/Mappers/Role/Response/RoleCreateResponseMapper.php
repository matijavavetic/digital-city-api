<?php

namespace src\Business\Mappers\Role\Response;

use JsonSerializable;

class RoleCreateResponseMapper implements JsonSerializable
{
    private string $identifier;

    private string $name;

    public function __construct(string $identifier, string $name)
    {
        $this->identifier = $identifier;
        $this->name       = $name;
    }

    public function getIdentifier() : string
    {
        return $this->identifier;
    }

    public function jsonSerialize()
    {
        return [
            'data' =>  [
                'identifier' => $this->identifier,
                'name'       => $this->name,
            ]
        ];
    }
}
