<?php

namespace src\Applications\Http\Factories\User;

use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;
use src\Business\Mappers\User\Request\UserCreateRequestMapper;

class UserCreateRequestMapperFactory
{
    public static function make(array $data) : UserCreateRequestMapper
    {
        $mapper = new UserCreateRequestMapper($data['email']);

        $mapper->setUsername(strtok($data['email'], '@'));
        $mapper->setIdentifier(Uuid::uuid4()->getHex());
        $mapper->setPassword(Hash::make($data['password']));

        if (isset($data['firstName'])) {
            $mapper->setFirstName($data['firstName']);
        } else {
            $mapper->setFirstName(null);
        }

        if (isset($data['lastName'])) {
            $mapper->setLastName($data['lastName']);
        } else {
            $mapper->setLastName(null);
        }

        if (isset($data['birthDate'])) {
            $mapper->setBirthDate($data['birthDate']);
        } else {
            $mapper->setBirthDate(null);
        }

        if (isset($data['country'])) {
            $mapper->setCountry($data['country']);
        } else {
            $mapper->setCountry(null);
        }

        if (isset($data['city'])) {
            $mapper->setCity($data['city']);
        } else {
            $mapper->setCity(null);
        }

        return $mapper;
    }
}

