<?php

namespace src\Business\Mappers\User\Request;

class UserInfoRequestMapper
{
    private string $identifier;
    private ?array $relations;

    public function __construct(string $identifier)
    {
        $this->identifier = $identifier;
    }

    public function getIdentifier() : string
    {
        return $this->identifier;
    }

    public function getRelations() : array
    {
        return $this->relations;
    }

    public function setRelations(?array $relations) : void
    {
        $this->relations = $relations;
    }
}
