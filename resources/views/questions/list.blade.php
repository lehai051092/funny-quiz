@extends('layouts.app')
@section('content')
{{--    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}

    <form method="post" action="{{route('session.result',$quiz->id)}}">
        @csrf
    <div class="container p-5">
        <div class="row m-5">
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
                                                    type="checkbox" name="answer" value="{{$answer->title}}">{{$answer->title}}</label>
                                        </div>
                                    @endif

                                @endforeach
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
      <input type="submit" value="submit" >
    </form>
@endsection
