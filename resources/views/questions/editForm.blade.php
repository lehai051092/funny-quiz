@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="card shadow mb-4 col-6 d-flex justify-content-center">
            <div class="card-header py-3" style="background: linear-gradient(to right,#61ba6d, #83c331)">
                <h1 class="text-center text-white" >Edit Question</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <form method="post" action="{{route('questions.update',$question->id)}}" >
                            @csrf
                            <div class="form-group">
                                <label>Name Question</label>
                                <input type="text" class="form-control" placeholder="Enter Name Test" name="title" value="{{$question->title}}">
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control"  name="category_id">
                                    @foreach($categories as $category)
                                        <option
                                            value="{{$category->id}}">{{$category->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" style="display: none">
                                <label>Quiz</label>
                                <input value="{{$question->quiz_id}}">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>

                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
