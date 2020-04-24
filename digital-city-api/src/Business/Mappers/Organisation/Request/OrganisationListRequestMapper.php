<?php

namespace src\Business\Mappers\Organisation\Request;

class OrganisationListRequestMapper
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
