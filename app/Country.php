<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function posts(){
        return $this->hasManyThrough('App\Post', 'App\User'); //First parameter is destination and second is through or medium
    }
}
