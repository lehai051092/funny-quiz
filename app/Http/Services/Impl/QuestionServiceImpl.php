<?php


namespace App\Http\Services\Impl;


use App\Http\Repositories\QuestionRepositoryInterface;
use App\Http\Services\QuestionServiceInterface;
use App\Question;

class QuestionServiceImpl implements QuestionServiceInterface
{
    protected $questionRepository;

    public function __construct(QuestionRepositoryInterface $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    function getAll()
    {
        return $this->questionRepository->getAll();
    }

    function findById($id)
    {
        return $this->questionRepository->findById($id);
    }

    function store($request)
    {
        $question= new Question();
        $question->title=$request->title;
        $question->quiz_id=$request->quiz_id;
        return $this->questionRepository->store($question);
    }

    function delete($id)
    {
        // TODO: Implement delete() method.
    }

    function update($request, $id)
    {
        // TODO: Implement update() method.
    }
}
