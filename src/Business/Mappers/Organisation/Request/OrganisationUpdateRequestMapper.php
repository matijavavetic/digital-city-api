<?php

namespace src\Business\Mappers\Organisation\Request;

class OrganisationUpdateRequestMapper
{
    private string $identifier;
    private ?string $name;
    private ?int $cityIdentifier;
    private ?int $countyIdentifier;
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

    public function getName() : ?string
    {
        return $this->name;
    }

    public function getCity() : ?int
    {
        return $this->cityIdentifier;
    }

    public function getCounty() : ?int
    {
        return $this->countyIdentifier;
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

    public function setName(?string $name) : void
    {
        $this->name = $name;
    }

    public function setCity(?int $cityIdentifier) : void
    {
        $this->cityIdentifier = $cityIdentifier;
    }

    public function setCounty(?int $countyIdentifier) : void
    {
        $this->countyIdentifier = $countyIdentifier;
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
