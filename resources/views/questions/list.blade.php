@extends('layouts.app')
@section('content')
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<div class=" p-5">
    <form method="post" action="{{route('session.result',$quiz->id)}}">
        @csrf
        <div class="p-5">
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
                                                    type="checkbox" name="answer[]"
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
                    <input type="submit" value="submit" class="btn btn-primary">
                </div>
        </div>
    </form>

</div>
@endsection
