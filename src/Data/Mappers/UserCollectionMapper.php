<?php

namespace src\Data\Mappers;

use Illuminate\Database\Eloquent\Collection;
use src\Data\Entities\User;

class UserCollectionMapper extends Collection
{
    public function tack(User $user)
    {
        $this->add($user);
    }
}
