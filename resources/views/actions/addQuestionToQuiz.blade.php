@extends('layouts.admin')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <div class="col-12">
                        <div class="row p-5">
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="text-center">Add question to Quiz</h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="post"
                                              action="{{route('questions.removeQuestion',$quiz->id)}}">
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label"><h5>Quiz</h5></label>
                                                <div class="col-sm-10">
                                                    <h3><input type="text" readonly
                                                               class="form-control-plaintext"
                                                               value="{{$quiz->name}}">
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-2"><h5>Desc</h5></div>
                                                <div class="col-10">
                                                    <p type="text"
                                                        id="staticEmail" style="margin-top: -16px;">{!! $quiz->desc !!}</p>
                                                </div>
                                            </div>
                                            <h5>Các câu hỏi đã có trong Quiz :</h5>
                                            <div class="p-3 ">
                                                @foreach($questions as $question)
                                                    {{--                                        <input type="text" class="form-check-input" id="exampleCheck1"--}}
                                                    {{--                                               style="display: none" name="title" value="{{$question->title}}">--}}
                                                    <div class="form-group form-check pl-5">
                                                        {{--                                            <input name="id" value="{{$quiz->id}}" style="display: none">--}}
                                                        <input type="checkbox" class="form-check-input"
                                                               id="exampleCheck1" name="quiz_id[]"
                                                               value="{{$question->id}}">
                                                        <label class="form-check-label"
                                                               for="exampleCheck1">{{$question->title}}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="pull-right">
                                                <button type="submit" class="btn btn-danger">Remove</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="text-center">List question</h3>
                                    </div>
                                    <div class="card-body parent">
                                        <div class="form-inline my-2 my-lg-0">
                                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="search">
                                        </div>

                                        <form method="post"
                                              action="{{route('questions.addQuestion',$quiz->id)}}">
                                            @csrf
                                            <div class="p-3 " id="list-search-question">
                                                @foreach($listQuestion as $question)
                                                    @if($question->quiz_id==null)
                                                        {{--                                        <input type="text" class="form-check-input" id="exampleCheck1"--}}
                                                        {{--                                               style="display: block" name="title" value="{{$question->title}}">--}}
                                                        <div class="form-group form-check pl-5" >
                                                            <input name="id" value="{{$quiz->id}}"
                                                                   style="display: none" id="id-quiz">
                                                            <input type="checkbox" class="form-check-input"
                                                                   id="exampleCheck1"
                                                                   name="question[]"
                                                                   value="{{$question->id}}">
                                                            <label class="form-check-label"
                                                                   for="exampleCheck1">{{$question->title}}</label>

                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="pull-right child">
                                                <button type="submit" class="btn btn-success">Add</button>
                                            </div>

                                        </form>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </table>
            </div>
        </div>
    </div>
@endsection
