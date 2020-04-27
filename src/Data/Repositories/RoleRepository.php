<?php

namespace src\Data\Repositories;

use src\Data\Repositories\Contracts\IRoleRepository;
use src\Data\Entities\Role;

class RoleRepository implements IRoleRepository
{
    public function get(string $sort)
    {
        $role = new Role();

        return $role->orderBy('id', $sort)->with('permissions')->get();
    }

    public function findOne(string $identifier)
    {
        $role = new Role();

        return $role->where('identifier', $identifier)->with('permissions')->first();
    }

    public function store(Role $role)
    {
        return $role->save();
    }

    public function destroy(Role $role)
    {
        return $role->delete();
    }
}
