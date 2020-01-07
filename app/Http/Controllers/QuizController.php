<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Http\Requests\BacsicInfoRequest;
use App\Http\Services\AnswerServiceInterface;
use App\Http\Services\CategoryServiceInteface;
use App\Http\Services\QuestionServiceInterface;
use App\Http\Services\QuizServiceInterface;
use App\Notification;
use App\Notifications\SaveResultExample;
use App\Point;
use App\Question;
use App\Quiz;
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
                                AnswerServiceInterface $answerService, Point $point)
    {
        $this->middleware('auth');
        $this->quizService = $quizService;
        $this->categoryService = $categoryService;
        $this->questionService = $questionService;
        $this->answerService = $answerService;
        $this->point = $point;
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
        $listIdQuestion = [];
        foreach ($questions as $value) {
            array_push($listIdQuestion, ['id' => $value->id]);
        }
        $answers = $this->answerService->getAll();
        return view('questions.list', compact('quiz', 'questions', 'answers'));
    }

    public function showResult(Request $request, $id)
    {
        $point = new Point();
        $listAnswers = [];
        $listAnswersRight = [];

        $listQuestionId = $request->question;
        $isRightAnswers = Answer::where('status', '=', StatusInterface::ISRIGHT)
            ->get();
        $answersStatus = $request->answer;

        $listQuestion = [];

        for ($i = 0; $i < count($answersStatus); $i++) {
            array_push($listAnswers, $answersStatus[$i]);
            array_push($listQuestion, $listQuestionId[$i]);
            if ($answersStatus[$i] == StatusInterface::ISRIGHT) {
                array_push($listAnswersRight, $answersStatus[$i]);
            }
        }
        $quiz = Quiz::find($id);
        $questionsQuiz = $quiz->questions;

        $listAnswer = [];
        foreach ($questionsQuiz as $question) {
            array_push($listAnswer, $question->answers);
        }

        \auth()->user()->notify(new SaveResultExample($questionsQuiz, $listAnswer));
        $notifications = Notification::where('type', '=', 'App\Notifications\SaveResultExample')->get();
        $point->point = count($listAnswersRight);
        $point->quiz_id = $id;
        $point->save();

        return view('answers.result', compact('listAnswers',
            'answersStatus',
            'listQuestion',
            'isRightAnswers',
            'listAnswersRight',
            'questionsQuiz',
            'quiz',
            'notifications'));

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
