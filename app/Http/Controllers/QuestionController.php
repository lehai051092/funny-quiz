<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Http\Requests\ProfileUserRequest;
use App\Http\Services\AnswerServiceInterface;
use App\Http\Services\CategoryServiceInteface;
use App\Http\Services\QuestionServiceInterface;
use App\Http\Services\QuizServiceInterface;
use App\Question;
use App\Type;
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
        $types = Type::all();
        $categories = $this->categoryService->getAll();
        return view('questions.createForm', compact('types', 'categories'));
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

//  Edit up date Question & Answers
    public function edit($id)
    {
        $question = $this->questionService->findById($id);
        $categories = $this->categoryService->getAll();
        $types = Type::all();
        $answers = $question->answers;

        return view('questions.editForm', compact('question', 'categories', 'types', 'answers'));
    }

    public function update(Request $request)
    {
        if ($request->ajax()) {
            $question = [
                $this->questionService->update($request),
            ];
            return response()->json($question);
        }
    }

    public function updateAnswers(Request $request)
    {
        if ($request->ajax()) {
            foreach ($request->listAnswersOld as $item) {
                DB::table('answers')->where('id', $item['id'])->update($item);
            }
            return response()->json(['message' => toastr()->success('Update success')]);
        }
    }

    public function deleteAnswer($id)
    {
        $this->answerService->delete($id);
        toastr()->success('delete Question success');
        return redirect()->back();
    }


//    ....................................................................

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
// add Question And Answer
    public function addQuestionAndAnswer(Request $request)
    {
        if ($request->ajax()) {
            if ($request->title) {
                $question = [
                    $this->questionService->addQuestionAndAnswer($request),
                    'id' => DB::table('questions')->max('id')
                ];
                return response()->json($question);
            }
        }
    }

    public function addAnswer(Request $request)
    {
        if ($request->ajax()) {
            foreach ($request->listAnswers as $key => $value) {
                Answer::create($value);
            }
            $answers = [
                toastr()->success('Add Question && Answers Success')
            ];
            return response()->json($answers);
        }
    }

    public function filter(Request $request)
    {
        if ($request->ajax()){
            $arrayQuestion=[];
            $query = Question::all();
            if ($request->has('title') && $request->get('title') != '-1') {
                $query = $query->where('id', $request->get('title'));
            }
            if ($request->has('type_id') && $request->get('type_id') != '-1') {
                $query = $query->where('type_id', $request->get('type_id'));
            }
            if ($request->has('category_id') && $request->get('category_id') != '-1') {
                $query = $query->where('category_id', $request->get('category_id'));
            }
            $questions = $query->all();
            foreach ($questions as $question)
            {
                array_push($arrayQuestion,$question);
            }
            return response()->json($arrayQuestion);
        }

    }
}
