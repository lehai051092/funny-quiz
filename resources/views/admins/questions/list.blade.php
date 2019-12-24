@extends('layouts.admin')
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold">
                List Question
            </h3>

            <div class="pt-3">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">
                    Filter question
                </button>
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                     aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form action="{{route('admins.filter')}}" method="post">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-titless" id="exampleModalLabel">Filter Question</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="list-group">
                                                    <h3>Title</h3>
                                                    <select name="title"
                                                            class="form-control w-100">
                                                        <option value="-1">Title</option>
                                                        @foreach($questions as $question)
                                                            <option
                                                                value="{{$question->id}}">{{$question->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="list-group">
                                                    <h3>Type</h3>
                                                    <select name="type_id"
                                                            class="form-control w-100">
                                                        <option value="-1">Type</option>
                                                        @foreach($types as $type)
                                                            <option
                                                                value="{{$type->id}}">{{$type->name}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="list-group">
                                                    <h3>Category</h3>
                                                    <select name="category_id"
                                                            class="form-control w-100">
                                                        <option value="-1">Category</option>
                                                        @foreach($categories as $category)
                                                            <option
                                                                value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Load</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
                    <tfoot>
                    <tr>
                        <th>Question</th>
                        <th>Desc</th>
                        <th>Content</th>
                        <th>Category</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($questions as $question)
                        <tr>
                            <td><h5>{{$question->title}}</h5></td>
                            <td><h5>{{$question->desc}}</h5></td>
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
