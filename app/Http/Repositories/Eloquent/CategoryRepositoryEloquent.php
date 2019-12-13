<?php


namespace App\Http\Repositories\Eloquent;


use App\Category;
use App\Http\Repositories\CategoryRepositoryInterface;

class CategoryRepositoryEloquent implements CategoryRepositoryInterface
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    function getAll()
    {
        return $this->category->all();
    }

    function findById($id)
    {
       return $this->category->findOrFail($id);
    }

    function store($obj)
    {
       $obj->save();
    }

    function delete($obj)
    {
      return $obj->delete();
    }

    function update($obj)
    {
        // TODO: Implement update() method.
    }
}
