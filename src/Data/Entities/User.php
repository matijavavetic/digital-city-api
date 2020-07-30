<?php

namespace src\Data\Entities;

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

    public function setIdentifier(string $identifier)
    {
        $this->identifier = $identifier;
    }

    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    public function setFirstName(string $firstName)
    {
        $this->firstname = $firstName;
    }

    public function setLastName(string $lastName)
    {
        $this->lastname = $lastName;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function setBirthDate(string $birthDate)
    {
        $this->birth_date = $birthDate;
    }

    public function setCity(string $city)
    {
        $this->city = $city;
    }

    public function setCountry(string $country)
    {
        $this->country = $country;
    }

    public function setAccessToken(string $accessToken)
    {
        $this->access_token = $accessToken;
    }

    public function setActive(int $active)
    {
        $this->is_active = $active;
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'user_permission');
    }

    public function tenders()
    {
        return $this->hasMany(Tender::class, 'created_by_user_id');
    }
}
