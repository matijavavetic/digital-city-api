<?php

namespace src\Business\Mappers\Permission\Response;

use JsonSerializable;
use src\Business\Mappers\Permission\PermissionMapper;

class PermissionInfoResponseMapper implements JsonSerializable
{
    private PermissionMapper $permissionMapper;

    public function getPermissionMapper(): PermissionMapper
    {
        return $this->permissionMapper;
    }

    public function setPermissionMapper(PermissionMapper $permissionMapper): void
    {
        $this->permissionMapper = $permissionMapper;
    }

    public function jsonSerialize()
    {
        return [
            'data' => $this->permissionMapper
        ];
    }
}
