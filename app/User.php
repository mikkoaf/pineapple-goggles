<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function dialoguePeople()
    {
        return $this->hasMany('App\DialoguePerson');
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

    public function uploads()
    {
        return $this->hasMany('App\Uploads');
    }
}
