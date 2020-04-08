<?php

namespace src\Business\Factories\Entities;

class UserEntityFactory
{
    private string $username;
    public string $email;
    private string $password;
    private ?string $firstName;
    private ?string $lastName;
    private ?string $birthDate;
    private ?string $country;
    private ?string $city;

    public function make(array $data) : array
    {
        return $userData = [
            $this->username = $data['username'],
            $this->email = $data['email'],
            $this->password = $data['password'],
            $this->firstName = isset($data['first_name']) ? $data['first_name'] : null,
            $this->lastName = isset($data['last_name']) ? $data['last_name'] : null,
            $this->birthDate = isset($data['birth_date']) ? $data['birth_date'] : null,
            $this->country = isset($data['country']) ? $data['country'] : null,
            $this->city = isset($data['city']) ? $data['city'] : null,
        ];
    }
}
