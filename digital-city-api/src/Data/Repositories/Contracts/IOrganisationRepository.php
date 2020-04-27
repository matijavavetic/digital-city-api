<?php

namespace src\Data\Repositories\Contracts;

use src\Data\Entities\Organisation;

interface IOrganisationRepository
{
    public function get(string $sort);
    public function getWith(string $sort, array $relations);
    public function findOne(string $identifier);
    public function findOneWith(string $identifier, array $relations);
    public function store(Organisation $organisation);
    public function destroy(Organisation $organisation);
}
