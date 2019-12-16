<?php

namespace App\Http\Controllers;


use App\Http\Services\Impl\CategoryServiceImpl;
use App\Http\Services\Impl\QuizServiceImpl;

use App\Http\Services\Impl\TestServiceImpl;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    protected $quizService;
    protected $categoryService;
    protected $testService;

    public function __construct(QuizServiceImpl $quizService,
                                CategoryServiceImpl $categoryService,
                                TestServiceImpl $testService
    )
    {
        $this->middleware('auth');
        $this->quizService = $quizService;
        $this->categoryService = $categoryService;
        $this->testService = $testService;
    }

    public function QuizzesInTest($id)
    {
        $test = $this->testService->findById($id);
        $quizzes = $test->quizzes;
        return view('quizzes.list', compact('test', 'quizzes'));
    }

    public function createQuizInCategory()
    {

        $categories = $this->categoryService->getAll();

        return view('quizzes.basic-info', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->quizService->store($request);
        return redirect()->route('categories.list');
    }

    public function delete($id)
    {
        $this->quizService->delete($id);
        return redirect()->route('categories.list');
    }

    public function edit($id)
    {
        $quiz = $this->quizService->findById($id);
        $test = $quiz->test;
        return view('quizzes.editForm', compact('quiz', 'test'));
    }

    public function update(Request $request,$id){
        $this->quizService->update($request,$id);
        return redirect()->route('categories.list');
    }
}
