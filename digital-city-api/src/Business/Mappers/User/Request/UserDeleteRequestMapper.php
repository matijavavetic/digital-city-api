<?php

namespace src\Business\Mappers\User\Request;

class UserDeleteRequestMapper
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
