<?php


namespace App\Http\Services\Impl;


use App\Answer;
use App\Http\Repositories\AnswerRepositoryInterface;
use App\Http\Services\AnswerServiceInterface;

class AnswerServiceImpl implements AnswerServiceInterface
{
    protected $answerRepository;

    public function __construct(AnswerRepositoryInterface $answerRepository)
    {
        $this->answerRepository = $answerRepository;
    }

    function getAll()
    {
        return $this->answerRepository->getAll();
    }

    function findById($id)
    {
        return $this->answerRepository->findById($id);
    }

    function store($request)
    {
        $answer = new Answer();
        $answer->title = $request->title;
        $answer->status = $request->status;
        $answer->question_id = $request->question_id;
        return $this->answerRepository->store($answer);
    }

    function delete($id)
    {
        $answer = $this->answerRepository->findById($id);
        return $this->answerRepository->delete($answer);
    }

    function update($request, $id)
    {
        $answer=$this->answerRepository->findById($id);
        $answer->title=$request->title;
        $answer->status=$request->status;
        return $this->answerRepository->update($answer);
    }
}
