<?php

namespace src\Data\Repositories;

use src\Data\Repositories\Contracts\IRoleRepository;
use src\Data\Entities\Role;

class RoleRepository implements IRoleRepository
{
    public function get()
    {
        $role = new Role();

        return $role->orderBy('id', 'asc')->get();
    }
}