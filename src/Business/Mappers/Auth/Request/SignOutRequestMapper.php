<?php

namespace src\Business\Mappers\Auth\Request;

class SignOutRequestMapper
{
    private string $accessToken;

    public function __construct(string $accessToken)
    {
        $this->accessToken = $accessToken;
    }

    public function getAccessToken(): string
    {
        return $this->accessToken;
    }
}
