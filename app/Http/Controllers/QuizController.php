<?php

namespace App\Http\Controllers;

use App\Http\Services\CategoryServiceInteface;
use App\Http\Services\QuizServiceInterface;
use App\Http\Services\TestServiceInterface;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    protected $quizService;
    protected $categoryService;

    public function __construct(QuizServiceInterface $quizService,
                                CategoryServiceInteface $categoryService)
    {
        $this->quizService = $quizService;
        $this->categoryService = $categoryService;
    }

    public function QuizzesInCategory($id)
    {
        $category = $this->categoryService->findById($id);
        $quizzes = $category->quizzes;
        return view('quizzes.list', compact('quizzes', 'category'));
    }

    public function QuizDetail($id)
    {
        $quiz = $this->quizService->findById($id);
        return view('quizzes.quizDetail', compact('quiz'));
    }

    public function create($id)
    {
        $category = $this->categoryService->findById($id);
        return view('quizzes.createForm', compact('category'));
    }

    public function store(Request $request, $id)
    {
        $this->quizService->store($request);
        return redirect()->route('quizzes.list', ['id' => $id]);
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
