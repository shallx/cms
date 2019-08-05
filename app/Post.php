<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    public $imgDir = "/Images/";
    //use SoftDeletes;
    //protected $dates = ['deleted_at'];
    protected $fillable = [ 'user_id', 'title', 'content', 'path'];
    

    public function user()
    {
        return $this->belongsTo('App\User'); 
    }

    public function photos(){
        return $this->morphMany('App\Photo', 'imageable');
    }

    public function tags(){
        return $this->morphToMany('App\Tag', 'taggable');
    }

    //Adding QueryScope

    public function scopeAccend($query){
        return $query->orderBy('id', 'asc')->get();
    }

    public function scopeDecend($query){
        return $query->orderBy('id', 'dsc')->get();
    }

    //Accessor

    public function getPathAttribute($value){
        return $this->imgDir . $value;
    }
}

