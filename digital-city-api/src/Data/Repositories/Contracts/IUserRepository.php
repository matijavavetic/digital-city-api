<?php

namespace src\Data\Repositories\Contracts;

use src\Data\Entities\User;

interface IUserRepository
{
    public function get(string $sort, array $relations);
    public function findOne(string $identifier);
    public function findOneWith(string $identifier, array $relations);
    public function store(User $user);
    public function destroy(User $user);
}
