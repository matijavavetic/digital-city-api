<?php

namespace src\Data\Entities;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'city';

    protected $hidden = ['id'];

    public $timestamps = false;

    protected $fillable = [
        'identifier', 'code', 'name'
    ];

    public function organisations()
    {
        $this->hasMany(Organisation::class, 'city_id');
    }
}
