<?php

namespace src\Data\Entities;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "role";

    public $timestamps = false;

    protected $fillable = ['identifier', 'name'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_role');
    }
}
