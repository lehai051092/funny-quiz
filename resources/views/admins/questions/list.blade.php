@extends('layouts.admin')
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="m-0 font-weight-bold">
                List Question
            </h2>

            <div class="pt-3">

{{--                <form action="{{route('admins.filter')}}" method="get">--}}
{{--                    @csrf--}}
                    <div class="modal-body">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-1">

                                </div>
                                <div class="col-4">
                                    <div class="list-group">
                                        <select name="title" id="title_id"
                                                class="form-control w-100">
                                            <option value="-1">Title</option>
                                            @foreach($listQuestions as $question)
                                                <option
                                                    value="{{$question->id}}">{{$question->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="list-group">
                                        <select name="type_id" id="type_id"
                                                class="form-control w-100">
                                            <option value="-1">Type</option>
                                            @foreach($types as $type)
                                                <option
                                                    value="{{$type->id}}">{{$type->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="list-group">
                                        <select name="category_id" id="category_id"
                                                class="form-control w-100">
                                            <option value="-1">Category</option>
                                            @foreach($categories as $category)
                                                <option
                                                    value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-1"></div>
                                <div class="col-1">
                                    <button type="button" class="btn btn-primary" id="filter">Filter</button>
{{--                                    <button type="submit" class="btn btn-primary" id="filter">Filter</button>--}}
                                </div>
                            </div>
                        </div>
                    </div>

{{--                </form>--}}
            </div>
            <div class="text-center pt-3">
                <h5><i class="fas fa-laugh-wink" style="color: green"></i> <i class="fa" id="count_filter">Filter <b>{{count($questions)}}</b> results with your selection.</i></h5>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Question</th>
                        <th>Desc</th>
                        <th>Content</th>
                        <th>Category</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody id="print_filter">
                    @foreach($questions as $question)
                        <tr>
                            <td><h5>{{$question->title}}</h5></td>
                            <td><h5>{!! $question->desc !!}</h5></td>
                            <td><h5>{{$question->content}}</h5></td>
                            <td>
                                @if($question->category_id === $question->category['id'])
                                    <h5>{{$question->category['name']}}</h5>
                                @endif
                            </td>
                            <td>
                                @if($question->type_id === $question->type['id'])
                                    <h5>{{$question->type['name']}}</h5>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('questions.delete',$question->id)}}"
                                   class="btn btn-danger text-white delete-category" style="color: red"
                                   onclick="return confirm('Are you want delete ?')">Del</a>
                                <a href="{{route('questions.edit',$question->id)}}"
                                   class="btn btn-primary text-white delete-category" style="color: red"
                                >Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
