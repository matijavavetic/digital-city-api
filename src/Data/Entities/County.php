<?php

namespace src\Data\Entities;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    protected $table = 'county';

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
