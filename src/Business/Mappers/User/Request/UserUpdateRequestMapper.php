<?php

namespace src\Business\Mappers\User\Request;

use src\Business\Mappers\User\Request\Contracts\IUserUpdateRequestMapper;
use src\Data\Mappers\Contracts\IUserUpdateEntityMapper;

class UserUpdateRequestMapper implements IUserUpdateRequestMapper, IUserUpdateEntityMapper
{
    private string $identifier;
    private ?array $roles;
    private ?array $permissions;
    private ?array $organisations;
    private ?string $username;
    private ?string $email;
    private ?string $password;
    private ?string $firstName;
    private ?string $lastName;
    private ?string $birthDate;
    private ?string $country;
    private ?string $city;

    public function __construct(string $identifier)
    {
        $this->identifier = $identifier;
    }

    public function getIdentifier() : string
    {
        return $this->identifier;
    }

    public function getUsername() : ?string
    {
        return $this->username;
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

    public function getRoles() : ?array
    {
        return $this->roles;
    }

    public function getPermissions() : ?array
    {
        return $this->permissions;
    }

    public function getOrganisations() : ?array
    {
        return $this->organisations;
    }

    public function setUsername(?string $username) : void
    {
        $this->username = $username;
    }

    public function setEmail(?string $email) : void
    {
        $this->email = $email;
    }

    public function setPassword(?string $password) : void
    {
        $this->password = $password;
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
        $this->permissions = $permissions;
    }

    public function setOrganisations(?array $organisations) : void
    {
        $this->organisations = $organisations;
    }
}
