<?php

namespace src\Data\Repositories\Contracts;

use src\Data\Entities\User;

interface IUserRepository
{
    public function get(string $sort);
    public function findOne(string $identifier);
    public function store(User $user);
    public function destroy(User $user);
}
