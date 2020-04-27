<?php

namespace src\Business\Mappers\Role\Request;

class RoleUpdateRequestMapper
{
    private string $identifier;
    private string $name;
    private ?array $permissions;

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

    public function getPermissions() : array
    {
        return $this->permissions;
    }

    public function setPermissions(?array $permissions) : void
    {
        $this->permissions = $permissions;
    }
}
