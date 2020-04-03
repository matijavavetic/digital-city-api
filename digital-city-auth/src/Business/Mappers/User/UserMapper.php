<?php

namespace src\Business\Mappers\User;

use JsonSerializable;

class UserMapper implements JsonSerializable
{
    private string $uuid;
    private string $username;
    private string $firstName;
    private string $lastName;
    private string $email;
    private string $birthDate;
    private string $city;
    private string $country;

    public function __construct(string $uuid, string $username, string $firstName,
                                string $lastName, string $email, string $birthDate,
                                string $city, string $country)
    {
        $this->uuid = $uuid;
        $this->username = $username;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
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

    public function getFirstName() : string
    {
        return $this->firstName;
    }

    public function getLastName() : string
    {
        return $this->lastName;
    }

    public function getEmail() : string
    {
        return $this->email;
    }

    public function getBirthDate() : string
    {
        return $this->birthDate;
    }

    public function getCountry() : string
    {
        return $this->country;
    }

    public function getCity() : string
    {
        return $this->city;
    }

    public function jsonSerialize()
    {
        return [
            'uuid' => $this->uuid,
            'username' => $this->username,
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'email' => $this->email,
            'birth_date' => $this->birthDate,
            'country' => $this->country,
            'city' => $this->city,
        ];
    }
}
