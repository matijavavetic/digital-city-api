<?php

namespace src\Data\Entities;

use Illuminate\Database\Eloquent\Model;
use src\Data\Mappers\Contracts\IUserRelatedEntity;

class Role extends Model implements IUserRelatedEntity
{
    protected $table = "role";

    public $timestamps = false;

    protected $fillable = ['identifier', 'name'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_role');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permission');
    }
}
