@extends('layouts.app')
@section('content')
    <div class="container m-5">
        <div class="row m-5">
            <div class="col-12 m-5">
                <div class="row">
                    <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$quiz->name}}</h5>
                            <p class="card-text">{{$quiz->desc}}</p>
                            <a href="{{route('questions.list',$quiz->id)}}" class="btn btn-danger">Làm Quiz</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
