<?php

namespace App\Http\Controllers;

use App\Http\Services\CategoryServiceInteface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryServiceInteface $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function getAll()
    {
        $categories = $this->categoryService->getAll();
        return view('categories.list', compact('categories'));
    }

    public function create()
    {
        return view('categories.createForm');
    }

    public function store(Request $request)
    {
        $this->categoryService->store($request);
        return redirect()->route('categories.list');
    }

    public function delete($id){
        $this->categoryService->delete($id);
        return redirect()->route('categories.list');
    }
}
