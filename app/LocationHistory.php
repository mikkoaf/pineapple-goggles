<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship to dialoguePerson
     *
     * @return BelongsTo
     */
    public function dialoguePerson(): BelongsTo
    {
        return $this->belongsTo(DialoguePerson::class);
    }

    /**
     * TODO: update to hasMany -relationship
     *
     * @return HasOne
     */
    public function textLocation(): HasOne
    {
        return $this->hasOne(TextLocation::class);
    }

}
