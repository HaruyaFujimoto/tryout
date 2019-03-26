<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Plan;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'nickname', 'twitter_id', 'avatar'
    ];
    // 1:n
    public function plans() {
        return $this->hasMany('App\Plan');
    }
    // n:n
    public function liked_plans() {
        return $this->belongsToMany('App\Plan');
    }
}
