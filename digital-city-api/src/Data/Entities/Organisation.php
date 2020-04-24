<?php

namespace src\Data\Entities;

use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    protected $table = 'organisation';

    public $timestamps = false;

    protected $fillable = [
        'identifier', 'name', 'description', 'city',
        'county', 'country', 'primary_color',
        'secondary_color', 'tertiary_color', 'logo'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_organisations');
    }
}
