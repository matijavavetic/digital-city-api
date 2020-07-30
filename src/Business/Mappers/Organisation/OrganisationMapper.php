<?php

namespace src\Business\Mappers\Organisation;

use JsonSerializable;
use src\Data\Entities\City;
use src\Data\Entities\County;

class OrganisationMapper implements JsonSerializable
{
    private string $identifier;
    private string $name;
    private City $city;
    private County $county;
    private ?string $description;
    private ?string $primaryColor;
    private ?string $secondaryColor;
    private ?string $tertiaryColor;
    private ?string $logo;
    private ?array $users = null;

    public function __construct(string $identifier, string $name, City $city, County $county)
    {
        $this->identifier = $identifier;
        $this->name       = $name;
        $this->city       = $city;
        $this->county     = $county;
    }

    public function getIdentifier() : string
    {
        return $this->identifier;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function getCity() : City
    {
        return $this->city;
    }

    public function getCounty() : County
    {
        return $this->county;
    }

    public function setDescription(?string $description) : void
    {
        $this->description = $description;
    }

    public function setPrimaryColor(?string $primaryColor) : void
    {
        $this->primaryColor = $primaryColor;
    }

    public function setSecondaryColor(?string $secondaryColor) : void
    {
        $this->secondaryColor = $secondaryColor;
    }

    public function setTertiaryColor(?string $tertiaryColor) : void
    {
        $this->tertiaryColor = $tertiaryColor;
    }

    public function setLogo(?string $logo) : void
    {
        $this->logo = $logo;
    }

    public function setUsers(?array $users) : void
    {
        $this->users = $users;
    }

    public function jsonSerialize()
    {
        return [
            'identifier' => $this->identifier,
            'name' => $this->name,
            'city' => $this->city,
            'county' => $this->county,
            'description' => $this->description,
            'primaryColor' => $this->primaryColor,
            'secondaryColor' => $this->secondaryColor,
            'tertiaryColor' => $this->tertiaryColor,
            'logo' => $this->logo,
            'users' => $this->users
        ];
    }
}
