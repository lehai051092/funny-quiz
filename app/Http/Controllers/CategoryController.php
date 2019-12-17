<?php

namespace App\Http\Controllers;

use App\Http\Services\CategoryServiceInteface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryServiceInteface $categoryService)
    {
        $this->categoryService = $categoryService;
        $this->middleware('auth');
    }

    public function getAll()
    {
        if (Gate::allows('crud-users')) {
            $categories = $this->categoryService->getAll();
            return view('categories.list', compact('categories'));
        }
        abort(403, 'You are not authorized to access');
    }

    public function create()
    {
        if (Gate::allows('crud-users')) {
            return view('categories.createForm');
        }
        abort(403, 'You are not authorized to access');
    }

    public function store(Request $request)
    {
        $this->categoryService->store($request);
        return redirect()->route('categories.list');
    }

    public function delete($id)
    {
        if (Gate::allows('crud-users')) {
            $this->categoryService->delete($id);
            toastr()->success('delete thành công');
            return back();
//                ->with('success', 'You Delete Success');
        }
        abort(403, 'You are not authorized to access');
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $keyword = $request->keyword;
            $categories = $this->categoryService->search($keyword);
            return response()->json($categories);
        }
    }
}
