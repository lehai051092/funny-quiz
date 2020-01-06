@extends('layouts.app')
@section('content')
    <div class="container p-5">
        <div class="col-12">
            <div class="row">
            @foreach($listAnswers as $key=>$answer)
                @if($answer[0]==\App\StatusInterface::ISRIGHT)
                    <!-- Button trigger modal -->
                        <button type="button" class="true" data-toggle="modal" data-target="#exampleModal">
                            {{++$key}}
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @foreach($answersAll as $answerRight)
                                    <div class="modal-body">
                                     @if($answerRight->status=== \App\StatusInterface::ISRIGHT)

                                         @endif
                                    </div>
                                    @endforeach
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                        </button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection

