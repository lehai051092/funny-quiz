<?php

namespace App\Http\Controllers;

use App\Http\Services\CategoryServiceInteface;
use App\Http\Services\TestServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class TestController extends Controller
{
    protected $testService;
    protected $categoryService;

    public function __construct(TestServiceInterface $testService, CategoryServiceInteface $categoryService)
    {
        $this->testService = $testService;
        $this->categoryService = $categoryService;
    }

    public function TestsInCategory($id)
    {
        $category = $this->categoryService->findById($id);
        $tests = $category->tests;
        return view('tests.list', compact('category', 'tests'));
    }

    public function create($id)
    {
        $category = $this->categoryService->findById($id);
        return view('tests.createForm', compact('category'));
    }

    public function store(Request $request)
    {
        $this->testService->store($request);
        return redirect()->route('categories.list');
    }

    public function delete($id)
    {
        $this->testService->delete($id);
        return redirect()->route('categories.list');
    }

    public function edit($id)
    {
        $test = $this->testService->findById($id);
        $category = $test->category;
        return view('tests.editForm', compact('test', 'category'));
    }

    public function update(Request $request, $id)
    {
        $this->testService->update($request, $id);
        return redirect()->route('categories.list');
    }

}
