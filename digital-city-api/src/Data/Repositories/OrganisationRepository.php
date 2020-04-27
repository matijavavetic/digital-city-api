<?php

namespace src\Data\Repositories;

use src\Data\Entities\Organisation;
use src\Data\Repositories\Contracts\IOrganisationRepository;

class OrganisationRepository implements IOrganisationRepository
{
    public function get(string $sort)
    {
        $organisation = new Organisation();

        return $organisation
            ->orderBy('id', $sort)
            ->get();
    }

    public function getWith(string $sort, array $relations)
    {
        $organisation = new Organisation();

        return $organisation
            ->orderBy('id', $sort)
            ->with($relations)
            ->get();
    }

    public function findOne(string $identifier)
    {
        $organisation = new Organisation();

        return $organisation
            ->where('identifier', $identifier)
            ->first();
    }

    public function findOneWith(string $identifier, array $relations)
    {
        $organisation = new Organisation();

        return $organisation
            ->where('identifier', $identifier)
            ->with($relations)
            ->first();
    }

    public function store(Organisation $organisation)
    {
        return $organisation->save();
    }

    public function destroy(Organisation $organisation)
    {
        return $organisation->delete();
    }
}
