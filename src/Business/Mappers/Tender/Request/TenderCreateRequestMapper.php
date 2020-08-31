<?php

namespace src\Business\Mappers\Tender\Request;

class TenderCreateRequestMapper
{
    private string $identifier;
    private string $name;
    private string $type;
    private int $createdByUser;
    private int $organisation;
    private ?string $dateFrom;
    private ?string $dateTo;

    public function __construct(string $identifier, string $name, string $type, int $createdByUser, int $organisation)
    {
        $this->identifier    = $identifier;
        $this->name          = $name;
        $this->type          = $type;
        $this->createdByUser = $createdByUser;
        $this->organisation  = $organisation;
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

    public function getCreatedByUser() : int
    {
        return $this->createdByUser;
    }

    public function getOrganisation() : int
    {
        return $this->organisation;
    }

    public function getDateFrom() : ?string
    {
        return $this->dateFrom;
    }

    public function getDateTo() : ?string
    {
        return $this->dateTo;
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
