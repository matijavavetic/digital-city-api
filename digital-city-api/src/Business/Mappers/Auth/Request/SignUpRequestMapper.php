<?php

namespace src\Business\Mappers\Auth\Request;

class SignUpRequestMapper
{
    private string $identifier;
    private string $email;
    private string $username;
    private string $password;

    public function __construct(string $identifier, string $email, string $username, string $password)
    {
        $this->identifier = $identifier;
        $this->email      = $email;
        $this->username   = $username;
        $this->password   = $password;
    }

    public function getIdentifier()
    {
        return $this->identifier;
    }


    public function getEmail(): string
    {
        return $this->email;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
