@extends('layouts.app')
@section('content')
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style>
        input[type=submit]{
            margin-left: 0.5em;
            height: 2.5em;
            padding: 0.2em 1em 0.2em 2.25em;
            font-size: 2em;
            font-weight: bold;
            font-family: "Open Sans";
            text-transform: uppercase;
            color: #696666;
            background: url({{asset('storage/img/quiz/Th606mh.png')}}) no-repeat scroll 0.1em 0.07em transparent;
            background-size: 54px 150px;
            border-radius: 2em;
            border: 0.15em solid #F9C23C;
            cursor: pointer;
            transition: all 0.3s ease 0s;
        }
        input[type="submit"]:hover {
            color: #fff;
            background-color: #EAA502;
            border-color: #EAA502;
            background-position: 0.75em bottom;
            -webkit-transition: all 0.3s ease;
            -ms-transition: all 0.3s ease;
            transition: all 0.3s ease;
        }
        input[type="submit"]:focus {
            background-position: 2em -4em;
            -webkit-transition: all 0.3s ease;
            -ms-transition: all 0.3s ease;
            transition: all 0.3s ease;
        }
        /* Webfonts */

        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 700;
            src: local('Open Sans Bold'), local('OpenSans-Bold'), url(https://themes.googleusercontent.com/static/fonts/opensans/v8/k3k702ZOKiLJc3WVjuplzHhCUOGz7vYGh680lGh-uXM.woff) format('woff');
        }
    </style>
<div class=" p-5">
    <form method="post" action="{{route('session.result',$quiz->id)}}">
        @csrf
        <div class="p-5">
            <div  class="d-flex justify-content-center">
                <label><h1>Exam Time</h1></label>
            </div>
            <div id="countdown" class="d-flex justify-content-center"></div>
            @foreach($questions as $key=>$question)
                <div class="container-fluid" >
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3><span class="label label-warning" id="qid">{{1+$key}}</span> {{$question->title}}
                                </h3>
                            </div>
                            <div class="modal-body">
                                @foreach($answers as $answer)
                                    {{\Illuminate\Support\Facades\Session::put('answer', $answer->id)}}
                                    @if($question->id===$answer->question_id)
                                        <div class="quiz" id="quiz" data-toggle="buttons">
                                            <label class="element-animation1 btn btn-lg btn-success btn-block"><span
                                                    class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span>
                                                <input
                                                    type="checkbox" name="answer[]" class="myCheckResult"
                                                    value="{{$answer->status}},{{$answer->title}}">{{$answer->title}}</label><br>
                                        </div>
                                    @endif
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
                <div style="text-align: center">
                    <form>
                        <input id="send" value="Send" type="submit"  style="display: none"/>
                    </form>
                </div>
        </div>
    </form>

</div>
@endsection
