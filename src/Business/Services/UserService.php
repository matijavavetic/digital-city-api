<?php

namespace src\Business\Services;

use Illuminate\Database\QueryException;
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

        if($mapper->getRoles() !== null) {
            foreach ($mapper->getRoles() as $role) {
                $roleEntity = $this->roleRepository->findOne($role);
                $userRelationsCollection->tack($roleEntity);
            }
        }

        if($mapper->getPermissions() !== null) {
            foreach ($mapper->getPermissions() as $permission) {
                $permissionEntity = $this->permissionRepository->findOne($permission);
                $userRelationsCollection->tack($permissionEntity);
            }
        }

        $responseMapper = UserCreateResponseMapperFactory::make($user);

        return $responseMapper;
    }

    public function update(UserUpdateRequestMapper $mapper) : UserUpdateResponseMapper
    {
        $user = $this->userRepository->findOne($mapper->getIdentifier());

        if ($mapper->getUsername() !== null) {
            $user->username = $mapper->getUsername();
        }

        if ($mapper->getEmail() !== null) {
            $user->email = $mapper->getEmail();
        }

        if ($mapper->getPassword() !== null) {
            $user->password = $mapper->getPassword();
        }

        if ($mapper->getFirstName() !== null) {
            $user->firstname = $mapper->getFirstName();
        }

        if ($mapper->getLastName() !== null) {
            $user->lastname = $mapper->getLastName();
        }

        if ($mapper->getBirthDate() !== null) {
            $user->birth_date = $mapper->getBirthDate();
        }

        if ($mapper->getCountry() !== null) {
            $user->country = $mapper->getCountry();
        }

        if ($mapper->getCity() !== null) {
            $user->city = $mapper->getCity();
        }

        $stored = $this->userRepository->store($user);

        if ($stored === false) {
            throw new \Exception("Failed to update existing user!", HttpStatusCode::HTTP_BAD_REQUEST);
        }

        if ($mapper->getRoles() !== null) {
            try {
                $user->roles()->sync($mapper->getRoles());
            } catch (QueryException $e) {
                throw new \Exception("Failed to store user's roles!", HttpStatusCode::HTTP_BAD_REQUEST);
            }
        }

        if ($mapper->getPermissions() !== null) {
            try {
                $user->permissions()->sync($mapper->getPermissions());
            } catch (QueryException $e) {
                throw new \Exception("Failed to store user's permissions!", HttpStatusCode::HTTP_BAD_REQUEST);
            }
        }

        $responseMapper = UserUpdateResponseMapperFactory::make($user);

        return $responseMapper;
    }

    public function delete(UserDeleteRequestMapper $mapper) : UserDeleteResponseMapper
    {
        $user = $this->userRepository->findOne($mapper->getIdentifier());

        $stored = $this->userRepository->destroy($user);

        if ($stored === false) {
            throw new \Exception("Failed to delete user!", HttpStatusCode::HTTP_BAD_REQUEST);
        }

        $responseMapper = UserDeleteResponseMapperFactory::make($user);

        return $responseMapper;
    }
}
