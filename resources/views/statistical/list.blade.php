@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-12">
            <div class="row">
                <div class="card" style="width: 100%;">
                    <div class="card-header" style=" font-size: 25px">
                        Statistical tables
                    </div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">First</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            @foreach($notifications as $key=>$natification)
                            <th scope="row">{{++$key}}</th>
                                @endforeach
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @endsection
