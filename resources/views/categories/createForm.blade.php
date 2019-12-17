@extends('layouts.app')
@section('content')
    <div class="container m-5">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="card" style="width: 100%;">
                    <div class="card-header" style="background: linear-gradient(to right,#61ba6d, #83c331)">
                        <h1 class="text-white text-center">Create Category</h1>
                    </div>
                    <hr/>
                    <form method="post" action="{{route('categories.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label><h3><i class="fa">Name Category</i></h3></label>
                            <input type="text" class="form-control" placeholder="Enter Name Category" name="name">
                        </div>
                        <button type="submit" class="btn text-white" style="background: linear-gradient(to right,#61ba6d, #83c331)">Create</button>
                    </form>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
@endsection
