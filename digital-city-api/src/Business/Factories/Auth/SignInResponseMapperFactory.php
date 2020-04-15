<?php

namespace src\Business\Factories\Auth;

use src\Business\Mappers\Auth\Response\SignInResponseMapper;

class SignInResponseMapperFactory
{
    public static function make(string $token, string $type) : SignInResponseMapper
    {
        $mapper = new SignInResponseMapper($token, $type);

        return $mapper;
    }
}

