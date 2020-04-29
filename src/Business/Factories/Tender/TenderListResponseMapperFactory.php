<?php

namespace src\Business\Factories\Tender;

use src\Business\Mappers\Organisation\OrganisationMapper;
use src\Business\Mappers\Tender\Response\TenderListResponseMapper;
use Illuminate\Database\Eloquent\Collection;
use src\Business\Mappers\Tender\TenderMapper;
use src\Business\Mappers\User\UserMapper;

class TenderListResponseMapperFactory
{
    public static function make(Collection $collection) : TenderListResponseMapper
    {
        $tendersMapper = [];

        foreach($collection as $tender) {
            $userMapper[] = new UserMapper($tender->users->identifier, $tender->users->username, $tender->users->email);
            $organisationMapper[] = new OrganisationMapper($tender->organisations->identifier, $tender->organisations->name, $tender->organisations->city, $tender->organisations->county, $tenders->organisations->country);
            $tenderMapper = new TenderMapper($tender->identifier, $tender->name, $tender->type);

            $tenderMapper->setDateFrom($tender->date_from);
            $tenderMapper->setDateTo($tender->date_to);
            $tenderMapper->setCreatedByUser($userMapper);
            $tenderMapper->setOrganisation($organisationMapper);

            $tendersMapper[] = $tenderMapper;
        }

        $mapper = new TenderListResponseMapper();
        $mapper->setTenderMappers($tendersMapper);

        return $mapper;
    }
}

