@extends('layouts.app')
@section('content')
    <div class="container bootstrap snippet mt-5">
        <div class="row">
            <div class="col-lg-12 mt-5 mb-5">
                <div class="card" style="width: 100%;">
                    <div id="app">
                        @include('users.flash-message')
                        @yield('message')
                    </div>
                    <div class="card-header">
                        <h3><i class="fa">List Quiz</i></h3>
                    </div>
                    <hr>
                    <div class="main-box no-header clearfix">
                        <div class="main-box-body clearfix">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($quizzes as $quiz)
                                            <tr>
                                                <td><a href="{{route('quizzes.add',$quiz->id)}}">{{$quiz->name}}</a></td>
                                            </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
