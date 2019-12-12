@extends('layouts.app')
@section('content')
    <div class="container m-5">
        <div class="col-12 m-5">
            <div class="row m-5">
                <div class="col-8 m-5">
                    <form method="post" action="{{route('quizzes.update',$test->id)}}" >
                        @csrf
                        <div class="form-group">
                            <label>Name Quiz</label>
                            <input type="text" class="form-control" placeholder="Enter Name Test" name="name" value="{{$quiz->name}}">
                        </div>
                        <div class="form-group">
                            <label>Desc</label>
                            <input type="text" class="form-control" placeholder="Enter Desc" name="desc" value="{{$quiz->desc}}">
                        </div>
                        <div class="form-group">
                            <label>Test</label>
                            <select name="test_id">
                                <option
                                    @if($quiz->test_id==$test->id)
                                        selected
                                    @endif
                                    value="{{$test->id}}">{{$test->name}}</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
