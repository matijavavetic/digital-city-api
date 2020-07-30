<?php

namespace src\Data\Repositories\Contracts;

use src\Data\Entities\Tender;

interface ITenderRepository
{
    public function get(string $sort);
    public function findOne(string $identifier);
    public function store(Tender $tender);
    public function destroy(Tender $tender);
}
