<?php

namespace src\Applications\Http\Factories\Auth;

use src\Business\Mappers\Auth\Request\SignInRequestMapper;

class SignInRequestFactory
{
    public static function make(array $data) : SignInRequestMapper
    {
        $mapper = new SignInRequestMapper($data['email'], $data['password']);

        return $mapper;
    }
}

