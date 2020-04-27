<?php

namespace src\Data\Repositories;

use src\Data\Repositories\Contracts\IPermissionRepository;
use src\Data\Entities\Permission;

class PermissionRepository implements IPermissionRepository
{
    public function get(string $sort)
    {
        $permission = new Permission();

        return $permission->orderBy('id', $sort)->get();
    }

    public function findOne(string $identifier)
    {
        $permission = new Permission();

        return $permission->where('identifier', $identifier)->first();
    }

    public function store(Permission $permission)
    {
        return $permission->save();
    }

    public function destroy(Permission $permission)
    {
        return $permission->delete();
    }
}
