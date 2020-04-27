<?php

namespace src\Business\Factories\Auth;

use src\Business\Mappers\Auth\Response\SignUpResponseMapper;

class SignUpResponseMapperFactory
{
    public static function make() : SignUpResponseMapper
    {
        $message = "Please, check your email and confirm account activation. Thank you!";

        $mapper = new SignUpResponseMapper($message, 201);

        return $mapper;
    }
}

