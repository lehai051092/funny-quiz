<?php

namespace App\Http\Controllers;

use App\Http\Services\CategoryServiceInteface;
use App\Http\Services\TestServiceInterface;
use Illuminate\Http\Request;

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

}
