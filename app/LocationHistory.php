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

    public function user()
    {
        return $this->belongsTo('App\User', 'foreign_key', 'other_key');
    }

    public function dialoguePerson()
    {
        return $this->belongsTo('App\DialoguePerson');
    }

    public function textLocation()
    {
        return $this->belongsTo('App\TextLocation');
    }

}
