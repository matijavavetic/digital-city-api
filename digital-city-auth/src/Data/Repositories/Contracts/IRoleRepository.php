<?php

namespace src\Data\Repositories\Contracts;

interface IRoleRepository
{
    public function get(string $sort);
}