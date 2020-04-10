<?php

namespace src\Business\Services;

use Ramsey\Uuid\Uuid;
use src\Data\Entities\Role;
use src\Data\Repositories\RoleRepository;
use src\Business\Factories\Role\RoleInfoResponseMapperFactory;
use src\Business\Mappers\Role\Response\RoleInfoResponseMapper;
use src\Business\Mappers\Role\Response\RoleListResponseMapper;
use src\Business\Mappers\Role\Request\RoleListRequestMapper;
use src\Business\Mappers\Role\Request\RoleInfoRequestMapper;
use src\Business\Factories\Role\RoleListResponseMapperFactory;
use src\Business\Mappers\Role\Response\RoleCreateResponseMapper;
use src\Business\Mappers\Role\Request\RoleUpdateRequestMapper;
use src\Business\Factories\Role\RoleCreateResponseMapperFactory;
use src\Business\Factories\Role\RoleUpdateResponseMapperFactory;
use src\Business\Mappers\Role\Request\RoleCreateRequestMapper;
use src\Business\Mappers\Role\Response\RoleUpdateResponseMapper;

class RoleService
{
    private RoleRepository $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function getAll(RoleListRequestMapper $mapper) : RoleListResponseMapper
    {
        $roles = $this->roleRepository->get($mapper->getSort());

        $responseMapper = RoleListResponseMapperFactory::make($roles);

        return $responseMapper;
    }

    public function getOne(RoleInfoRequestMapper $mapper) : RoleInfoResponseMapper
    {
        $role = $this->roleRepository->findOne($mapper->getIdentifier());

        $responseMapper = RoleInfoResponseMapperFactory::make($role);

        return $responseMapper;
    }

    public function create(RoleCreateRequestMapper $mapper) : RoleCreateResponseMapper
    {
        $role = new Role();
        $role->identifier = Uuid::uuid4()->getHex();
        $role->name = $mapper->getName();

        $stored = null;

        $stored = $this->roleRepository->store($role);

        if($stored === false) {
            throw new \Exception("Failed to store new role!", 400);
        }

        $responseMapper = RoleCreateResponseMapperFactory::make($role);

        return $responseMapper;
    }

    public function update(RoleUpdateRequestMapper $mapper) : RoleUpdateResponseMapper
    {
        $role = $this->roleRepository->findOne($mapper->getIdentifier());

        $role->name = $mapper->getName();

        $stored = null;

        $stored = $this->roleRepository->store($role);

        if($stored === false) {
            throw new \Exception("Failed to update existing role!", 400);
        }

        $responseMapper = RoleUpdateResponseMapperFactory::make($role);

        return $responseMapper;
    }
}
