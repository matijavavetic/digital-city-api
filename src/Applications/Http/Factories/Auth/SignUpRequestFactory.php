<?php

namespace src\Applications\Http\Factories\Auth;

use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;
use src\Business\Mappers\Auth\Request\SignUpRequestMapper;

class SignUpRequestFactory
{
    public static function make(array $data) : SignUpRequestMapper
    {
        $identifier = Uuid::uuid4()->getHex();
        $username = strtok($data['email'], '@');
        $password = Hash::make($data['password']);

        $mapper = new SignUpRequestMapper($identifier, $data['email'], $username, $password);

        return $mapper;
    }
}

