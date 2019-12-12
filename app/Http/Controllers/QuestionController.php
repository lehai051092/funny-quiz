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

    public function store(Request $request)
    {
        $this->questionService->store($request);
        return redirect()->route('categories.list');
    }

    public function delete($id)
    {
        $this->questionService->delete($id);
        return redirect()->route('categories.list');
    }

    public function edit($id)
    {
        $question = $this->questionService->findById($id);
        $quiz = $this->quizService->findById($id);
        return view('question.editForm', compact('question', 'quiz'));
    }

    public function update(Request $request,$id){
        $this->questionService->update($request,$id);
        return redirect()->route('categories.list');
    }
}
