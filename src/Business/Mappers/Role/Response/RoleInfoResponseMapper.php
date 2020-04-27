<?php

namespace src\Business\Mappers\Role\Response;

use JsonSerializable;
use src\Business\Mappers\Role\RoleMapper;

class RoleInfoResponseMapper implements JsonSerializable
{
    private RoleMapper $roleMapper;

    public function getRoleMapper(): RoleMapper
    {
        return $this->roleMapper;
    }

    public function setRoleMapper(RoleMapper $roleMapper): void
    {
        $this->roleMapper = $roleMapper;
    }

    public function jsonSerialize()
    {
        return [
            'data' => $this->roleMapper
        ];
    }
}