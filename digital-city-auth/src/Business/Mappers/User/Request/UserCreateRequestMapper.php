<?php

namespace src\Business\Mappers\User\Request;

class UserCreateRequestMapper
{
    private string $identifier;
    private string $username;
    private string $email;
    private string $password;
    private ?string $firstName;
    private ?string $lastName;
    private ?string $birthDate;
    private ?string $country;
    private ?string $city;

    public function __construct(array $data)
    {
        $this->identifier = $data['identifier'];
        $this->username   = $data['username'];
        $this->email      = $data['email'];
        $this->password   = $data['password'];
        $this->firstName  = $data['firstName'];
        $this->lastName   = $data['lastName'];
        $this->birthDate  = $data['birthDate'];
        $this->country    = $data['country'];
        $this->city       = $data['city'];
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

    public function getPassword() : string
    {
        return $this->password;
    }

    public function getFirstName() : ?string
    {
        return $this->firstName;
    }

    public function getLastName() : ?string
    {
        return $this->lastName;
    }

    public function getBirthDate() : ?string
    {
        return $this->birthDate;
    }

    public function getCountry() : ?string
    {
        return $this->country;
    }

    public function getCity() : ?string
    {
        return $this->city;
    }
}
