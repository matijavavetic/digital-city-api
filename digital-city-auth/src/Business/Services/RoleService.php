<?php

namespace src\Business\Services;

use src\Data\Repositories\RoleRepository;
use src\Business\Mappers\Request\Role\RoleListRequestMapper;

class RoleService
{
    private RoleRepository $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function getAll(RoleListRequestMapper $mapper)
    {
        return $this->roleRepository->get($mapper->getSort());
    }
}