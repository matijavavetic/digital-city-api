<?php

namespace src\Business\Mappers\User;

use JsonSerializable;

class UserMapper implements JsonSerializable
{
    private string $identifier;
    private string $username;
    private string $email;
    private ?array $roles = null;
    private ?array $permissions = null;
    private ?array $organisations = null;
    private ?string $firstName;
    private ?string $lastName;
    private ?string $birthDate;
    private ?string $country;
    private ?string $city;

    public function __construct(string $identifier, string $username, string $email)
    {
        $this->identifier = $identifier;
        $this->username   = $username;
        $this->email      = $email;
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

    public function setFirstName(?string $firstName) : void
    {
        $this->firstName = $firstName;
    }

    public function setLastName(?string $lastName) : void
    {
        $this->lastName = $lastName;
    }

    public function setBirthDate(?string $birthDate) : void
    {
        $this->birthDate = $birthDate;
    }

    public function setCountry(?string $country) : void
    {
        $this->country = $country;
    }

    public function setCity(?string $city) : void
    {
        $this->city = $city;
    }

    public function setRoles(?array $roles) : void
    {
        $this->roles = $roles;
    }

    public function setPermissions(?array $permissions) : void
    {
        if (empty($permissions) === false) {
            $this->permissions = $permissions;
        }
    }

    public function setOrganisations(?array $organisations) : void
    {
        $this->organisations = $organisations;
    }

    public function jsonSerialize()
    {
        return [
            'identifier' => $this->identifier,
            'username' => $this->username,
            'email' => $this->email,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'birthDate' => $this->birthDate,
            'country' => $this->country,
            'city' => $this->city,
            'roles' => $this->roles,
            'organisations' => $this->organisations,
            'permissions' =>  $this->permissions
        ];
    }
}
