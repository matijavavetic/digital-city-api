<?php

namespace src\Business\Mappers\User\Request;

class UserUpdateRequestMapper
{
    private string $identifier;
    private ?string $email;
    private ?string $password;
    private ?string $firstName;
    private ?string $lastName;
    private ?string $birthDate;
    private ?string $country;
    private ?string $city;

    public function __construct(array $data)
    {
        $this->identifier = $data['identifier'];
        $this->email = isset($data['email']) ? $data['email'] : null;
        $this->password = isset($data['password']) ? $data['password'] : null;
        $this->firstName = isset($data['firstName']) ? $data['firstName'] : null;
        $this->lastName = isset($data['last_name']) ? $data['last_name'] : null;
        $this->birthDate = isset($data['birth_date']) ? $data['birth_date'] : null;
        $this->country = isset($data['country']) ? $data['country'] : null;
        $this->city = isset($data['city']) ? $data['city'] : null;
    }

    public function getIdentifier() : string
    {
        return $this->identifier;
    }

    public function getEmail() : ?string
    {
        return $this->email;
    }

    public function getPassword() : ?string
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
