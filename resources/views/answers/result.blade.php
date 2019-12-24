@extends('layouts.app')
@section('content')

<div class="container p-5">
    <div class="row">
        <div class="col-8">
            <table class="table table-dark" style="text-align: center">
                <thead>
                <tr>
                    <th scope="col">Answer Right</th>
                    <th scope="col">Your Answer</th>
                </tr>
                </thead>
                <tbody>
                @foreach($answers as $answer)
                    @if($answer->status === \App\StatusInterface::ISRIGHT)
                        <tr>
                            <th scope="row">{{$answer->title}}</th>
                            @if($result)
                            <th scope="row">{{$result}}</th>
                                @else
                                <th scope="row">Chưa chọn</th>
                                @endif

                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

</div>
@endsection
