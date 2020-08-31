<?php

namespace src\Business\Services;

use Exception;
use src\Business\Factories\User\UserCreateResponseMapperFactory;
use src\Business\Factories\User\UserUpdateResponseMapperFactory;
use src\Business\Mappers\User\Request\UserCreateRequestMapper;
use src\Business\Mappers\User\Request\UserDeleteRequestMapper;
use src\Business\Mappers\User\Request\UserUpdateRequestMapper;
use src\Business\Mappers\User\Response\UserDeleteResponseMapper;
use src\Business\Mappers\User\Response\UserUpdateResponseMapper;
use src\Data\Entities\Factories\UserEntityFactory;
use src\Business\Mappers\User\Response\UserCreateResponseMapper;
use src\Data\Enums\HttpStatusCode;
use src\Data\Mappers\UserRelationsCollection;
use src\Data\Repositories\Contracts\IPermissionRepository;
use src\Data\Repositories\Contracts\IRoleRepository;
use src\Data\Repositories\Contracts\IUserRepository;
use src\Business\Mappers\User\Request\UserListRequestMapper;
use src\Business\Mappers\User\Request\UserInfoRequestMapper;
use src\Business\Mappers\User\Response\UserInfoResponseMapper;
use src\Business\Mappers\User\Response\UserListResponseMapper;
use src\Business\Factories\User\UserListResponseMapperFactory;
use src\Business\Factories\User\UserDeleteResponseMapperFactory;
use src\Business\Factories\User\UserInfoResponseMapperFactory;

class UserService
{
    private IUserRepository $userRepository;
    private IRoleRepository $roleRepository;
    private IPermissionRepository $permissionRepository;

    public function __construct(IUserRepository $userRepository, IRoleRepository $roleRepository, IPermissionRepository $permissionRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
    }

    public function getAll(UserListRequestMapper $mapper) : UserListResponseMapper
    {
        if ($mapper->getRelations() !== null) {
            $users = $this->userRepository->getWith($mapper->getSort(), $mapper->getRelations());
        } else {
            $users = $this->userRepository->get($mapper->getSort());
        }

         $responseMapper = UserListResponseMapperFactory::make($users);

        return $responseMapper;
    }

    public function getOne(UserInfoRequestMapper $mapper) : UserInfoResponseMapper
    {
        if ($mapper->getRelations() !== null) {
            $user = $this->userRepository->findOneWith($mapper->getIdentifier(), $mapper->getRelations());
        } else {
            $user = $this->userRepository->findOne($mapper->getIdentifier());
        }

        $responseMapper = UserInfoResponseMapperFactory::make($user);

        return $responseMapper;
    }

    public function create(UserCreateRequestMapper $mapper) : UserCreateResponseMapper
    {
        $user = UserEntityFactory::make($mapper);

        $userRelationsCollection = new UserRelationsCollection();

        if ($mapper->getRoles() !== null) {
            foreach ($mapper->getRoles() as $roleIdentifier) {
                $role = $this->roleRepository->findOne($roleIdentifier);
                $userRelationsCollection->tack($role);
            }
        }

        if ($mapper->getPermissions() !== null) {
            foreach ($mapper->getPermissions() as $permissionIdentifier) {
                $permission = $this->permissionRepository->findOne($permissionIdentifier);
                $userRelationsCollection->tack($permission);
            }
        }

        $this->userRepository->store($user, $userRelationsCollection);

        $responseMapper = UserCreateResponseMapperFactory::make($user);

        return $responseMapper;
    }

    public function update(UserUpdateRequestMapper $mapper) : UserUpdateResponseMapper
    {
        $user = $this->userRepository->findOne($mapper->getIdentifier());

        $updatedUser = UserEntityFactory::update($user, $mapper);

        $userRelationsCollection = new UserRelationsCollection();

        if ($mapper->getRoles() !== null) {
            foreach ($mapper->getRoles() as $roleIdentifier) {
                $role = $this->roleRepository->findOne($roleIdentifier);
                $userRelationsCollection->tack($role);
            }
        }

        if ($mapper->getPermissions() !== null) {
            foreach ($mapper->getPermissions() as $permissionIdentifier) {
                $permission = $this->permissionRepository->findOne($permissionIdentifier);
                $userRelationsCollection->tack($permission);
            }
        }

        $this->userRepository->store($updatedUser, $userRelationsCollection);

        $responseMapper = UserUpdateResponseMapperFactory::make($user);

        return $responseMapper;
    }

    public function delete(UserDeleteRequestMapper $mapper) : UserDeleteResponseMapper
    {
        $user = $this->userRepository->findOne($mapper->getIdentifier());

        $stored = $this->userRepository->destroy($user);

        if ($stored === false) {
            throw new Exception("Failed to delete user!", HttpStatusCode::HTTP_BAD_REQUEST);
        }

        $responseMapper = UserDeleteResponseMapperFactory::make($user);

        return $responseMapper;
    }
}
