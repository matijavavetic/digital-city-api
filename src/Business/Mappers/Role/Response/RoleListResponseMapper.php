<?php

namespace src\Business\Mappers\Role\Response;

use Illuminate\Contracts\Support\Arrayable;
use JsonSerializable;

class RoleListResponseMapper implements Arrayable, JsonSerializable
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

    public function toArray()
    {
        return [
            'data' => $this->roleMappers
        ];
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
