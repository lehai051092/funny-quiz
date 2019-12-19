<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResultDetail extends Model
{
    protected $table = 'result_details';

    public function result() {
        return $this->belongsTo('App\Result');
    }

    public function quizzes() {
        return $this->hasMany('App\Quiz');
    }
}
