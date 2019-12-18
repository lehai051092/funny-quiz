@extends('layouts.app')
@section('content')
    <div class="container m-5">
        <div class="col-12 m-5">
            <div class="row m-5">
                <div class="col-8 m-5">
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
                </div>
            </div>
        </div>
    </div>
@endsection
