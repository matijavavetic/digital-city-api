<?php

namespace src\Business\Mappers\User\Response;

use JsonSerializable;

class UserUpdateResponseMapper implements JsonSerializable
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
