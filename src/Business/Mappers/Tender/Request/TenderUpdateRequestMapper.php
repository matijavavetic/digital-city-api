<?php

namespace src\Business\Mappers\Tender\Request;

class TenderUpdateRequestMapper
{
    private string $identifier;
    private ?string $name;
    private ?string $type;
    private ?string $dateFrom;
    private ?string $dateTo;

    public function __construct(string $identifier)
    {
        $this->identifier = $identifier;
    }

    public function getIdentifier() : string
    {
        return $this->identifier;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function getType() : string
    {
        return $this->type;
    }

    public function getDateFrom() : ?string
    {
        return $this->dateFrom;
    }

    public function getDateTo() : ?string
    {
        return $this->dateTo;
    }

    public function setName(?string $name) : void
    {
        $this->name = $name;
    }

    public function setType(?string $type) : void
    {
        $this->type = $type;
    }

    public function setDateFrom(?string $dateFrom) : void
    {
        $this->dateFrom = $dateFrom;
    }

    public function setDateTo(?string $dateTo) : void
    {
        $this->dateTo = $dateTo;
    }
}
