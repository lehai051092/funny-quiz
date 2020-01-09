@extends('layouts.app')
@section('content')
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style>
        input[type=submit] {
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
    <div class="container">
        <div class="col-12">
            <div class="row">
                <div class="col-10">
                    <form method="post" action="{{route('session.result',$quiz->id)}}">
                        @csrf
                        <div id="timeUp">

                            <div class="card" style="width: 100%;background-color: white; border: none">
                                <div class="card-header questionQuiz" style="background: linear-gradient(to right, #61ba6d, #83c331);"  >
                                    <h2 style="color: white">Question {{$quiz->name}}</h2>
                                </div>
                                @foreach($questions as $key=>$questionQuiz)

                                    <div class="card mt-2" style="width: 100%;background-color: white; ">
                                        <div class="card-header" style="font-size: 25px; background-color: honeydew" >
                                            {{++$key . ': ' .$questionQuiz->title}}
                                        </div>
                                        <div class="pl-2">
                                            <input name="question[]" value="{{$questionQuiz->id}}" style="display: none">
                                            @foreach($answers as $answer)
                                                @if($questionQuiz->id===$answer->question_id)
                                                    <div class="mt-4 pl-5" style="font-size: 20px">
                                                        <input
                                                            @if($questionQuiz->type_id==\App\TypeInterface::MANYANSWERS)
                                                            type="radio"
                                                            @endif
                                                            type="checkbox"
                                                            name="answer[]" class="myCheckResult"
                                                            value="{{$answer->status}}, {{$answer->id}}">{{$answer->title}}
                                                    </div>

                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div style="text-align: center; padding-bottom: 20px">
                            <form>
                                <input id="send" value="Send" type="submit" style="display: none"/>
                            </form>
                        </div>
                        <div id="reload" class="justify-content-center" style="display:none; text-align: center; padding-top: 50px;padding-bottom: 25px">
                            <h1>Time Out</h1>
                            <a href="{{route('quizzes.detail',$quiz->id)}}" class="btn btn-warning">Do it again</a>
                        </div>
                    </form>


                </div>

                <div class="col-2 p-5" id="time">
                    <div  class="d-flex justify-content-center" style="position: fixed; font-size: 20px; padding-top: 200px; color: red">Time to do 60 seconds</div>
                    <div class="item html mt-5" style="position: fixed" id="1">
                        <h2 id="abc">0</h2>
                        <svg width="160" height="160" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <title>Layer 1</title>
                                <circle id="circle" class="circle_animation" r="69.85699" cy="81" cx="81" stroke-width="8" stroke="#6fdb6f" fill="none"/>
                            </g>
                        </svg>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
