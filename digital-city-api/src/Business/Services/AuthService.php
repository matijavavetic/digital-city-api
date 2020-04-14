<?php

namespace src\Business\Services;

use src\Business\Factories\Auth\SignUpResponseMapperFactory;
use src\Business\Mappers\Auth\Request\SignUpRequestMapper;
use src\Business\Mappers\Auth\Response\SignUpResponseMapper;
use src\Data\Entities\User;
use src\Data\Repositories\UserRepository;

class AuthService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function signUp(SignUpRequestMapper $mapper) : SignUpResponseMapper
    {
        $user = new User();

        $user->identifier = $mapper->getIdentifier();
        $user->username = $mapper->getUsername();
        $user->email = $mapper->getEmail();
        $user->password = $mapper->getPassword();

        $stored = null;

        $stored = $this->userRepository->store($user);

        if ($stored === false) {
            throw new \Exception("Failed to store new user!", 400);
        }

        $responseMapper = SignUpResponseMapperFactory::make();

        return $responseMapper;
    }
}