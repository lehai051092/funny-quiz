@extends('layouts.admin')
@section('content')

    <div class="card shadow mb-4 d-flex">
        <div class="card-header py-3">
            <h1 class="m-0 font-weight-bold">
                Create Question
            </h1>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <div class="form-group">
                        <div class="col-12">
                            <div class="row">
                                <label class="col-2"><h4><i class="fa">Title Question</i></h4></label>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="title" id="title"
                                           @if($errors->has('title'))
                                           style="border: solid red"
                                        @endif>
                                    @if($errors->has('title'))
                                        <p class="text-danger">{{$errors->first('title')}}</p>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12">
                            <div class="row">
                                <label class="col-2"><h4><i class="fa">Desc Question</i></h4></label>
                                <div class="col-9">
                                    <textarea type="text" class="form-control" name="desc" id="desc"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12">
                            <div class="row">
                                <label class="col-2"><h4><i class="fa">Content Question</i></h4></label>
                                <div class="col-9">
                                    <textarea type="text" class="form-control" name="contentQuestion"
                                              id="contentQuestion"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12">
                            <div class="row">
                                <label class="col-2"><h4><i class="fa">Category</i></h4></label>
                                <div class="col-9">
                                    <select class="form-control" name="category" id="category">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12">
                            <div class="row">
                                <label class="col-2"><h4><i class="fa">Type</i></h4></label>
                                <div class="col-9">
                                    <select class="form-control type" name="types" id="type">
                                        <option value="">Select Type</option>
                                        @foreach($types as $type)
                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="display_form_answer" style="display: none">
                        <form id="add_name" method="post">
                            @csrf
                            <hr/>
                            <hr/>
                            <hr/>
                            <div class="form-group">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-2"><h4><i class="fa">Answer</i></h4></div>
                                        <div class="col-9">
                                            <div class="col-12">
                                                <div id="trueFalse" style="display: none">

                                                </div>
                                                <div class="" id="dynamic_field">
                                                    <input type="text" value="" id="questionsId" class="questionsId" style="display: none"/>
                                                </div>
                                            </div>
                                            <a id="insertAnswer" style="display: none" class="btn btn-link"><i class="fa fa-plus"
                                                                                         aria-hidden="true"></i> Add
                                                Answer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button style="display: none" id="display_answer" class="btn btn-primary text-center create"
                                    type="button">Create Answers Of Question
                            </button>
                        </form>
                    </div>
                    <div class="pb-3 pl-5">
                        <button type="button" class="btn btn-primary text-center add" id="submit">Create Question
                        </button>
                        <a href="{{route('admins.questionList')}}" class="btn btn-warning done"
                           style="display: none">Done</a>
                    </div>

                </table>
            </div>
        </div>
    </div>

@endsection
