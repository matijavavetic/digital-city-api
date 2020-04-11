<?php

namespace src\Business\Mappers\Role;

use JsonSerializable;
use src\Business\Mappers\Permission\PermissionMapper;
use Illuminate\Database\Eloquent\Collection;

class RoleMapper implements JsonSerializable
{
    private string $identifier;
    private string $name;
    private array $permissionMapper;

    public function __construct(string $identifier, string $name, array $permissionMapper)
    {
        $this->identifier = $identifier;
        $this->name = $name;
        $this->permissionMapper = $permissionMapper;
    }

    public function getIdentifier() : string
    {
        return $this->identifier;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function jsonSerialize()
    {
        return [
            'identifier' => $this->identifier,
            'name'       => $this->name,
            'permissions' => $this->permissionMapper
        ];
    }
}
