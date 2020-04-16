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
        $roles = explode(', ', $data['roles']);

        $mapper = new UserCreateRequestMapper($identifier, $data['email'], $username, $password, $roles);

        $mapper->setFirstName($data['firstName']);
        $mapper->setLastName($data['lastName']);
        $mapper->setBirthDate($data['birthDate']);
        $mapper->setCountry($data['country']);
        $mapper->setCity($data['city']);

        if (is_null($data['permissions']) === false) {
            $permissions = explode(', ', $data['permissions']);
            $mapper->setPermissions($permissions);
        } else {
            $mapper->setPermissions(null);
        }

        return $mapper;
    }
}
