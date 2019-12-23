<?php


namespace App\Http\Services\Impl;


use App\Answer;
use App\Http\Repositories\AnswerRepositoryInterface;
use App\Http\Repositories\QuestionRepositoryInterface;
use App\Http\Services\QuestionServiceInterface;
use App\Question;
use Illuminate\Support\Facades\DB;

class QuestionServiceImpl implements QuestionServiceInterface
{
    protected $questionRepository;
    protected $answerRepository;

    public function __construct(QuestionRepositoryInterface $questionRepository,
                                AnswerRepositoryInterface $answerRepository
    )
    {
        $this->questionRepository = $questionRepository;
        $this->answerRepository = $answerRepository;
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
        $question = new Question();
        $question->title = $request->title;
//        $question->quiz_id=$request->quiz_id;
        return $this->questionRepository->store($question);
    }

    function delete($id)
    {
        $question = $this->questionRepository->findById($id);
        return $this->questionRepository->delete($question);
    }

    function update($request, $id)
    {
        $question = $this->questionRepository->findById($id);
        $question->title = $request->title;
        $question->category_id = $request->category_id;
        return $this->questionRepository->update($question);
    }

    public function addQuestionToQuiz($request, $id)
    {
        $item = $request->question;

        foreach ($item as $id) {
            $question = $this->questionRepository->findById($id);
            $question->quiz_id = $request->id;
            $this->questionRepository->update($question);
        }
//        $question->title = $request->title;

    }

    public function removeQuestionInQuiz($request, $id)
    {
        $item = $request->quiz_id;
        foreach ($item as $id) {
            $question = $this->questionRepository->findById($id);
            $question->quiz_id = null;
            $this->questionRepository->update($question);
        }


    }

    function addQuestionAndAnswer($request)
    {
        if ($request->title) {
            $question = new Question();
            $question->title = $request->title;
            $question->desc = $request->desc;
            $question->content = $request->contentQ;
            $question->type = $request->type;

            $this->questionRepository->saveQ($question);
        }


    }

    function addAnswers($request)
    {
        $item = $request->addAnswer;
        dd($item);
        foreach ($item as $key => $value) {
            $answer = new Answer();
            $answer->title = $value->title_answer;

            $this->answerRepository->saveA($answer);
        }
    }
}
