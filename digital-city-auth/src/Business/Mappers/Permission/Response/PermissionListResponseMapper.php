<?php

namespace src\Business\Mappers\Permission\Response;

use JsonSerializable;

class PermissionListResponseMapper implements JsonSerializable
{
    private array $permissionMappers;

    public function getPermissionMappers(): array
    {
        return $this->permissionMappers;
    }

    public function setPermissionMappers(array $permissionMappers): void
    {
        $this->permissionMappers = $permissionMappers;
    }

    public function jsonSerialize()
    {
        return [
            'data' => $this->permissionMappers
        ];
    }
}
