@extends('layouts.app')
@section('content')
    <div class="container m-5">
        <div class="row m-5">
            <div class="col-12 m-5">
                <a href="{{route('quizzes.create',$test->id)}}" class="btn btn-link">Thêm mới</a>
                <div class="row">
                    @foreach($quizzes as $quiz)
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                               <a href="{{route('questions.list',$quiz->id)}}"> <h5 class="card-title">{{$quiz->name}}</h5></a>
                                <p class="card-text">{{$quiz->desc}}</p>
                                <a href="{{route('quizzes.delete',$quiz->id)}}" class="card-link" onclick="return confirm('Are you sure delete???')">Delete</a>
                                <a href="{{route('quizzes.edit',$quiz->id)}}" class="card-link">Edit</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


@endsection
