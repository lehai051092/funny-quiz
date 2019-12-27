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
        return $this->questionRepository->store($question);
    }

    function delete($id)
    {
        $question = $this->questionRepository->findById($id);
        return $this->questionRepository->delete($question);
    }

    function update($request)
    {
        $id = $request->id;
        $question = $this->questionRepository->findById($id);
        $question->title = $request->titleEdit;
        $question->desc = $request->descEdit;
        $question->content = $request->contentQuestionEdit;
        $question->category_id = $request->category_id;
        $question->type_id = $request->type_id;

        $this->questionRepository->saveQ($question);
    }

//    function updateAnswers($request)
//    {
//        foreach ($request->listAnswersOld as $key => $value) {
//            $id = $value->id;
//            $answer = $this->answerRepository->findById($id);
//            $answer->title = $value->title;
//            $answer->status = $value->status;
//            $answer->question_id = $value->question_id;
//
//            $this->answerRepository->saveA($answer);
//        }
//
//    }

    public function addQuestionToQuiz($request, $id)
    {
        $item = $request->question;

        foreach ($item as $id) {
            $question = $this->questionRepository->findById($id);
            $question->quiz_id = $request->id;
            $this->questionRepository->update($question);
        }
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
            $question->category_id = $request->category;
            $question->type_id = $request->type;

            $this->questionRepository->saveQ($question);
        }
    }

    function search($keyword)
    {
        return $this->questionRepository->search($keyword);

    }
}
