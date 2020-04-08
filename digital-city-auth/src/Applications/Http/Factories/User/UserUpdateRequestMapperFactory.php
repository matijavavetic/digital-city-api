<?php

namespace src\Applications\Http\Factories\User;

use Illuminate\Support\Facades\Hash;
use src\Business\Mappers\User\Request\UserUpdateRequestMapper;

class UserUpdateRequestMapperFactory
{
    public static function make(array $data) : UserUpdateRequestMapper
    {
        if (isset($data['email'])) {
            $data['username'] = strtok($data['email'], '@');
        }

        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $mapper = new UserUpdateRequestMapper($data);

        return $mapper;
    }
}

