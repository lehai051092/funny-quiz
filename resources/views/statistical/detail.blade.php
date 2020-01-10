@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-12">
            <div class="row">
                <div class="card" style="width: 100%;">
                    <div class="card-header" style="background: linear-gradient(to right, #61ba6d, #83c331);">
                        <h2 style="color: white">{{$data->quiz->name}}</h2>
                        <h4 style="color: white">{{$notification->created_at}}</h4>
                    </div>
                    <div>
                        @foreach($data->listQuestion as $key=> $dataQues)
                            <div>
                                <div style="font-size: 25px" class="mt-3">Câu {{++$key}}: {{$dataQues->title}}</div>
                                @foreach($dataQues->answers as $answer)
                                    <div>
                                        <ul class="p-2">
                                            @foreach($data->listAnswersUserChoose as $userChoose)
                                                @if($userChoose == $answer->id)
                                                    <li style="color: red"><i class="fa fa-angle-double-right"></i>
                                                        @endif
                                                        @endforeach
                                                        {{$answer->title}}
                                                    </li>
                                        </ul>
                                    </div>
                                @endforeach

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
@endsection
