@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-12">
            <div class="row">
                <div class="card" style="width: 100%;">
                    <div class="card-header" style=" font-size: 25px">
                        User History
                    </div>
                    <table class="table table-striped">
                        <thead>
                        <tr>

                            <th scope="col">STT</th>
                            <th scope="col">Quiz</th>
                            <th scope="col">Time Did</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--                        @if()--}}
                        @foreach($quizzesUser as $key => $quizUser)
                            <tr>
                                {{--                                    {{dd($quizUser)}}--}}
                                <td scope="row">{{1+$key}}</td>
                                <td scope="row"><a
                                        @foreach($notifications as $keyNotifi=>$notification)
                                        @if($keyNotifi==$key)
                                        href="{{route('statistical.detail', $notification->uid)}}"
                                        @endif
                                        @endforeach

                                    >{{$quizUser['name']}}</a>
                                </td>
                                <td>
                                    @foreach($notifications as $keyNotifi=>$notification)
                                        @if($keyNotifi==$key)
                                            {{$notification->created_at}}
                                        @endif
                                    @endforeach

                                </td>
                            </tr>
                        @endforeach
                        {{--                        @endif--}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
