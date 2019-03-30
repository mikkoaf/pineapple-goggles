<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TextLocation extends Model
{
    //

    protected $fillable = [
        'user_id',
        'person_id',
        'text_id',
        'location_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function dialoguePerson()
    {
        return $this->belongsTo('App\DialoguePerson');
    }

}
