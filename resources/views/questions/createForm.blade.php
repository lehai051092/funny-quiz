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
                                    <a  id="insertAnswer" class="btn btn-link">Add Answer</a>
                                    <div class="col-1">
                                        <a href=""><i class="fa fa-check" aria-hidden="true"></i></a>&nbsp;
                                        <a href=""><i class="fa fa-trash" style="color: red" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="form-group">
                                            <div class="table-responsive">
                                                <table class="" id="dynamic_field">
                                                    <tr>
                                                        <td><input type="text" name="name[]"  class="form-control name_list" /></td>
                                                    </tr>
                                                </table>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pl-3">
                            <button type="submit" class="btn btn-success text-center ">Create</button>
                        </div>
                    </form>
                </table>
            </div>
        </div>
    </div>

@endsection
