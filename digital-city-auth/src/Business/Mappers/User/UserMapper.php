<?php

namespace src\Business\Mappers\User;

use JsonSerializable;
use src\Data\Entities\User;

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

    public function __construct(User $user)
    {
        $this->identifier = $user->identifier;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->firstName = $user->firstName;
        $this->lastName = $user->lastName;
        $this->birthDate = $user->birthDate;
        $this->country = $user->country;
        $this->city = $user->city;
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
