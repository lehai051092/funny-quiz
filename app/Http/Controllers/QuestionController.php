<?php

namespace App\Http\Controllers;

use App\Http\Services\AnswerServiceInterface;
use App\Http\Services\QuestionServiceInterface;
use App\Http\Services\QuizServiceInterface;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    protected $questionService;
    protected $quizService;
    protected $answerService;

    public function __construct(QuestionServiceInterface $questionService,
                                QuizServiceInterface $quizService,
                                AnswerServiceInterface $answerService)
    {
        $this->questionService = $questionService;
        $this->quizService = $quizService;
        $this->answerService=$answerService;
    }

    public function questionsInQuiz($id)
    {
        $quiz = $this->quizService->findById($id);
        $questions = $quiz->questions;
        $answers=$this->answerService->getAll();
        return view('questions.list', compact('quiz', 'questions','answers'));
    }

    public function create($id)
    {
        $quiz = $this->quizService->findById($id);
        return view('questions.createForm', compact('quiz'));
    }

    public function store(Request $request,$id)
    {
        $this->questionService->store($request);
        return redirect()->route('questions.list',['id'=>$id]);
    }

    public function delete($id)
    {
        $this->questionService->delete($id);
        return redirect()->back();
    }

    public function edit($id)
    {
        $question = $this->questionService->findById($id);
        $quiz = $question->quiz;
        return view('questions.editForm', compact('question', 'quiz'));
    }

    public function update(Request $request,$id){
        $this->questionService->update($request,$id);
        return redirect()->route('categories.list');
    }
}
