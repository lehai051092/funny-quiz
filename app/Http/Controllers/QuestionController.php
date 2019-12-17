<?php

namespace App\Http\Controllers;

use App\Http\Services\AnswerServiceInterface;
use App\Http\Services\CategoryServiceInteface;
use App\Http\Services\QuestionServiceInterface;
use App\Http\Services\QuizServiceInterface;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    protected $questionService;
    protected $quizService;
    protected $answerService;
    protected $categoryService;

    public function __construct(QuestionServiceInterface $questionService,
                                QuizServiceInterface $quizService,
                                AnswerServiceInterface $answerService,
                                CategoryServiceInteface $categoryService)
    {
        $this->questionService = $questionService;
        $this->quizService = $quizService;
        $this->answerService = $answerService;
        $this->categoryService=$categoryService;
    }

    public function questionsInQuiz($id)
    {
        $quiz = $this->quizService->findById($id);
        $questions = $quiz->questions;
        $answers = $this->answerService->getAll();
        return view('questions.list', compact('quiz', 'questions', 'answers'));
    }

    public function getAll()
    {
        $questions = $this->questionService->getAll();
        return view('questions.list-basic',compact('questions'));
    }


    public function create()
    {
//        $quiz = $this->quizService->findById($id);
        return view('questions.createForm');
    }


    public function store(Request $request)
    {
        $this->questionService->store($request);
        return redirect()->route('questions.basic');
    }

    public function delete($id)
    {
        $this->questionService->delete($id);
        return redirect()->back();
    }

    public function edit($id)
    {
        $question = $this->questionService->findById($id);
        $categories=$this->categoryService->getAll();

        return view('questions.editForm', compact('question', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $this->questionService->update($request, $id);
        return redirect()->route('questions.basic');
    }
}
