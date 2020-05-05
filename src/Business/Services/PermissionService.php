<?php

namespace src\Business\Services;

use Ramsey\Uuid\Uuid;
use src\Data\Entities\Permission;
use src\Data\Enums\HttpStatusCode;
use src\Data\Repositories\PermissionRepository;
use src\Business\Factories\Permission\PermissionInfoResponseMapperFactory;
use src\Business\Mappers\Permission\Response\PermissionInfoResponseMapper;
use src\Business\Mappers\Permission\Response\PermissionListResponseMapper;
use src\Business\Mappers\Permission\Request\PermissionListRequestMapper;
use src\Business\Mappers\Permission\Request\PermissionInfoRequestMapper;
use src\Business\Mappers\Permission\Request\PermissionDeleteRequestMapper;
use src\Business\Factories\Permission\PermissionListResponseMapperFactory;
use src\Business\Mappers\Permission\Response\PermissionCreateResponseMapper;
use src\Business\Mappers\Permission\Request\PermissionUpdateRequestMapper;
use src\Business\Factories\Permission\PermissionCreateResponseMapperFactory;
use src\Business\Factories\Permission\PermissionDeleteResponseMapperFactory;
use src\Business\Factories\Permission\PermissionUpdateResponseMapperFactory;
use src\Business\Mappers\Permission\Request\PermissionCreateRequestMapper;
use src\Business\Mappers\Permission\Response\PermissionUpdateResponseMapper;
use src\Business\Mappers\Permission\Response\PermissionDeleteResponseMapper;

class PermissionService
{
    private PermissionRepository $permissionRepository;

    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    public function getAll(PermissionListRequestMapper $mapper) : PermissionListResponseMapper
    {
        $permissions = $this->permissionRepository->get($mapper->getSort());

        $responseMapper = PermissionListResponseMapperFactory::make($permissions);

        return $responseMapper;
    }

    public function getOne(PermissionInfoRequestMapper $mapper) : PermissionInfoResponseMapper
    {
        $permission = $this->permissionRepository->findOne($mapper->getIdentifier());

        $responseMapper = PermissionInfoResponseMapperFactory::make($permission);

        return $responseMapper;
    }

    public function create(PermissionCreateRequestMapper $mapper) : PermissionCreateResponseMapper
    {
        $permission = new Permission();

        $permission->identifier = Uuid::uuid4()->getHex();
        $permission->name = $mapper->getName();

        $stored = null;

        $stored = $this->permissionRepository->store($permission);

        if  ($stored === false) {
            throw new \Exception("Failed to store new permission!", HttpStatusCode::HTTP_BAD_REQUEST);
        }

        $responseMapper = PermissionCreateResponseMapperFactory::make($permission);

        return $responseMapper;
    }

    public function update(PermissionUpdateRequestMapper $mapper) : PermissionUpdateResponseMapper
    {
        $permission = $this->permissionRepository->findOne($mapper->getIdentifier());

        $permission->name = $mapper->getName();

        $stored = null;

        $stored = $this->permissionRepository->store($permission);

        if ($stored === false) {
            throw new \Exception("Failed to update existing permission!", HttpStatusCode::HTTP_BAD_REQUEST);
        }

        $responseMapper = PermissionUpdateResponseMapperFactory::make($permission);

        return $responseMapper;
    }

    public function delete(PermissionDeleteRequestMapper $mapper) : PermissionDeleteResponseMapper
    {
        $permission = $this->permissionRepository->findOne($mapper->getIdentifier());

        $stored = null;

        $stored = $this->permissionRepository->destroy($permission);

        if ($stored === false) {
            throw new \Exception("Failed to delete permission!", HttpStatusCode::HTTP_BAD_REQUEST);
        }

        $responseMapper = PermissionDeleteResponseMapperFactory::make($permission);

        return $responseMapper;
    }
}
