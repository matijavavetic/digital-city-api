<?php

namespace src\Business\Mappers\Organisation\Request;

class OrganisationCreateRequestMapper
{
    private string $identifier;
    private string $name;
    private string $city;
    private string $county;
    private string $country;
    private ?string $description;
    private ?string $primaryColor;
    private ?string $secondaryColor;
    private ?string $tertiaryColor;
    private ?string $logo;

    public function __construct(string $identifier, string $name, string $city, string $county, string $country)
    {
        $this->identifier = $identifier;
        $this->name       = $name;
        $this->city       = $city;
        $this->county     = $county;
        $this->country    = $country;
    }

    public function getIdentifier() : string
    {
        return $this->identifier;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function getCity() : string
    {
        return $this->city;
    }

    public function getCounty() : string
    {
        return $this->county;
    }

    public function getCountry() : string
    {
        return $this->country;
    }

    public function getDescription() : ?string
    {
        return $this->description;
    }

    public function getPrimaryColor() : ?string
    {
        return $this->primaryColor;
    }

    public function getSecondaryColor() : ?string
    {
        return $this->secondaryColor;
    }

    public function getTertiaryColor() : ?string
    {
        return $this->tertiaryColor;
    }

    public function getLogo() : ?string
    {
        return $this->logo;
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
}
