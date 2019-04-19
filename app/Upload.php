<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'user_id', 'filename',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
