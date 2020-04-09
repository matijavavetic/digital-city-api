<?php

namespace src\Applications\Http\Factories\User;

use Illuminate\Support\Facades\Hash;
use src\Business\Mappers\User\Request\UserUpdateRequestMapper;

class UserUpdateRequestMapperFactory
{
    public static function make(array $data) : UserUpdateRequestMapper
    {
        $mapper = new UserUpdateRequestMapper($data['identifier']);

        $mapper->setEmail($data['email']);
        $mapper->setFirstName($data['firstName']);
        $mapper->setLastName($data['lastName']);
        $mapper->setBirthDate($data['birthDate']);
        $mapper->setCountry($data['country']);
        $mapper->setCity($data['city']);

        if (! is_null($data['email'])) {
            $mapper->setUsername(strtok($data['email'], '@'));
        } else {
            $mapper->setUsername(null);
        }

        if (! is_null($data['password'])) {
            $mapper->setPassword(Hash::make($data['password']));
        } else {
            $mapper->setPassword(null);
        }

        return $mapper;
    }
}

