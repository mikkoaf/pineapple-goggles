<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TextLocation extends Model
{
    //

    protected $fillable = [
        'user_id',
        'person_id',
        'text_message_id',
        'location_history_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function dialoguePerson()
    {
        return $this->belongsTo('App\DialoguePerson');
    }

    public function textMessage()
    {
        return $this->belongsTo('App\TextMessage', 'text_message_id');
    }

    public function locationHistory()
    {
        return $this->belongsTo('App\LocationHistory', 'location_history_id');
    }

}
