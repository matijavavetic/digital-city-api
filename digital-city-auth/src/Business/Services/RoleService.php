<?php

namespace src\Business\Services;

use src\Data\Repositories\RoleRepository;

class RoleService
{
    private RoleRepository $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function getAll()
    {
        return $this->roleRepository->get();
    }
}