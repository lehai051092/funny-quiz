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
                                    <input type="text" class="form-control" name="title" id="title">
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
                                <label class="col-2"><h4><i class="fa">Type</i></h4></label>
                                <div class="col-9">
                                    <select class="form-control" name="types" id="type">
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
                                                <div class="" id="dynamic_field">
                                                    <div class="row">
                                                        <input type="text" class="form-control  col-9 answer" value=""/>&nbsp;&nbsp;

                                                        <input type="checkbox" id="myCheck" class="status" value="2"/>

                                                        <input type="text"
                                                               value="{{\Illuminate\Support\Facades\DB::table('questions')->max('id') + 1}}"
                                                               class="questionId" style="display: none"/>
                                                        <i name="remove" id="' + i + '" class="fa fa-trash btn_remove"
                                                           style="color: red" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <a id="insertAnswer" class="btn btn-link"><i class="fa fa-plus"
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
                    </div>

                </table>
            </div>
        </div>
    </div>

@endsection
