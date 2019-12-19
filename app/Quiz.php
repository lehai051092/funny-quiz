<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function questions(){
        return $this->hasMany('App\Question');
    }

    public function resultsDetails() {
        return $this->hasMany('App\ResultDetail');
    }
}
