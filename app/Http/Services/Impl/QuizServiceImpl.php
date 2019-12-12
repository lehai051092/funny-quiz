<?php


namespace App\Http\Services\Impl;


use App\Http\Repositories\QuizRepositoryInterface;
use App\Http\Repositories\TestRepositoryInterface;
use App\Http\Services\QuizServiceInterface;
use App\Quiz;

class QuizServiceImpl implements QuizServiceInterface
{
    protected $quizRepository;


    public function __construct(QuizRepositoryInterface $quizRepository)
    {
        $this->quizRepository = $quizRepository;
    }

    function getAll()
    {
        return $this->quizRepository->getAll();
    }

    function findById($id)
    {
        return $this->quizRepository->findById($id);
    }

    function store($request)
    {
        $quiz = new Quiz();
        $quiz->name = $request->name;
        $quiz->desc = $request->desc;
        $quiz->test_id = $request->test_id;
        $this->quizRepository->store($quiz);
    }

    function delete($id)
    {
       $
    }

    function update($request, $id)
    {
        // TODO: Implement update() method.
    }
}
