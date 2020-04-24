<?php

namespace src\Business\Mappers\Organisation\Request;

class OrganisationUpdateRequestMapper
{
    private string $identifier;
    private ?string $name;
    private ?string $city;
    private ?string $county;
    private ?string $country;
    private ?string $description;
    private ?string $primaryColor;
    private ?string $secondaryColor;
    private ?string $tertiaryColor;
    private ?string $logo;

    public function __construct(string $identifier)
    {
        $this->identifier = $identifier;
    }

    public function getIdentifier() : string
    {
        return $this->identifier;
    }

    public function setName(?string $name) : void
    {
        $this->name = $name;
    }

    public function setCity(?string $city) : void
    {
        $this->city = $city;
    }

    public function setCounty(?string $county) : void
    {
        $this->county = $county;
    }

    public function setCountry(?string $country) : void
    {
        $this->country = $country;
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
