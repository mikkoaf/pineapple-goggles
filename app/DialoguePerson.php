<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasMany
     */
    public function locationHistories()
    {
        return $this->hasMany(LocationHistory::class);
    }

    /**
     * @return HasMany
     */
    public function textMessages()
    {
        return $this->hasMany(TextMessage::class);
    }

    /**
     * @return HasMany
     */
    public function textLocations()
    {
        return $this->hasMany(TextLocation::class);
    }


}
