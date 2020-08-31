<?php

namespace src\Applications\Http\Factories\Auth;

use src\Business\Mappers\Auth\Request\SignOutRequestMapper;

class SignOutRequestFactory
{
    public static function make(array $data) : SignOutRequestMapper
    {
        $mapper = new SignOutRequestMapper($data['token']);

        return $mapper;
    }
}

