@extends('layouts.app')
@section('content')
    <div class="container m-5">
        <div class="row m-5">
            <div class="col-12 m-5">
                <a href="{{route('questions.create',$quiz->id)}}" class="btn btn-link">Thêm mới câu hỏi</a>

                    @foreach($questions as $question)
                        <ul class="list-group">
                            <li class="list-group-item active">{{$question->title}}</li>
                            @foreach($answers as $answer)
                                @if($answer->question_id==$question->id)
                            <li class="list-group-item">{{$answer->title}}</li>
                                <div>
                                    <a href="{{route('answers.delete',$answer->id)}} " class="btn btn-btn-danger">Delete answer</a>
                                    <a href="{{route('answers.edit',$answer->id)}}">Edit answer</a>
                                </div>
                                @endif
                           @endforeach
                        </ul>
                <a href="{{route('answers.create',$question->id)}}">Thêm câu trả lời</a><br>
                <a href="{{route('questions.delete',$question->id)}}" class="btn btn-danger">Delete question</a>
                <a href="{{route('questions.edit',$question->id)}}" class="btn btn-primary">Edit question</a>
                    @endforeach


            </div>
        </div>
    </div>


@endsection
