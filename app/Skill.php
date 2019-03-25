<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Plan;

class Skill extends Model
{
    //
    protected $fillable = [
        'name' 
        ];
    public static $rules = array(
        'name' => 'required|between:1,20'
        );
    
    public function plans() {
        return $this->belongsToMany('App\Plan');
    }
}
