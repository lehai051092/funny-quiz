@extends('layouts.app')
@section('content')
    <div class="container m-5">
        <div class="row m-5">
            <div class="col-12 m-5">
                <a href="{{route('categories.create')}}" class="btn btn-link">Thêm mới</a>
                <div class="row">

                    @foreach($categories as $category)
                    <div class="card col-4" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                          <a href=""> <h5 class="card-title">{{$category->name}}</h5></a>
                            <a href="{{route('categories.delete',$category->id)}}" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


@endsection
