<?php

namespace src\Data\Entities\Contracts;

interface IUserEntity
{
    public function setIdentifier(string $identifier) : void;
    public function setUsername(string $username) : void;
    public function setFirstName(string $firstName) : void;
    public function setLastName(string $lastName) : void;
    public function setEmail(string $email) : void;
    public function setPassword(string $password) : void;
    public function setCity(string $city) : void;
    public function setCountry(string $country) : void;
    public function setAccessToken(string $accessToken) : void;
    public function setActive(int $active) : void;

    public function getPassword() : string;
    public function getUsername() : string;

    public function getRoles() : ?array;
    public function getOrganisations() : ?array;
    public function getPermissions() : ?array;
}
