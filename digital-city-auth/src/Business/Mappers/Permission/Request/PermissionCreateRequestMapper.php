<?php

namespace src\Business\Mappers\Permission\Request;

class PermissionCreateRequestMapper
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName() : string
    {
        return $this->name;
    }
}
