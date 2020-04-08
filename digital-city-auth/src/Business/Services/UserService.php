<?php

namespace src\Business\Services;

use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;
use src\Business\Factories\User\UserCreateResponseMapperFactory;
use src\Business\Factories\User\UserDeleteResponseMapperFactory;
use src\Business\Factories\User\UserUpdateResponseMapperFactory;
use src\Business\Mappers\User\Request\UserDeleteRequestMapper;
use src\Business\Mappers\User\Request\UserUpdateRequestMapper;
use src\Business\Mappers\User\Response\UserDeleteResponseMapper;
use src\Business\Mappers\User\Response\UserUpdateResponseMapper;
use src\Data\Entities\User;
use src\Business\Mappers\User\Request\UserCreateRequestMapper;
use src\Business\Mappers\User\Response\UserCreateResponseMapper;
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
        $user = $this->userRepository->findOne($mapper->getIdentifier());

        $responseMapper = UserInfoResponseMapperFactory::make($user);

        return $responseMapper;
    }

    public function create(UserCreateRequestMapper $mapper) : UserCreateResponseMapper
    {
        $user = new User();

        $user->identifier = $mapper->getIdentifier();
        $user->username = $mapper->getUsername();
        $user->email = $mapper->getEmail();
        $user->password = $mapper->getPassword();
        $user->firstname = $mapper->getFirstName();
        $user->lastname = $mapper->getLastName();
        $user->birth_date = $mapper->getBirthDate();
        $user->country = $mapper->getCountry();
        $user->city = $mapper->getCity();

        $stored = null;

        $stored = $this->userRepository->store($user);

        if($stored === false) {
            throw new \Exception("Failed to store new user!", 400);
        }

        $responseMapper = UserCreateResponseMapperFactory::make($user);

        return $responseMapper;
    }

    public function update(UserUpdateRequestMapper $mapper) : UserUpdateResponseMapper
    {
        $user = $this->userRepository->findOne($mapper->getIdentifier());

        $stored = null;

        $stored = $this->userRepository->update($mapper->getData());

        if($stored === false) {
            throw new \Exception("Failed to update existing user!", 400);
        }

        $responseMapper = UserUpdateResponseMapperFactory::make($user);

        return $responseMapper;
    }

    public function delete(UserDeleteRequestMapper $mapper) : UserDeleteResponseMapper
    {
        $user = $this->userRepository->findOne($mapper->getIdentifier());

        $stored = null;

        $stored = $this->userRepository->destroy($user);

        if($stored === false) {
            throw new \Exception("Failed to delete user!", 400);
        }

        $responseMapper = UserDeleteResponseMapperFactory::make($user);

        return $responseMapper;
    }
}
