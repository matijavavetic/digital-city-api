<?php

namespace src\Data\Entities;

use Illuminate\Database\Eloquent\Model;
use src\Data\Mappers\Contracts\IUserRelatedEntity;

class Permission extends Model implements IUserRelatedEntity
{
    protected $table = "permission";

    public $timestamps = false;

    protected $fillable = ['identifier', 'name'];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_permission');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_permission');
    }
}
