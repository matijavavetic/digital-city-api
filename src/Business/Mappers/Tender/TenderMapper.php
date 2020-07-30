<?php

namespace src\Business\Mappers\Tender;

use Illuminate\Contracts\Support\Arrayable;
use JsonSerializable;

class TenderMapper implements Arrayable, JsonSerializable
{
    private string $identifier;
    private string $name;
    private string $type;
    private array $createdByUser;
    private array $organisation;
    private ?string $dateFrom;
    private ?string $dateTo;

    public function __construct(string $identifier, string $name, string $type)
    {
        $this->identifier = $identifier;
        $this->name       = $name;
        $this->type       = $type;
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

    public function setCreatedByUser(array $createdByUser) : void
    {
        $this->createdByUser = $createdByUser;
    }

    public function setOrganisation(array $organisation) : void
    {
        $this->organisation = $organisation;
    }

    public function setDateFrom(?string $dateFrom) : void
    {
        $this->dateFrom = $dateFrom;
    }

    public function setDateTo(?string $dateTo) : void
    {
        $this->dateTo = $dateTo;
    }

    public function toArray()
    {
        return [
            'identifier' => $this->identifier,
            'name' => $this->name,
            'type' => $this->type,
            'dateFrom' => $this->dateFrom,
            'dateTo' => $this->dateTo,
            'createdByUser' => $this->createdByUser,
            'organisation' => $this->organisation
        ];
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
