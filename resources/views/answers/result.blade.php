@extends('layouts.app')
@section('content')
    {{--        {{dd(json_decode(\App\Notification::all()[0]->data)->listAnswer)}}--}}
    <div class="container p-5">
        <div class="container p-5">
            <div class="card" style="width: 100%; background-color: white">
                <div class="card-header" style="background: linear-gradient(to right, #61ba6d, #83c331);">
                    <h3 class="text-white">Exam result <label style="color: white">{{$quiz->name}}</label></h3>
                </div>
                <div class="row">
                    <div class="col-8 p-5">
                    @foreach($listAnswers as $key=>$answer)

                        @if($answer[0]==\App\StatusInterface::ISRIGHT)
                            <!-- Button trigger modal -->
                                <button type="button" class="true" data-toggle="modal"
                                        data-target="#exampleModal{{$key}}">
                                    {{$key+1}} <i class="fa fa-check"></i>
                                </button>
                            @else
                                <button type="button" class="false" data-toggle="modal"
                                        data-target="#exampleModal{{$key}}">
                                    {{$key+1}} <i class="fa fa-times"></i>
                                </button>
                            @endif
                        <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{$key}}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Result</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" style="padding-top: 35px">
                                            @foreach($isRightAnswers as $keyAns=>$isRightAnswer)
                                                @foreach($listQuestion as $keyQues=>$question)
                                                    @if($question==$isRightAnswer->question_id&&$key===$keyQues)
                                                        <div class="resultChoose">
                                                            @if($answer[0]==\App\StatusInterface::ISRIGHT)

                                                                Đáp án của bạn chính xác
                                                                <div><i class="fa fa-check iconRight"></i></div>
                                                            @elseif($answer[0]==\App\StatusInterface::ISWRONG)
                                                                Đáp án của bạn không chính xác
                                                                <div> <i class="fa fa-times iconWrong" ></i></div>
                                                            @endif
                                                        </div>
                                                        <div class="resultRight">
                                                            Đáp án là: {{$isRightAnswer->title}}
                                                        </div>

                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-4 result">
                        <div class="title">
                            Your Point
                            <div class="content mt-4">
                                {{count($listAnswersRight)}}/{{count($listAnswers)}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <h3>Answer you choose</h3>
                    @if(count($notifications))
                        @foreach($notifications as $keyNotify=> $notice)

                            @if((count($notifications)-1)==$keyNotify)
                                @foreach(json_decode($notice->data)->listQuestion as $key=> $question)
                                    <div class="question p-3">
                                        Câu {{++$key}} . {{$question->title}}
                                    </div>
                                    @foreach(json_decode($notice->data)->listAnswer as $answer)
                                        @foreach($answer as $item)
                                            @if($item->question_id==$question->id)
                                                <div>
                                                    <ul class="p-2">
                                                        @foreach($listAnswersUserChoose as $userChoose)
                                                            @if($userChoose == $item->id)
                                                               <li  style="color: red"><i class="fa fa-angle-double-right"></i>
                                                                @endif
                                                            @endforeach
                                                            {{$item->title}}
                                                        </li>
                                                    </ul>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endforeach
                                @endforeach
                            @endif
                        @endforeach
                    @endif

                </div>

            </div>
        </div>
    </div>

@endsection

