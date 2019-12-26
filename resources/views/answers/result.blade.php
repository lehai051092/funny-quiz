@extends('layouts.app')
@section('content')

    <div class="container p-5 ">
        <h1 class="p-5"><i class="fa fa-table"> Bảng thống kê kết quả thi của bạn</i></h1>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered table-danger" style="text-align: center">
                    {{$i = 0}}
                    <thead>
                    </thead><tbody>
                    <tr>
                        <td><b class="fa">Question No</b></td>
                        @foreach($listAnswers as $key=>$answer)
                            <td><b>{{++$key}}</b></td>
                        @endforeach
                    </tr>
                    <tr>
                        <td scope="col"><b class="fa">Answer Right</b></td>
                        @foreach($answers as $answer)
                            @foreach($questions as $question)
                            @if($answer->status === \App\StatusInterface::ISRIGHT && $answer->question_id===$question->id)

                                <td scope="col"><b>{{$answer->title}}</b></td>
                            @endif
                        @endforeach
                        @endforeach
                    </tr>
                    <tr>
                        <td scope="col"><b class="fa">Your Answer</b></td>
                        @foreach($listAnswers as $answer )
                            <td><b>{{$answer[1]}}</b></td>
                            {{$i++}}
                        @endforeach
                    </tr>

                    </tbody>
                </table>

            </div>
        </div>
        <label>Bạn trả lời là đúng {{count($answersRight)}}/{{count($questions)}} câu.</label>

    </div>
@endsection
