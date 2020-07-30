<?php

namespace src\Data\Mappers\Contracts;

interface IUserCreateEntityMapper
{
    public function getIdentifier(): string;
    public function getUsername(): string;
    public function getEmail(): string;
    public function getPassword(): string;
    public function getFirstName(): ?string;
    public function getLastName(): ?string;
    public function getBirthDate(): ?string;
    public function getCountry(): ?string;
    public function getCity(): ?string;

    public function setFirstName(?string $firstName): void;
    public function setLastName(?string $lastName): void;
    public function setBirthDate(?string $birthDate): void;
    public function setCountry(?string $country): void;
    public function setCity(?string $city): void;
}
