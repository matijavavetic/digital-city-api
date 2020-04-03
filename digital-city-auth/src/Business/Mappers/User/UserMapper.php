<?php

namespace src\Business\Mappers\User;

use JsonSerializable;

class UserMapper implements JsonSerializable
{
    private string $uuid;
    private string $username;
    private string $email;
    private ?string $firstName;
    private ?string $lastName;
    private ?string $birthDate;
    private ?string $country;
    private ?string $city;

    public function __construct(string $uuid, string $username, string $email, ?string $firstName,
                                ?string $lastName, ?string $birthDate, ?string $country, ?string $city)
    {
        $this->uuid = $uuid;
        $this->username = $username;
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthDate = $birthDate;
        $this->country = $country;
        $this->city = $city;
    }

    public function getUuid() : string
    {
        return $this->uuid;
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
            'uuid' => $this->uuid,
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
