<?php

namespace src\Business\Mappers\Auth\Response;

use JsonSerializable;

class SignInResponseMapper implements JsonSerializable
{
    private string $jwtToken;
    private string $type;

    public function __construct(string $jwtToken, string $type)
    {
        $this->jwtToken = $jwtToken;
        $this->type     = $type;
    }

    public function getJwtToken(): string
    {
        return $this->jwtToken;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function jsonSerialize()
    {
        return [
            'type'  => $this->type,
            'token' => $this->jwtToken,
        ];
    }
}
