<?php

namespace src\Business\Mappers\Role;

use Illuminate\Contracts\Support\Arrayable;
use JsonSerializable;

class RoleMapper implements Arrayable, JsonSerializable
{
    private string $identifier;
    private string $name;
    private array $permissions;

    public function __construct(string $identifier, string $name, array $permissions)
    {
        $this->identifier  = $identifier;
        $this->name        = $name;
        $this->permissions = $permissions;
    }

    public function getIdentifier() : string
    {
        return $this->identifier;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function toArray()
    {
        return [
            'identifier'  => $this->identifier,
            'name'        => $this->name,
            'permissions' => $this->permissions
        ];
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
