<?php

namespace src\Business\Mappers\Role\Response;

use JsonSerializable;

class RoleListResponseMapper implements JsonSerializable
{
    private array $roleMappers;

    public function getRoleMappers(): array
    {
        return $this->roleMappers;
    }

    public function setRoleMappers(array $roleMappers): void
    {
        $this->roleMappers = $roleMappers;
    }

    public function jsonSerialize()
    {
        return [
            'data' => $this->roleMappers
        ];
    }
}