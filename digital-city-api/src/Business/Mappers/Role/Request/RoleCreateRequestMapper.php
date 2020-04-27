<?php

namespace src\Business\Mappers\Role\Request;

class RoleCreateRequestMapper
{
    private string $name;
    private array $permissions;

    public function __construct(string $name, array $permissions)
    {
        $this->name        = $name;
        $this->permissions = $permissions;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function getPermissions() : array
    {
        return $this->permissions;
    }
}
