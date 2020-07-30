<?php

namespace src\Data\Entities\Contracts;

interface IUserEntity
{
    public function setIdentifier(string $identifier);
    public function setUsername(string $username);
    public function setFirstName(string $firstName);
    public function setLastName(string $lastName);
    public function setEmail(string $email);
    public function setPassword(string $password);
    public function setCity(string $city);
    public function setCountry(string $country);
    public function setAccessToken(string $accessToken);
    public function setActive(int $active);
}
