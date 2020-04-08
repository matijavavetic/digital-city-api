<?php

namespace src\Business\Mappers\User\Request;

class UserUpdateRequestMapper
{
    private array $userData;

    public function __construct(array $data)
    {
        $this->userData = $data;
    }

    public function getData() : array
    {
        return $this->userData;
    }

    public function getIdentifier() : string
    {
        return $this->userData['identifier'];
    }
}
