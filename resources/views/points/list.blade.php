@extends('layouts.app')
@section('content')
<div class="container p-5">
    <h3>Statistics table of results "{{$quiz->name}}" </h3>

    <div class="col-8">
        <table class="table table-bordered table-success" style="text-align: center">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Point</th>
                <th scope="col">Time</th>
            </tr>
            </thead>
            <tbody>
            @foreach($points as $key=> $point)
                <tr>
                    <th scope="row">{{++$key}}</th>
                    <th scope="row">{{$point->point}}/{{count($questions)}}</th>
                    <th scope="row">{{$point->created_at}}</th>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</div>


    @endsection
