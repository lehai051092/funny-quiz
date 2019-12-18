<?php

namespace App\Http\Controllers;

use App\Http\Requests\BacsicInfoRequest;
use App\Http\Services\AnswerServiceInterface;
use App\Http\Services\CategoryServiceInteface;
use App\Http\Services\QuestionServiceInterface;
use App\Http\Services\QuizServiceInterface;


use Illuminate\Http\Request;

class QuizController extends Controller
{
    protected $quizService;
    protected $categoryService;
    protected $questionService;
    protected $answerService;

    public function __construct(QuizServiceInterface $quizService,
                                CategoryServiceInteface $categoryService,
                                QuestionServiceInterface $questionService,
                                AnswerServiceInterface $answerService)
    {
        $this->middleware('auth');
        $this->quizService = $quizService;
        $this->categoryService = $categoryService;
        $this->questionService = $questionService;
        $this->answerService=$answerService;
    }

    public function QuizzesInCategory($id)
    {
        $category = $this->categoryService->findById($id);
        $quizzes = $category->quizzes;
        return view('quizzes.list', compact('quizzes', 'category'));
    }

    public function getAll()
    {
        $quizzes = $this->quizService->getAll();
        return view('quizzes.list-basic', compact('quizzes'));
    }

    public function getAllQuestionsInCategory($id){
        $quiz = $this->quizService->findById($id);
        $questions = $quiz->questions;
        $answers = $this->answerService->getAll();
        return view('questions.list', compact('quiz', 'questions','answers'));
    }



    public function QuizDetail($id)
    {
        $quiz = $this->quizService->findById($id);
        return view('quizzes.quizDetail', compact('quiz'));
    }

    public function createQuizInCategory()
    {

        $categories = $this->categoryService->getAll();
        return view('quizzes.basic-info', compact('categories'));
    }

    public function store(BacsicInfoRequest $request)
    {
        $this->quizService->store($request);
        toastr()->success('ok');

        return view('index');
    }

    public function delete($id)
    {
        $this->quizService->delete($id);
        return redirect()->back();
    }

    public function edit($id)
    {
        $quiz = $this->quizService->findById($id);
        $category = $quiz->category;
        return view('quizzes.editForm', compact('quiz', 'category'));
    }

    public function update(Request $request, $id)
    {
        $this->quizService->update($request, $id);
        return redirect()->route('categories.list');
    }
}
