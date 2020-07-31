<?php

namespace src\Data\Entities;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use src\Data\Entities\Contracts\IUserEntity;

class User extends Authenticatable implements IUserEntity
{
    protected $table = "users";

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        'identifier', 'birth_date', 'country', 'city',
        'firstname', 'lastname', 'username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setIdentifier(string $identifier): void
    {
        $this->identifier = $identifier;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstname = $firstName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastname = $lastName;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function setBirthDate(?string $birthDate): void
    {
        $this->birth_date = $birthDate;
    }

    public function setCity(?string $city): void
    {
        $this->city = $city;
    }

    public function setCountry(?string $country): void
    {
        $this->country = $country;
    }

    public function setAccessToken(string $accessToken): void
    {
        $this->access_token = $accessToken;
    }

    public function setActive(?int $active): void
    {
        $this->is_active = $active;
    }

    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getFirstName() : string
    {
        return $this->firstname;
    }

    public function getLastName() : string
    {
        return $this->lastname;
    }

    public function getEmail() : string
    {
        return $this->email;
    }

    public function getCity() : string
    {
        return $this->city;
    }

    public function getBirthDate() : string
    {
        return $this->birth_date;
    }

    public function getCountry() : string
    {
        return $this->country;
    }

    public function getAccessToken() : string
    {
        return $this->access_token;
    }

    public function getActive() : int
    {
        return $this->is_active;
    }

    public function getRoles() : ?array
    {
        return $this->roles;
    }

    public function getOrganisations() : ?array
    {
        return $this->organisations;
    }

    public function getPermissions(): ?array
    {
        return $this->permissions;
    }

    public function roles() : BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'user_role');
    }

    public function permissions() : BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'user_permission');
    }

    public function tenders() : HasMany
    {
        return $this->hasMany(Tender::class, 'created_by_user_id');
    }
}
