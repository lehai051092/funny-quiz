@extends('layouts.app')
@section('content')
    <div class="container m-5">
        <div class="col-12 m-5">
            <div class="row m-5">
                <div class="col-8 m-5">
                    <form method="post" action="{{route('answers.update',$answer->id)}}">
                        @csrf
                        <div class="form-group">
                            <label>Name Answer</label>
                            <input type="text" class="form-control" placeholder="Enter Name Test" name="title"
                                   value="{{$answer->title}}">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <input type="text" class="form-control" placeholder="Enter Name Test" name="status"
                                   value="{{$answer->status}}">
                        </div>
                        <div class="form-group">
                            <label>Question</label>
                            <select name="question_id">
                                <option

                                    @if($answer->question_id==$question->id)
                                        selected
                                    @endif

                                    value="{{$question->id}}">{{$question->title}}</option>

                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
