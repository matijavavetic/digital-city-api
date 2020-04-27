<?php

namespace src\Business\Mappers\User\Response;

use JsonSerializable;
use src\Business\Mappers\Role\RoleMapper;
use src\Business\Mappers\User\UserMapper;

class UserInfoResponseMapper implements JsonSerializable
{
    private UserMapper $userMapper;

    public function getUserMapper(): UserMapper
    {
        return $this->userMapper;
    }

    public function setUserMapper(UserMapper $userMapper): void
    {
        $this->userMapper = $userMapper;
    }

    public function jsonSerialize()
    {
        return [
            'data' => $this->userMapper
        ];
    }
}
