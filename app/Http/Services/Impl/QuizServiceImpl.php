<?php


namespace App\Http\Services\Impl;


use App\Http\Repositories\QuizRepositoryInterface;
use App\Http\Repositories\TestRepositoryInterface;
use App\Http\Services\QuizServiceInterface;
use App\Quiz;
use Illuminate\Support\Facades\File;

class QuizServiceImpl implements QuizServiceInterface
{
    protected $quizRepository;


    public function __construct(QuizRepositoryInterface $quizRepository)
    {
        $this->quizRepository = $quizRepository;
    }

    function getAll()
    {
        return $this->quizRepository->getAll();
    }

    function findById($id)
    {
        return $this->quizRepository->findById($id);
    }

    function store($request)
    {
        $quiz = new Quiz();
        $quiz->name = $request->name;
        $quiz->desc = $request->desc;
        $quiz->category_id = $request->category_id;
        if (!$request->hasFile('image')) {
            $quiz->image = $request->image;
        } else {
            $image = $request->file('image');
            $path = $image->store('image', 'public');
            $quiz->image = $path;
        }
        $this->quizRepository->store($quiz);
    }

    function delete($id)
    {
        $quiz = $this->quizRepository->findById($id);
        if (file_exists(storage_path("/app/pubplic/$quiz->image"))) {
            File::delete(storage_path("/app/pubplic/$quiz->image"));
        }
        return $this->quizRepository->delete($quiz);
    }

    function update($request, $id)
    {
        $quiz = $this->quizRepository->findById($id);
        if (file_exists(storage_path("/app/pubplic/$quiz->image"))) {
            File::delete(storage_path("/app/pubplic/$quiz->image"));
        }
        $quiz->name = $request->name;
        $quiz->desc = $request->desc;
        $quiz->category_id = $request->category_id;
        $quiz->image = $request->image;
        return $this->quizRepository->update($quiz);
    }
}
