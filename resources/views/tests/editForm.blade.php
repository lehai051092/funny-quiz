@extends('layouts.app')
@section('content')
    <div class="container m-5">
        <div class="col-12 m-5">
            <div class="row m-5">
                <div class="col-8 m-5">
                    <form method="post" action="{{route('tests.update',$test->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name Test</label>
                            <input type="text" class="form-control" placeholder="Enter Name Test" name="name"
                                   value="{{$test->name}}">
                        </div>
                        <div class="form-group">
                            <label>Desc</label>
                            <input type="text" class="form-control" placeholder="Enter Desc" name="desc"
                                   value="{{$test->desc}}" }>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category_id">
                                <option
                                    @if($test->category_id==$category->id)
                                    selected
                                    @endif
                                    value="{{$category->id}}">{{$category->name}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <img src="{{asset('storage/'.$test->image)}}" alt=""
                                 style="width: 150px">
                            <input type="file" class="form-control" name="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
