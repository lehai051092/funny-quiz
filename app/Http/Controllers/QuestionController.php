<?php

namespace App\Http\Controllers;

use App\Http\Services\QuestionServiceInterface;
use App\Http\Services\QuizServiceInterface;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    protected $questionService;
    protected $quizService;

    public function __construct(QuestionServiceInterface $questionService,
                                QuizServiceInterface $quizService)
    {
        $this->questionService = $questionService;
        $this->quizService = $quizService;
    }

    public function questionsInQuiz($id)
    {
        $quiz = $this->quizService->findById($id);
        $questions = $quiz->questions;
        return view('question.list', compact('quiz', 'questions'));
    }

    public function create($id)
    {
        $quiz = $this->quizService->findById($id);
        return view('question.createForm', compact('quiz'));
    }

    public function store(Request $request){
        $this->questionService->store($request);
        return redirect()->route('categories.list');
    }
}
