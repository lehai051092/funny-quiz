@extends('layouts.app')
@section('content')
    <div class="container p-5">
        <div class="container p-5">
            <div class="col-12">
                <div class="row">
                @foreach($listAnswers as $key=>$answer)

                    {{--                    @if($answer[0]==\App\StatusInterface::ISRIGHT)--}}
                    <!-- Button trigger modal -->
                        <button type="button" class="true" data-toggle="modal" data-target="#exampleModal{{$key}}">
                            {{$answer}}
                        </button>


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{$key}}" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @foreach($isRightAnswers as $keyAns=>$isRightAnswer)
                                            @foreach($listQuestion as $keyQues=>$question)
                                                @if($question==$isRightAnswer->question_id&&$key===$keyQues)
                                                    {{$isRightAnswer->title}}
                                                    {{--                                                    @break--}}
                                                    {{--                                        @break--}}
                                                @endif
                                                {{--                                                @break--}}
                                            @endforeach

                                        @endforeach
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                        </button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--                        @endif--}}
                    @endforeach

                </div>
            </div>
        </div>
    </div>

@endsection

