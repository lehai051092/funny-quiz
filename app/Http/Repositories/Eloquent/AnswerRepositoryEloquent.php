<?php


namespace App\Http\Repositories\Eloquent;


use App\Answer;
use App\Http\Repositories\AnswerRepositoryInterface;

class AnswerRepositoryEloquent implements AnswerRepositoryInterface
{
    protected $answer;
    public function __construct(Answer $answer)
    {
        $this->answer=$answer;
    }

    function getAll()
    {
       return $this->answer->all();
    }

    function findById($id)
    {
        return $this->answer->findOrFail($id);
    }

    function store($obj)
    {
        $obj->save();
    }

    function delete($obj)
    {
       return $obj->delete();
    }

    function update($obj)
    {
        // TODO: Implement update() method.
    }
}
