<?php

namespace src\Business\Mappers\Organisation\Response;

use JsonSerializable;

class OrganisationListResponseMapper implements JsonSerializable
{
    private array $organisationMappers;

    public function getOrganisationMappers(): array
    {
        return $this->organisationMappers;
    }

    public function setOrganisationMappers(array $organisationMappers): void
    {
        $this->organisationMappers = $organisationMappers;
    }

    public function jsonSerialize()
    {
        return [
            'data' => $this->organisationMappers
        ];
    }
}
