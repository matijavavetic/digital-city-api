<?php

namespace src\Business\Mappers\Organisation\Response;

use JsonSerializable;
use src\Business\Mappers\Organisation\OrganisationMapper;

class OrganisationInfoResponseMapper implements JsonSerializable
{
    private OrganisationMapper $organisationMapper;

    public function getOrganisationMapper(): OrganisationMapper
    {
        return $this->organisationMapper;
    }

    public function setOrganisationMapper(OrganisationMapper $organisationMapper): void
    {
        $this->organisationMapper = $organisationMapper;
    }

    public function jsonSerialize()
    {
        return [
            'data' => $this->organisationMapper
        ];
    }
}
