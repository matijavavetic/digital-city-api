<?php

namespace src\Business\Mappers\User;

use JsonSerializable;

class UserMapper implements JsonSerializable
{
    private string $identifier;
    private string $username;
    private string $email;
    private ?string $firstName;
    private ?string $lastName;
    private ?string $birthDate;
    private ?string $country;
    private ?string $city;

    public function __construct(string $identifier, string $username, string $email, ?string $firstName,
                                ?string $lastName, ?string $birthDate, ?string $country, ?string $city)
    {
        $this->identifier = $identifier;
        $this->username = $username;
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthDate = $birthDate;
        $this->country = $country;
        $this->city = $city;
    }

    public function getIdentifier() : string
    {
        return $this->identifier;
    }

    public function getUsername() : string
    {
        return $this->username;
    }

    public function getEmail() : string
    {
        return $this->email;
    }

    public function jsonSerialize()
    {
        return [
            'identifier' => $this->identifier,
            'username' => $this->username,
            'email' => $this->email,
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'birth_date' => $this->birthDate,
            'country' => $this->country,
            'city' => $this->city
        ];
    }
}
