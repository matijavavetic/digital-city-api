<?php

namespace src\Business\Services;

use src\Data\Repositories\UserRepository;
use src\Business\Mappers\User\Request\UserListRequestMapper;
use src\Business\Mappers\User\Request\UserInfoRequestMapper;
use src\Business\Mappers\User\Response\UserInfoResponseMapper;
use src\Business\Mappers\User\Response\UserListResponseMapper;
use src\Business\Factories\User\UserListResponseMapperFactory;
use src\Business\Factories\User\UserInfoResponseMapperFactory;

class UserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAll(UserListRequestMapper $mapper) : UserListResponseMapper
    {
        $users = $this->userRepository->get($mapper->getSort());

        $responseMapper = UserListResponseMapperFactory::make($users);

        return $responseMapper;
    }

    public function getOne(UserInfoRequestMapper $mapper) : UserInfoResponseMapper
    {
        $user = $this->userRepository->findOne($mapper->getUuid());

        $responseMapper = UserInfoResponseMapperFactory::make($user);

        return $responseMapper;
    }
}
