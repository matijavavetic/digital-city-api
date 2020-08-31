<?php

namespace src\Business\Mappers\Role\Request;

class RoleListRequestMapper
{
    private string $sort = "DESC";

    public function getSort() : string
    {
        return $this->sort;
    }

    public function setSort($sort): void
    {
        $this->sort = $sort;
    }
}