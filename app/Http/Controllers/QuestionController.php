<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Http\Services\AnswerServiceInterface;
use App\Http\Services\CategoryServiceInteface;
use App\Http\Services\QuestionServiceInterface;
use App\Http\Services\QuizServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function listAllQuestion()
    {
        $questions = $this->questionService->getAll();
        return view('admins.questions.list', compact('questions'));
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
        toastr()->success('Create Question Success');
        return redirect()->route('admins.questionList');
    }

    public function delete($id)
    {
        $this->questionService->delete($id);
        toastr()->success('delete Question success');
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
        toastr()->success('Edit Question success');
        return redirect()->route('admins.questionList');
    }

    public function updateQuiz(Request $request, $id)
    {
        $this->questionService->addQuestionToQuiz($request, $id);
        toastr()->success('Add question to Quiz success');
        return redirect()->back();
    }

    public function removeQuestion(Request $request, $id)
    {
        $this->questionService->removeQuestionInQuiz($request, $id);
        toastr()->success('Remove question success');
        return redirect()->back();
    }

    public function addQuestionAndAnswer(Request $request)
    {
        if ($request->ajax()) {
            if ($request->title) {
                $question = [
                    $this->questionService->addQuestionAndAnswer($request),
                ];
                $id_now = DB::getPdo()->lastInsertId();
                return response()->json($question);
            }

            dd($request->title_answer);
            if ($request->title_answer) {
                $title_answer = $request->title_answer;
                $status = $request->status;

                for ($count = 0; $count < count($title_answer); $count++) {
                    $data = array(
                      'title' => $title_answer[$count],
                        'status' => $status[$count]
                    );
                    $insert_data[] = $data;
                }
                Answer::create($insert_data);

                return response()->json([
                    'message' =>  toastr()->success('Remove question success')
                ]);
            }
        }
    }
}
