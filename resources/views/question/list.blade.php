@extends('layouts.app')
@section('content')
    <div class="container m-5">
        <div class="row m-5">
            <div class="col-12 m-5">
                <a href="{{route('questions.create',$quiz->id)}}" class="btn btn-link">Thêm mới</a>

                    @foreach($questions as $question)
                        <ul class="list-group">
                            <li class="list-group-item active">{{$question->title}}</li>
                            <li class="list-group-item">Dapibus ac facilisis in</li>
                            <li class="list-group-item">Morbi leo risus</li>
                            <li class="list-group-item">Porta ac consectetur ac</li>
                            <li class="list-group-item">Vestibulum at eros</li>
                        </ul>
                <a href="{{route('questions.delete',$question->id)}}" class="btn btn-danger">Delete</a>
                <a href="{{route('questions.edit',$question->id)}}" class="btn btn-primary">Edit</a>
                        <br>
                    @endforeach


            </div>
        </div>
    </div>


@endsection
