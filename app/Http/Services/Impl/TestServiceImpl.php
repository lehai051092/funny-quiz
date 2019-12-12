<?php


namespace App\Http\Services\Impl;


use App\Http\Repositories\TestRepositoryInterface;
use App\Http\Services\TestServiceInterface;
use App\Test;
use Illuminate\Support\Facades\File;

class TestServiceImpl implements TestServiceInterface
{
    protected $testRepository;

    public function __construct(TestRepositoryInterface $testRepository)
    {
        $this->testRepository = $testRepository;
    }

    function getAll()
    {
        return $this->testRepository->getAll();
    }

    function findById($id)
    {
        return $this->testRepository->findById($id);
    }

    function store($request)
    {

        $test = new Test();
        $test->name = $request->name;
        $test->desc = $request->desc;
        $test->category_id = $request->category_id;
        if (!$request->hasFile('image')) {
            $test->image = $request->image;
        } else {
            $image = $request->file('image');
            $path = $image->store('image', 'public');
            $test->image = $path;
        }
        $this->testRepository->store($test);
    }

    function delete($id)
    {
        $test = $this->testRepository->findById($id);
        if (file_exists(storage_path("/app/pubplic/$test->image"))) {
            File::delete(storage_path("/app/pubplic/$test->image"));
        }
        return $this->testRepository->delete($test);
    }

    function update($request, $id)
    {
        // TODO: Implement update() method.
    }
}
