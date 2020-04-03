<?php

namespace src\Business\Mappers\User\Response;

use JsonSerializable;

class UserListResponseMapper implements JsonSerializable
{
    private array $userMappers;

    public function getRoleMappers(): array
    {
        return $this->userMappers;
    }

    public function setUserMappers(array $userMappers): void
    {
        $this->userMappers = $userMappers;
    }

    public function jsonSerialize()
    {
        return [
            'data' => $this->userMappers
        ];
    }
}
