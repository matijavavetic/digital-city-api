<?php

namespace src\Data\Entities\Factories;

use src\Data\Entities\Contracts\IUserEntity;
use src\Data\Entities\User;
use src\Data\Mappers\Contracts\IUserCreateEntityMapper;

class UserEntityFactory
{
    public static function make(IUserCreateEntityMapper $mapper) : IUserEntity
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
}

