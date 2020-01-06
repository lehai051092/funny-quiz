<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $table = 'questions';
    protected $fillable = [
    'quiz_id','title','desc','content','type_id','category_id'
    ];
    public function quiz()
    {
        return $this->belongsTo('App\Quiz');
    }

    public function answers(){
        return $this->hasMany('App\Answer');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function type(){
        return $this->belongsTo('App\Type');
    }
}
