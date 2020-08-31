<?php

namespace src\Data\Entities;

use Illuminate\Database\Eloquent\Model;

class Tender extends Model
{
    protected $table = 'tender';

    protected $fillable = [
        'identifier', 'name', 'type',
        'created_by_user_id', 'organisation_id',
        'date_from', 'date_to'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by_user_id');
    }

    public function organisation()
    {
        return $this->belongsTo(Organisation::class, 'organisation_id');
    }
}
