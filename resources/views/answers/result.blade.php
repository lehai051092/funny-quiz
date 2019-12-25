@extends('layouts.app')
@section('content')

    <div class="container p-5">
        <h1>Bảng thống kê kết quả thi</h1>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered" style="text-align: center">
                    {{$i = 0}}
                    <thead>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Question No</td>
                        @foreach($listAnswers as $key=>$answer)
                            <td>{{++$key}}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td scope="col">Answer Right</td>
                        @foreach($answers as $answer)

                            @if($answer->status === \App\StatusInterface::ISRIGHT)

                                <td scope="col">{{$answer->title}}</td>
                            @endif
                        @endforeach
                    </tr>
                    <tr>
                        <td scope="col">Your Answer</td>
                        @foreach($listAnswers as $answer )
                            <td>{{$answer[0]}}</td>
                            {{$i++}}
                        @endforeach
                    </tr>

                    </tbody>
                </table>

            </div>
        </div>

    </div>
@endsection
