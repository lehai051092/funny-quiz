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
        $this->categoryService = $categoryService;
    }

    public function questionsInQuiz($id)
    {
        $quiz = $this->quizService->findById($id);
        $questions = $quiz->questions;
//        $answers = $this->answerService->getAll();
        return view('actions.addQuestionToQuiz', compact('quiz', 'questions'));
    }

    public function getAll()
    {
        $questions = $this->questionService->getAll();
        return view('actions.addQuestionToQuiz', compact('questions'));
    }

    public function addQuestionToQuiz($id)
    {
        $quiz = $this->quizService->findById($id);
        $questions = $quiz->questions;
        $listQuestion = $this->questionService->getAll();
        return view('actions.addQuestionToQuiz', compact('quiz', 'questions', 'listQuestion'));

    }

    public function createQuestion()
    {
        return view('questions.basic-info');
    }


    public function create()
    {
//        $quiz = $this->quizService->findById($id);
        return view('questions.createForm');
    }


    public function store(Request $request)
    {
        $this->questionService->store($request);
        return redirect()->route('quizzes.basic');
    }

    public function delete($id)
    {
        $this->questionService->delete($id);
        return redirect()->back();
    }

    public function edit($id)
    {
        $question = $this->questionService->findById($id);
        $categories = $this->categoryService->getAll();

        return view('questions.editForm', compact('question', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $this->questionService->update($request, $id);
        return redirect()->route('questions.basic');
    }

    public function updateQuiz(Request $request, $id)
    {

        $this->questionService->addQuestionToQuiz($request, $id);
        toastr()->success('thêm câu hỏi thành công');
        return redirect()->back();
    }

    public function removeQuestion(Request $request, $id)
    {
        $this->questionService->removeQuestionInQuiz($request, $id);
        toastr()->success('bỏ câu hỏi thành công ');
        return redirect()->back();
    }
}
