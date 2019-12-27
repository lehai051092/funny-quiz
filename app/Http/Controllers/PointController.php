<?php

namespace App\Http\Controllers;

use App\Http\Services\PointServiceInterface;
use App\Http\Services\QuizServiceInterface;
use Illuminate\Http\Request;

class PointController extends Controller
{
    protected $pointService;

    protected $quizService;

    public function __construct(PointServiceInterface $pointService,
                                QuizServiceInterface $quizService)
    {
        $this->pointService=$pointService;
        $this->quizService=$quizService;
    }
    public function getPointsInQuiz($id){
        $quiz=$this->quizService->findById($id);

        $questions=$quiz->questions;
        $points=$quiz->points;
        return view('points.list',compact('quiz','points','questions'));
    }
}
