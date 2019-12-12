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
        return view('test.list', compact('category', 'tests'));
    }

    public function create()
    {
        $categories = $this->categoryService->getAll();
        return view('test.createForm', compact('categories'));
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
        $categories = $this->testService->getAll();
        return view('test.editForm', compact('test', 'categories'));
    }

}
