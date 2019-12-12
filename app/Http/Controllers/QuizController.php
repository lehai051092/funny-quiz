<?php

namespace App\Http\Controllers;

use App\Http\Services\QuizServiceInterface;
use App\Http\Services\TestServiceInterface;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    protected $quizService;
    protected $testService;

    public function __construct(QuizServiceInterface $quizService,
                                TestServiceInterface $testService)
    {
        $this->quizService = $quizService;
        $this->testService = $testService;
    }

    public function QuizzesInTest($id){
        $test=$this->testService->findById($id);
        $quizzes=$test->quizzes;
        return view('quiz.list',compact('test','quizzes'));
    }

    public function create($id){
        $test=$this->testService->findById($id);
        return view('quiz.createForm',compact('test'));
    }

    public function store(Request $request){
        $this->quizService->store($request);
        return redirect()->route('categories.list');
    }
}
