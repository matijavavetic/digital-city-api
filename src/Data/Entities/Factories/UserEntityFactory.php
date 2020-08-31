<?php

namespace src\Data\Entities\Factories;

use src\Data\Entities\Contracts\IUserEntity;
use src\Data\Entities\User;
use src\Data\Mappers\Contracts\IUserCreateEntityMapper;
use src\Data\Mappers\Contracts\IUserUpdateEntityMapper;

class UserEntityFactory
{
    public static function make(IUserCreateEntityMapper $mapper): IUserEntity
    {
        $user = new User();

        $user->setIdentifier($mapper->getIdentifier());
        $user->setUsername($mapper->getUsername());
        $user->setEmail($mapper->getEmail());
        $user->setPassword($mapper->getPassword());
        $user->setFirstName($mapper->getFirstName());
        $user->setLastName($mapper->getLastName());
        $user->setBirthDate($mapper->getBirthDate());
        $user->setCountry($mapper->getCountry());
        $user->setCity($mapper->getCity());

        return $user;
    }

    public static function update(IUserEntity $user, IUserUpdateEntityMapper $mapper): IUserEntity
    {
        if ($mapper->getUsername() !== null) {
            $user->setUsername($mapper->getUsername());
        }

        if ($mapper->getEmail() !== null) {
            $user->setEmail($mapper->getEmail());
        }

        if ($mapper->getPassword() !== null) {
            $user->setPassword($mapper->getPassword());
        }

        if ($mapper->getFirstName() !== null) {
            $user->setFirstName($mapper->getFirstName());
        }

        if ($mapper->getLastName() !== null) {
            $user->setLastName($mapper->getLastName());
        }

        if ($mapper->getBirthDate() !== null) {
            $user->setBirthDate($mapper->getBirthDate());
        }

        if ($mapper->getCountry() !== null) {
            $user->setCountry($mapper->getCountry());
        }

        if ($mapper->getCity() !== null) {
            $user->setCity($mapper->getCity());
        }
    }
}

