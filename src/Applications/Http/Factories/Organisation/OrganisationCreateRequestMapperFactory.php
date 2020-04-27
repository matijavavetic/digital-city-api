<?php

namespace src\Applications\Http\Factories\Organisation;

use Ramsey\Uuid\Uuid;
use src\Business\Mappers\Organisation\Request\OrganisationCreateRequestMapper;

class OrganisationCreateRequestMapperFactory
{
    public static function make(array $data) : OrganisationCreateRequestMapper
    {
        $identifier = Uuid::uuid4()->getHex();

        $mapper = new OrganisationCreateRequestMapper($identifier, $data['name'], $data['city'], $data['county'], $data['country']);

        $mapper->setDescription($data['description']);
        $mapper->setPrimaryColor($data['primaryColor']);
        $mapper->setSecondaryColor($data['secondaryColor']);
        $mapper->setTertiaryColor($data['tertiaryColor']);
        $mapper->setLogo($data['logo']);

        return $mapper;
    }
}
