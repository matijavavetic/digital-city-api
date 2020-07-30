<?php

namespace src\Applications\Http\Factories\User;

use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;
use src\Business\Mappers\User\Request\UserCreateRequestMapper;

class UserCreateRequestMapperFactory
{
    public static function make(array $data) : UserCreateRequestMapper
    {
        $identifier = Uuid::uuid4()->getHex();
        $username = strtok($data['email'], '@');
        $password = Hash::make($data['password']);

        $mapper = new UserCreateRequestMapper($identifier, $data['email'], $username, $password, $data['organisations']);

        $mapper->setFirstName($data['firstName']);
        $mapper->setLastName($data['lastName']);
        $mapper->setBirthDate($data['birthDate']);
        $mapper->setCountry($data['country']);
        $mapper->setCity($data['city']);

        if (is_null($data['permissions']) === false) {
            $mapper->setPermissions($data['permissions']);
        } else {
            $mapper->setPermissions(null);
        }

        if (is_null($data['roles']) === false) {
            $mapper->setRoles($data['roles']);
        } else {
            $mapper->setRoles(null);
        }

        return $mapper;
    }
}
