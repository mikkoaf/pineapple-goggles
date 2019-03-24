<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocationHistory extends Model
{
    //


    protected $fillable = [
        'user_id',
        'person_id',
        'timestamp',
        'latitude',
        'longitude',
    ];
}
