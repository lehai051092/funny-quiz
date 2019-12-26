@extends('layouts.app')
@section('content')

    <div class="container p-5 ">
        <h1 class="p-5"><i class="fa fa-table"> {{$quiz->name}}</i></h1>
        <div class="row">
            <div class="col-8">
                <h5>Answer Right</h5>
                <table class="table table-bordered table-success" style="text-align: center">
                    <thead>
                    <tr>
                        <th scope="col">Question No</th>
                        <th scope="col">Answer Right</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($answers as $answer)
                        @foreach($questions as $key=>$question)
                            @if($answer->status === \App\StatusInterface::ISRIGHT && $answer->question_id===$question->id)
                                <tr>
                                    <th scope="row">{{++$key}}</th>
                                    <th scope="row">{{$answer->title}}</th>

                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
                <h5>Result</h5>
                <div>
                    @foreach($listAnswers as $key=>$answer)
                        @if($answer[0]==\App\StatusInterface::ISRIGHT)
                            <div class="true" {{value($answer[1])}}>{{++$key}} <i class="fa fa-check"></i></div>
                        @elseif($answer[0]==\App\StatusInterface::ISWRONG)
                            <div class="false" {{value($answer[1])}}>{{++$key}} <i class="fa fa-times"></i></div>
                        @endif
                    @endforeach
                </div>

            </div>
            <div class="col-4 result">
                <div class="poin">
                    <p class="title">Your Point</p>
                    <p class="content">{{count($answersRight)}}/{{count($questions)}}</p>
                </div>
                {{--                <label>Điểm số của bạn {{count($answersRight)}}/{{count($questions)}}</label>--}}

            </div>
        </div>

    </div>
@endsection
