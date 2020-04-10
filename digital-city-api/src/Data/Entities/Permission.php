<?php

namespace src\Data\Entities;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = "permission";

    public $timestamps = false;

    protected $fillable = ['identifier', 'name'];
}
