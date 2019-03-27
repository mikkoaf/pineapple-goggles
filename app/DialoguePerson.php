<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Represents a person partaking in the conversation.
 */
class DialoguePerson extends Model
{
    //

    protected $fillable = [
        'user_id',
        'person_name',
    ];

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function locationHistories()
    {
        return $this->hasMany('App\LocationHistory');
    }

    public function textMessages()
    {
        return $this->hasMany('App\TextMessage');
    }

    public function textLocationRelations()
    {
        return $this->hasMany('App\TextLocation');
    }
}
