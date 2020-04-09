<?php

namespace src\Data\Repositories\Contracts;

use src\Data\Entities\Permission;

interface IPermissionRepository
{
    public function get(string $sort);
    public function findOne(string $identifier);
    public function store(Permission $permission);
    public function destroy(Permission $permission);
}
