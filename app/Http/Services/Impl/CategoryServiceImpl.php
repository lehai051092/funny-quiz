<?php


namespace App\Http\Services\Impl;


use App\Category;
use App\Http\Repositories\CategoryRepositoryInterface;
use App\Http\Services\CategoryServiceInteface;
use Illuminate\Support\Facades\File;

class CategoryServiceImpl implements CategoryServiceInteface
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    function getAll()
    {
        return $this->categoryRepository->getAll();
    }

    function findById($id)
    {
        return $this->categoryRepository->findById($id);
    }

    function store($request)
    {
        $category = new Category();
        $category->name = $request->name;
        if (!$request->hasFile('image')) {
            $category->image = $request->image;
        } else {
            $image = $request->file('image');
            $path = $image->store('image', 'public');
            $category->image = $path;
        }
        $this->categoryRepository->store($category);
    }

    function delete($id)
    {
        $category = $this->categoryRepository->findById($id);
        if(file_exists(storage_path("/app/public/$category->image"))){
            File::delete(storage_path("/app/public/$category->image"));
        }
        $this->categoryRepository->delete($category);
    }

    function update($request, $id)
    {
        // TODO: Implement update() method.
    }
}
