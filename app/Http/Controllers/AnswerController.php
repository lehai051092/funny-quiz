<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Http\Services\AnswerServiceInterface;
use App\Http\Services\QuestionServiceInterface;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    protected $answerService;
    protected $questionService;

    public function __construct(AnswerServiceInterface $answerService,
                                QuestionServiceInterface $questionService)
    {
        $this->answerService = $answerService;
        $this->questionService = $questionService;
    }

//    public function answersInQuestion($id)
//    {
//        $questions = $this->questionService->findById($id);
//        $answers = $questions->answers;
//        return view('questions.list', compact('questions', 'answers'));
//    }

    public function create($id)
    {
        $question = $this->questionService->findById($id);
        $answers = $question->answers;
        return view('answers.createForm', compact('question', 'answers'));
    }

    public function store(Request $request)
    {
        $this->answerService->store($request);
        return redirect()->route('categories.list');
    }

    public function delete($id)
    {
        $this->answerService->delete($id);
        return redirect()->route('categories.list');
    }

    public function edit($id)
    {
        $answer = $this->answerService->findById($id);
        $question = $answer->question;
        return view('answers.editForm', compact('answer', 'question'));
    }

    public function update(Request $request, $id)
    {
        $this->answerService->update($request, $id);
        return redirect()->route('categories.list');
    }
}
