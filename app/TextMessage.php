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

}
