<?php

namespace src\Business\Mappers\Role\Request;

class RoleUpdateRequestMapper
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

    public function getName() : string
    {
        return $this->name;
    }
}