<?php

namespace src\Business\Services;

use Ramsey\Uuid\Uuid;
use src\Business\Factories\Role\RoleCreateResponseMapperFactory;
use src\Business\Mappers\Role\Request\RoleCreateRequestMapper;
use src\Data\Repositories\RoleRepository;
use src\Data\Entities\Role;
use src\Business\Factories\Role\RoleInfoResponseMapperFactory;
use src\Business\Mappers\Role\Response\RoleInfoResponseMapper;
use src\Business\Mappers\Role\Response\RoleListResponseMapper;
use src\Business\Mappers\Role\Request\RoleListRequestMapper;
use src\Business\Mappers\Role\Request\RoleInfoRequestMapper;
use src\Business\Factories\Role\RoleListResponseMapperFactory;
use src\Business\Mappers\Role\Response\RoleCreateResponseMapper;

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
}