@extends('layouts.app')
@section('content')
    <div class="container m-5">
        <div class="col-12 m-5">
            <div class="row m-5">
                <div class="col-8 m-5">
                    <form method="post" action="{{route('questions.store',$quiz->id)}}" >
                        @csrf
                        <div class="form-group">
                            <label>Name Question</label>
                            <input type="text" class="form-control" placeholder="Enter Name Test" name="title">
                        </div>
                        <div class="form-group">

                            <label>Quiz</label>

                            <select class="form-control"  name="quiz_id">
                                <option value="{{$quiz->id}}">{{$quiz->name}}</option>
                            </select>

                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
