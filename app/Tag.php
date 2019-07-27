<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts(){
        return $this->morphedByMany('App\Post', 'taggable'); //tagable is the name of the table
    }

    public function videos(){
        return $this->morphedByMany('App\Video', 'taggable'); //tagable is the name of the table
    }
}
