<?php


namespace App\Http\Repositories\Eloquent;


use App\Http\Repositories\TestRepositoryInterface;
use App\Test;

class TestRepositoryEloquent implements TestRepositoryInterface
{
    protected $test;

    public function __construct(Test $test)
    {
        $this->test = $test;
    }

    function getAll()
    {
        return $this->test->all();
    }

    function findById($id)
    {
        return $this->test->findOrFail($id);
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
