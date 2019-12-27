<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    public function quiz(){
        return $this->belongsTo('App\Quiz');
    }
}
