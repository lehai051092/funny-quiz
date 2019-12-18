<?php


namespace App\Http\Services\Impl;


use App\Http\Repositories\QuizRepositoryInterface;
use App\Http\Repositories\TestRepositoryInterface;
use App\Http\Services\QuizServiceInterface;
use App\Quiz;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
        $quiz->name = $request->title;
        $quiz->desc = $request->desc;
        $quiz->category_id = $request->categories;
        if ($request->image) {
            $image = $request->file('image');
            $path = $image->store("img/quiz", "public");
            Storage::delete('public/' . $quiz->image);
            $quiz->image = $path;
        }
        $this->quizRepository->store($quiz);
    }

    function delete($id)
    {
        $quiz = $this->quizRepository->findById($id);
        if (file_exists(storage_path("/app/public/$quiz->image"))) {
            File::delete(storage_path("/app/public/$quiz->image"));
        }
        return $this->quizRepository->delete($quiz);
    }

    function update($request, $id)
    {
        $quiz = $this->quizRepository->findById($id);
        if (file_exists(storage_path("/app/public/$quiz->image"))) {
            File::delete(storage_path("/app/public/$quiz->image"));
        }
        $quiz->name = $request->name;
        $quiz->desc = $request->desc;
        $quiz->category_id = $request->category_id;
        if ($request->image) {
            $image = $request->file('image');
            $path = $image->store("img/quiz", "public");
            Storage::delete('public/' . $quiz->image);
            $quiz->image = $path;
        }
        return $this->quizRepository->update($quiz);
    }
}
