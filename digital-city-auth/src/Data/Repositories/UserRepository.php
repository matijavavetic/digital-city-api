<?php

namespace src\Data\Repositories;

use src\Data\Repositories\Contracts\IRoleRepository;
use src\Data\Entities\User;

class UserRepository implements IRoleRepository
{
    public function get(string $sort)
    {
        $user = new User();

        return $user->orderBy('id', $sort)->get();
    }

    public function findOne(string $identifier)
    {
        $user = new User();

        return $user->where('uuid', $identifier)->first();
    }
}
