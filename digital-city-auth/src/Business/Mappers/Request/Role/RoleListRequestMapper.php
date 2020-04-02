<?php

namespace src\Business\Mappers\Request\Role;

class RoleListRequestMapper
{
    private string $sort;

    public function getSort() : string
    {
        return $this->sort;
    }

    public function setSort($sort): void
    {
        $this->sort = $sort;
    }
}