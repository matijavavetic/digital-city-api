<?php

namespace src\Business\Factories\Auth;

use src\Business\Mappers\Auth\Response\SignOutResponseMapper;

class SignOutResponseMapperFactory
{
    public static function make() : SignOutResponseMapper
    {
        $message = "You have been signed out successfully!";

        $mapper = new SignOutResponseMapper($message, 200);

        return $mapper;
    }
}
