<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function tests(){
        return $this->hasMany('App\Test');
    }
}
