@extends('layouts.app')
@section('content')
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <div class="container m-5">
        <div class="row m-5">
            <div class="col-12 m-5">
                @can('crud-users')
                <a href="{{route('questions.create',$quiz->id)}}" class="btn btn-link">Thêm mới câu hỏi</a>
                @endcan
                @foreach($questions as $key=>$question)
                    <div class="container-fluid" style="background-color: #2fa360">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3><span class="label label-warning" id="qid">{{++$key}}</span> {{$question->title}}</h3>
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
                                @foreach($answers as $answer)
                                    @if($question->id===$answer->question_id)
                                        <div class="quiz" id="quiz" data-toggle="buttons">
                                            <label class="element-animation1 btn btn-lg btn-success btn-block"><span
                                                    class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span>
                                                <input
                                                    type="radio" name="answer">{{$answer->title}}</label>
                                        </div>
                                        @can('crud-users')
                                            <a href="{{route('answers.delete',$answer->id)}}"
                                               onclick="return confirm('Bạn có chắn chắn muốn đáp án này xóa không?')"> <i
                                                    class="fa fa-trash"></i></a>
                                            <a href="{{route('answers.edit',$answer->id)}}"><i class="fa fa-edit"></i></a><br>
                                            @endcan
                                    @endif

                                @endforeach
                                @can('crud-users')
                                    <a href="{{route('answers.create',$question->id)}}"><i class="fa fa-plus"></i> Câu trả
                                        lời</a><br>
                                @endcan
                                    <div style="float: right">
                                        @can('crud-users')
                                        <a href="{{route('questions.delete', $question->id)}}"
                                           onclick="return confirm('Bạn có muốn xóa câu hỏi này không?')">
                                            <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Câu hỏi
                                            </button>
                                        </a>
                                        <a href="{{route('questions.edit', $question->id)}}">
                                            <button type="button" class="btb btn"><i class="fa fa-edit"></i> Câu hỏi</button>
                                        </a>
                                            @endcan
                                    </div>

                            </div>
                            <div class="modal-footer text-muted">
                                <span id="answer"></span>
                            </div>
                        </div>
                    </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


@endsection
