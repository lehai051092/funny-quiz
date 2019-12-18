@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="card shadow mb-4 col-6 d-flex justify-content-center">
            <div class="card-header py-3" style="background: linear-gradient(to right,#61ba6d, #83c331)">
                <h1 class="text-center text-white" >Edit Quiz</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <form method="post" action="{{route('quizzes.update',$quiz->id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Name Quiz</label>
                                <input type="text" class="form-control" placeholder="Enter Name Test" name="name" value="{{$quiz->name}}">
                            </div>
                            <div class="form-group">
                                <label>Desc</label>
                                <input type="text" class="form-control" placeholder="Enter Desc" name="desc" value="{{$quiz->desc}}">
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control"  name="category_id">
                                    <option
                                        @if($quiz->category_id==$quiz->id)
                                        selected
                                        @endif
                                        value="{{$category->id}}">{{$category->name}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <img src="{{asset('storage/'.$quiz->image)}}" alt=""
                                     style="width: 150px">
                                <input type="file" class="form-control" name="image">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>

                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
