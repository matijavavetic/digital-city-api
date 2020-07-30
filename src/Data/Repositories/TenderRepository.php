<?php

namespace src\Data\Repositories;

use src\Data\Entities\Tender;
use src\Data\Repositories\Contracts\ITenderRepository;

class TenderRepository implements ITenderRepository
{
    public function get(string $sort)
    {
        $tender = new Tender();

        return $tender->orderBy('id', $sort)->get();
    }

    public function findOne(string $identifier)
    {
        $tender = new Tender();

        return $tender->where('identifier', $identifier)->first();
    }

    public function store(Tender $tender)
    {
        return $tender->save();
    }

    public function destroy(Tender $tender)
    {
        return $tender->delete();
    }
}
