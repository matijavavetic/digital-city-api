<?php

namespace src\Applications\Http\Factories\User;

use Illuminate\Support\Facades\Hash;
use src\Business\Mappers\User\Request\UserUpdateRequestMapper;

class UserUpdateRequestMapperFactory
{
    public static function make(array $data) : UserUpdateRequestMapper
    {
        $mapper = new UserUpdateRequestMapper($data['identifier']);

        if (isset($data['email'])) {
            $mapper->setEmail($data['email']);
        }

        if (isset($data['email'])) {
            $mapper->setUsername(strtok($data['email'], '@'));
        }

        if (isset($data['password'])) {
            $mapper->setPassword(Hash::make($data['password']));
        }

        if (isset($data['firstName'])) {
            $mapper->setFirstName($data['firstName']);
        }

        if (isset($data['lastName'])) {
            $mapper->setLastName($data['lastName']);
        }

        if (isset($data['birthDate'])) {
            $mapper->setBirthDate($data['birthDate']);
        }

        if (isset($data['country'])) {
            $mapper->setCountry($data['country']);
        }

        if (isset($data['city'])) {
            $mapper->setCity($data['city']);
        }

        return $mapper;
    }
}

