<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TextMessage extends Model
{
    //

    protected $fillable = [
        'user_id',
        'person_id',
        'person_name',
        'message',
        'message_sent',
        'connected',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
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
