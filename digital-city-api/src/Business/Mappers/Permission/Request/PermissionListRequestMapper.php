<?php

namespace src\Business\Mappers\Permission\Request;

class PermissionListRequestMapper
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
