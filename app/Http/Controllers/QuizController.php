<?php

namespace App\Http\Controllers;

use App\Http\Requests\BacsicInfoRequest;
use App\Http\Services\AnswerServiceInterface;
use App\Http\Services\CategoryServiceInteface;
use App\Http\Services\QuestionServiceInterface;
use App\Http\Services\QuizServiceInterface;
use App\Point;
use App\StatusInterface;
use Illuminate\Support\Facades\Session;


use Illuminate\Http\Request;

class QuizController extends Controller
{
    protected $quizService;
    protected $categoryService;
    protected $questionService;
    protected $answerService;
    protected $point;

    public function __construct(QuizServiceInterface $quizService,
                                CategoryServiceInteface $categoryService,
                                QuestionServiceInterface $questionService,
                                AnswerServiceInterface $answerService,Point $point)
    {
        $this->middleware('auth');
        $this->quizService = $quizService;
        $this->categoryService = $categoryService;
        $this->questionService = $questionService;
        $this->answerService = $answerService;
        $this->point=$point;
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

    public function getAllQuestionsInCategory($id)
    {
        $quiz = $this->quizService->findById($id);
        $questions = $quiz->questions;
        dd($questions);


        return view('questions.list', compact('quiz', 'questions', 'answers'));
    }

    public function showResult(Request $request)
    {
        $point= new Point();
        $listAnswers =[];
        $listQuestion=[];
        $answers = $request->answer;
        $questions = $request->question;
        $answersAll=$this->answerService->getAll();

        for ($i = 0; $i < count($answers); $i++) {
            array_push($listAnswers, $answers[$i]);
            array_push($listQuestion, $questions[$i]);
        }
        dd($questions);

        return view('answers.result',compact('listAnswers','answersAll'));
    }


    public
    function QuizDetail($id)
    {
        $quiz = $this->quizService->findById($id);
        return view('quizzes.quizDetail', compact('quiz'));
    }

    public
    function createQuizInCategory()
    {

        $categories = $this->categoryService->getAll();
        return view('admins.quizzes.create', compact('categories'));
    }

    public
    function store(BacsicInfoRequest $request)
    {
        $this->quizService->store($request);
        toastr()->success('Create QUIZ success');

        return redirect()->route('admins.quizList');
    }

    public
    function delete($id)
    {
        $this->quizService->delete($id);
        toastr()->success('delete success');
        return redirect()->back();
    }

    public
    function edit($id)
    {
        $quiz = $this->quizService->findById($id);
        $category = $quiz->category;
        return view('quizzes.editForm', compact('quiz', 'category'));
    }

    public
    function update(Request $request, $id)
    {
        $this->quizService->update($request, $id);
        toastr()->success('Edit  QUIZ success');

        return redirect()->route('admins.quizList');
    }
}
