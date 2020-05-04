<?php

namespace src\Data\Entities;

use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    protected $table = 'organisation';

    public $timestamps = false;

    protected $fillable = [
        'identifier', 'name', 'description',
        'city_id', 'county_id', 'primary_color',
        'secondary_color', 'tertiary_color', 'logo'
    ];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function county()
    {
        return $this->belongsTo(County::class, 'county_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function county()
    {
        return $this->belongsTo(County::class, 'county_id');
    }
}
