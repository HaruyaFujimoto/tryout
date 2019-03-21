<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'name', 'object', ' description'
        ];
    public static $rules = array(
        'name' => 'required|unique:plans|between:3,20',
        'object' => 'required|between:1,300',
        'description' => 'required|between:1,300'
        );
    //
    public function skills() {
        return $this->belongsToMany('App\Skill');
    }
}
