<?php

namespace src\Business\Mappers\User\Request;

class UserListRequestMapper
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
