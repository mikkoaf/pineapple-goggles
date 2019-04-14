<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LocationHistory 
 * Stores location information with timestamps.
 */
class LocationHistory extends Model
{
    //

    /**
     * Array of fillables in the model
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'person_id',
        'timestamp',
        'latitude',
        'longitude',
    ];

    /**
     * Relationship to user
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'foreign_key', 'other_key');
    }

    /**
     * Relationship to dialoguePerson
     *
     * @return void
     */
    public function dialoguePerson()
    {
        return $this->belongsTo('App\DialoguePerson');
    }

    /**
     * TODO: update to hasMany -relationship
     *
     * @return void
     */
    public function textLocation()
    {
        return $this->hasOne('App\TextLocation');
    }

}
