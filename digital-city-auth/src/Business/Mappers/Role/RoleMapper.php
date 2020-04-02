<?php

namespace src\Business\Mappers\Role;

use JsonSerializable;

class RoleMapper implements JsonSerializable
{
    private string $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function jsonSerialize()
    {
        return [
            'name' => $this->name
        ];
    }
}