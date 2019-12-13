<?php


namespace App\Http\Repositories\Eloquent;


use App\Http\Repositories\QuizRepositoryInterface;
use App\Quiz;

class QuizRepositoryEloquent implements QuizRepositoryInterface
{
    protected $quiz;

    public function __construct(Quiz $quiz)
    {
        $this->quiz = $quiz;
    }

    function getAll()
    {
        return $this->quiz->all();
    }

    function findById($id)
    {
        return $this->quiz->findOrFail($id);
    }

    function store($obj)
    {
    return $obj->save();
    }

    function delete($obj)
    {
        return $obj->delete();
    }

    function update($obj)
    {
        $obj->save();
    }
}
