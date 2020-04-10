<?php

namespace src\Data\Repositories\Contracts;

use src\Data\Entities\Role;

interface IRoleRepository
{
    public function get(string $sort);
    public function findOne(string $identifier);
    public function store(Role $role);
}