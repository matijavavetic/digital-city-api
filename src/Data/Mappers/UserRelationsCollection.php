<?php

namespace src\Data\Mappers;

use Illuminate\Database\Eloquent\Collection;
use src\Data\Mappers\Contracts\IUserRelatedEntity;

class UserRelationsCollection extends Collection
{
    public function tack(IUserRelatedEntity $relatedEntity)
    {
        $this->add($relatedEntity);
    }
}
