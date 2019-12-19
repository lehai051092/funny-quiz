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
                    <form method="post" action="{{route('questions.store')}}">
                        @csrf
                        <div class="form-group">
                            <div class="col-12">
                                <div class="row">
                                    <label class="col-2"><h4><i class="fa">Title Question</i></h4></label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" name="title">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-12">
                                <div class="row">
                                    <label class="col-2"><h4><i class="fa">Desc Question</i></h4></label>
                                    <div class="col-9">
                                        <textarea type="text" class="form-control" name="desc"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-12">
                                <div class="row">
                                    <label class="col-2"><h4><i class="fa">Content Question</i></h4></label>
                                    <div class="col-9">
                                        <textarea type="text" class="form-control" name="contentQuestion"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-12">
                                <div class="row">
                                    <label class="col-2"><h4><i class="fa">Category</i></h4></label>
                                    <div class="col-9">
                                        <select class="form-control" name="category_id">
                                            <option value="">Select Category</option>
                                            <option value="">1</option>
                                            <option value="">2</option>
                                            <option value="">3</option>
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
                                        <select class="form-control" name="">
                                            <option value="">Select Type</option>
                                            <option value="">1</option>
                                            <option value="">2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-2"><h4><i class="fa">Answer</i></h4></div>
                                    <div class="col-9">
                                        <div class="col-12">
                                            <div class="" id="dynamic_field">

                                            </div>
                                        </div>
                                        <a id="insertAnswer" class="btn btn-link"><i class="fa fa-plus"
                                                                                     aria-hidden="true"></i> Add Answer</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pb-3 pl-5">
                            <button type="submit" class="btn btn-success text-center ">Create</button>
                        </div>

                    </form>
                </table>
            </div>
        </div>
    </div>

@endsection
