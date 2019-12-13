@extends('layouts.app')
@section('content')
    <div class="container m-5">
        <div class="row m-5">
            <div class="col-12 m-5">
                <a href="{{route('questions.create',$quiz->id)}}" class="btn btn-link">Thêm mới câu hỏi</a>

                {{--                    @foreach($questions as $question)--}}
                {{--                        <ul class="list-group">--}}
                {{--                            <li class="list-group-item active">{{$question->title}}</li>--}}
                {{--                            @foreach($answers as $answer)--}}
                {{--                                @if($answer->question_id==$question->id)--}}
                {{--                            <li class="list-group-item">{{$answer->title}}</li>--}}
                {{--                                <div>--}}
                {{--                                    <a href="{{route('answers.delete',$answer->id)}}" class="btn btn-btn-danger" onclick="return confirm('Are you sure delete???')">Delete answer</a>--}}
                {{--                                    <a href="{{route('answers.edit',$answer->id)}}">Edit answer</a>--}}
                {{--                                </div>--}}
                {{--                                @endif--}}
                {{--                           @endforeach--}}
                {{--                        </ul>--}}
                {{--                <a href="{{route('answers.create',$question->id)}}">Thêm câu trả lời</a><br>--}}
                {{--                <a href="{{route('questions.delete',$question->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure delete???')">Delete question</a>--}}
                {{--                <a href="{{route('questions.edit',$question->id)}}" class="btn btn-primary">Edit question</a>--}}
                {{--                    @endforeach--}}

                <div class="container-fluid bg-info">
                    <div class="modal-dialog">
                        @foreach($questions as $key=>$question)
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3><span class="label label-success" id="qid">{{++$key}}</span> {{$question->title}}</h3>
                            </div>
                            <div class="modal-body">
                                <div class="col-xs-3 col-xs-offset-5">
                                    <div id="loadbar" style="display: none;">
                                        <div class="blockG" id="rotateG_01"></div>
                                        <div class="blockG" id="rotateG_02"></div>
                                        <div class="blockG" id="rotateG_03"></div>
                                        <div class="blockG" id="rotateG_04"></div>
                                        <div class="blockG" id="rotateG_05"></div>
                                        <div class="blockG" id="rotateG_06"></div>
                                        <div class="blockG" id="rotateG_07"></div>
                                        <div class="blockG" id="rotateG_08"></div>
                                    </div>
                                </div>

                                <div class="quiz" id="quiz" data-toggle="buttons">
                                    @foreach($answers as $answer)
                                        @if($answer->question_id==$question->id)
                                    <label class="element-animation1 btn btn-lg btn-success btn-block"><span
                                            class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span>
                                        <input type="radio" name="q_answer" value="1">{{$answer->title}}</label>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="modal-footer text-muted">
                                <span id="answer"></span>
                            </div>
                        </div>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
