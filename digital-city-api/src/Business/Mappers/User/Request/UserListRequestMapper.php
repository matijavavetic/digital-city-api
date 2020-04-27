<?php

namespace src\Business\Mappers\User\Request;

class UserListRequestMapper
{
    private string $sort = "DESC";
    private ?array $relations;

    public function getSort() : string
    {
        return $this->sort;
    }

    public function getRelations() : ?array
    {
        return $this->relations;
    }

    public function setSort($sort): void
    {
        $this->sort = $sort;
    }

    public function setRelations(?array $relations) : void
    {
        $this->relations = $relations;
    }
}
