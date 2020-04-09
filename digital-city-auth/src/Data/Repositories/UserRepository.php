<?php

namespace src\Data\Repositories;

use src\Data\Entities\User;
use src\Data\Repositories\Contracts\IUserRepository;

class UserRepository implements IUserRepository
{
    public function get(string $sort)
    {
        $user = new User();

        return $user->orderBy('id', $sort)->get();
    }

    public function findOne(string $identifier)
    {
        $user = new User();

        return $user->where('identifier', $identifier)->first();
    }

    public function store(User $user)
    {
        return $user->save();
    }

    public function destroy(User $user)
    {
        return $user->delete();
    }
}
