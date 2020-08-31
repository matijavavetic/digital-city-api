<?php

namespace src\Business\Mappers\Role\Request;

class RoleInfoRequestMapper
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