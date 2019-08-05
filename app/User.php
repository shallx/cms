<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
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

    public function post(){
        return $this->hasOne('App\Post');  //returns 'user_id' by default and adds Modal Post User_id is foreign key
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function photos(){
        return $this->morphMany('App\Photo', 'imageable');
    }

    //Accessor function
    public function getNameAttribute($value){  //'get' for Accessor,  'Name' is the attribute, Attribute is fixed word
        return strtoupper($value);
    }

    //Mutator function
    public function setNameAttribute($value){
        $this->attributes['name'] = strtoupper($value); //changes name attri
    }

}
