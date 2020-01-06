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
                        <div class="accordion" id="accordionExample">
                            <div class="card">

                                <div class="card-header" id="heading_{{$key}}">
                                    @if($answer[0]==\App\StatusInterface::ISRIGHT)

                                        <h5 class="mb-0">
                                            <button class="true" type="button" data-toggle="collapse"
                                                    data-target="#collapse_{{$key}}"
                                                    aria-expanded="false" aria-controls="collapse_{{$key}}">
                                                {{++$key}}
                                            </button>
                                            <div>
                                                @foreach($answers as $answer)
                                                    @foreach($questions as $key=>$question)
                                                        @if($answer->status === \App\StatusInterface::ISRIGHT && $answer->question_id===$question->id)
                                                            <div id="collapse_{{$key}}" class="collapse"
                                                                 aria-labelledby="heading_{{$key}}"
                                                                 data-parent="#accordionExample">
                                                                <div class="card-body">
                                                                    {{$answer->title}}
                                                                </div>

                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </div>
                                        </h5>
                                    @elseif($answer[0]==\App\StatusInterface::ISWRONG)
                                        <h5 class="mb-0">
                                            <button class="false" type="button" data-toggle="collapse"
                                                    data-target="#collapse_{{$key}}"
                                                    aria-expanded="false" aria-controls="collapse_{{$key}}">
                                                {{++$key}}
                                            </button>
                                            <div>
                                                @foreach($answers as $answer)
                                                    @foreach($questions as $key=>$question)
                                                        @if($answer->status === \App\StatusInterface::ISRIGHT && $answer->question_id===$question->id)
                                                            <div id="collapse_{{$key}}" class="collapse"
                                                                 aria-labelledby="heading_{{$key}}"
                                                                 data-parent="#accordionExample">
                                                                <div class="card-body">
                                                                    {{$answer->title}}
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </div>
                                        </h5>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

{{--                <div class="container mt-3">--}}
{{--                    @foreach($listAnswers as $key=>$answer)--}}
{{--                        <div class="accordion" id="accordionExample">--}}
{{--                            <div class="card">--}}

{{--                                <div class="card-header" id="heading_{{$key}}">--}}
{{--                                    @if($answer[0]==\App\StatusInterface::ISRIGHT)--}}

{{--                                        <h5 class="mb-0">--}}
{{--                                            <button class="true" type="button" data-toggle="collapse"--}}
{{--                                                    data-target="#collapse_{{$key}}"--}}
{{--                                                    aria-expanded="false" aria-controls="collapse_{{$key}}">--}}
{{--                                                {{++$key}}--}}
{{--                                            </button>--}}
{{--                                            <div>--}}
{{--                                                @foreach($answers as $answer)--}}
{{--                                                    @foreach($questions as $key=>$question)--}}
{{--                                                        @if($answer->status === \App\StatusInterface::ISRIGHT && $answer->question_id===$question->id)--}}
{{--                                                            <div id="collapse_{{$key}}" class="collapse"--}}
{{--                                                                 aria-labelledby="heading_{{$key}}"--}}
{{--                                                                 data-parent="#accordionExample">--}}
{{--                                                                <div class="card-body">--}}
{{--                                                                    {{$answer->title}}--}}
{{--                                                                </div>--}}

{{--                                                            </div>--}}
{{--                                                        @endif--}}
{{--                                                    @endforeach--}}
{{--                                                @endforeach--}}
{{--                                            </div>--}}
{{--                                        </h5>--}}
{{--                                    @elseif($answer[0]==\App\StatusInterface::ISWRONG)--}}
{{--                                        <h5 class="mb-0">--}}
{{--                                            <button class="false" type="button" data-toggle="collapse"--}}
{{--                                                    data-target="#collapse_{{$key}}"--}}
{{--                                                    aria-expanded="false" aria-controls="collapse_{{$key}}">--}}
{{--                                                {{++$key}}--}}
{{--                                            </button>--}}
{{--                                            <div>--}}
{{--                                                @foreach($answers as $answer)--}}
{{--                                                    @foreach($questions as $key=>$question)--}}
{{--                                                        @if($answer->status === \App\StatusInterface::ISRIGHT && $answer->question_id===$question->id)--}}
{{--                                                            <div id="collapse_{{$key}}" class="collapse"--}}
{{--                                                                 aria-labelledby="heading_{{$key}}"--}}
{{--                                                                 data-parent="#accordionExample">--}}
{{--                                                                <div class="card-body">--}}
{{--                                                                    {{$answer->title}}--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        @endif--}}
{{--                                                    @endforeach--}}
{{--                                                @endforeach--}}
{{--                                            </div>--}}
{{--                                        </h5>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}

{{--                </div>--}}
            </div>

            <div class="col-4 result">
                <div class="poin">
                    <p class="title">Your Point</p>
                    <p class="content">{{count($answersRight)}}/{{count($questions)}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
