@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="card shadow mb-4 col-6 d-flex justify-content-center">
            <div class="card-header py-3">
                <h1 class="m-0 font-weight-bold text-primary">
                    Create Question
                </h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <form method="post" action="{{route('questions.store')}}">
                            @csrf
                            <div class="form-group">
                                <label>Name Question</label>
                                <input type="text" class="form-control" placeholder="Enter Name Test" name="title">
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
