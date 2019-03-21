<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'nickname', 'twitter_id', 'avatar',
    ];

    public function plans() {
        return $this->belongsToMany('App\Plan');
    }
    public function skills() {
        return $this->belongsToMany('App\Skill');
    }
}
