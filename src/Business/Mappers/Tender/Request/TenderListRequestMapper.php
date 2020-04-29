<?php

namespace src\Business\Mappers\Tender\Request;

class TenderListRequestMapper
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
