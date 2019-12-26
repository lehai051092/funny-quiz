@extends('layouts.app')
@section('content')

    <div class="container p-5 ">
        <h1 class="p-5"><i class="fa fa-table"> {{$quiz->name}}</i></h1>
        <div class="row">
            <div class="col-8">
{{--                <table class="table table-bordered table-success" style="text-align: center">--}}
{{--                    {{$i = 0}}--}}
{{--                    <thead>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                    <tr>--}}
{{--                        <td><b class="fa">Question No</b></td>--}}
{{--                        @foreach($listAnswers as $key=>$answer)--}}
{{--                            <td><b>{{++$key}}</b></td>--}}
{{--                        @endforeach--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td scope="col"><b class="fa">Answer Right</b></td>--}}
{{--                        @foreach($answers as $answer)--}}
{{--                            @foreach($questions as $question)--}}
{{--                                @if($answer->status === \App\StatusInterface::ISRIGHT && $answer->question_id===$question->id)--}}

{{--                                    <td scope="col"><b>{{$answer->title}}</b></td>--}}
{{--                                @endif--}}
{{--                            @endforeach--}}
{{--                        @endforeach--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td scope="col"><b class="fa">Your Answer</b></td>--}}
{{--                        @foreach($listAnswers as $answer)--}}
{{--                            @if($answer[0]==\App\StatusInterface::ISRIGHT)--}}
{{--                                <td><b style="color: #00ad5f">{{$answer[1]}} <i class="fa fa-check"></i></b></td>--}}
{{--                            @elseif($answer[0]==\App\StatusInterface::ISWRONG)--}}
{{--                                <td><b style="color: red">{{$answer[1]}} <i class="fa fa-times"></i></b></td>--}}
{{--                                @elseif($answer[0]==null)--}}
{{--                                <td>chưa chọn</td>--}}


{{--                                {{$i++}}--}}
{{--                            @endif--}}
{{--                        @endforeach--}}
{{--                    </tr>--}}

{{--                    </tbody>--}}
{{--                </table>--}}
                <h5>Đáp án đúng</h5>
                <table class="table table-bordered table-success" style="text-align: center">
                    <thead>
                    <tr>
                        <th scope="col">Câu</th>
                        <th scope="col">Đáp án</th>

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
                <h5>Kết quả thi</h5>
                <div>
                    @foreach($listAnswers as $key=>$answer)
                        @if($answer[0]==\App\StatusInterface::ISRIGHT)
                    <div class="true" {{value($answer[1])}}>{{++$key}} <i class="fa fa-check"></i></div>
                            @elseif($answer[0]==\App\StatusInterface::ISWRONG)
                            <div class="false" {{value($answer[1])}}>{{++$key}} <i class="fa fa-times"></i></div>
                            @else
                            <div>{{++$key}} <i class="fa fa-times"></i></div>

                        @endif
                        @endforeach
                </div>
            </div>
        </div>
        <label>Điểm số của bạn {{count($answersRight)}}/{{count($questions)}}</label>

    </div>
@endsection
