<?php

namespace src\Data\Mappers\Contracts;

interface IUserUpdateEntityMapper
{
    public function getIdentifier() : string;
    public function getUsername() : ?string;
    public function getEmail() : ?string;
    public function getPassword() : ?string;
    public function getFirstName() : ?string;
    public function getLastName() : ?string;
    public function getBirthDate() : ?string;
    public function getCountry() : ?string;
    public function getCity() : ?string;
    public function getRoles() : ?array;
    public function getPermissions() : ?array;
    public function getOrganisations() : ?array;
}
