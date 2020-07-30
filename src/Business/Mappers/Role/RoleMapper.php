<?php

namespace src\Business\Mappers\Role;

use Illuminate\Contracts\Support\Arrayable;
use JsonSerializable;

class RoleMapper implements Arrayable, JsonSerializable
{
    private string $identifier;
    private string $name;
    private ?array $permissions = null;

    public function __construct(string $identifier, string $name)
    {
        $this->identifier  = $identifier;
        $this->name        = $name;
    }

    public function getIdentifier() : string
    {
        return $this->identifier;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function setPermissions(?array $permissions) : void
    {
        $this->permissions = $permissions;
    }

    public function toArray()
    {
        return [
            'identifier' => $this->identifier,
            'name' => $this->name,
            'permissions' => $this->permissions
        ];
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
