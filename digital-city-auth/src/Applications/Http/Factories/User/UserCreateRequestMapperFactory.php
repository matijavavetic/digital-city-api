<?php

namespace src\Applications\Http\Factories\User;

use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;
use src\Business\Mappers\User\Request\UserCreateRequestMapper;

class UserCreateRequestMapperFactory
{
    public static function make(array $data) : UserCreateRequestMapper
    {
        $data['username'] = strtok($data['email'], '@');
        $data['identifier'] = Uuid::uuid4()->getHex();
        $data['password'] = Hash::make($data['password']);

        $mapper = new UserCreateRequestMapper($data);

        return $mapper;
    }
}

