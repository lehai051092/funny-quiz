@extends('layouts.app')
@section('content')
    <img src="" alt="">
    <div style="background-image: url({{asset('storage/img/bg-img/bg-2.jpg')}})">
        <div class="container pt-5 d-flex justify-content-center ">
            <div class="col-10">
                <div class="row">
                    <div class="card m-5" style="width: 100%">
                        <div class="card-header" style="background: linear-gradient(coral,pink,yellow)">
                            <h1 class="text-center" style="color: brown">Create Quiz - Basic Information</h1>
                        </div>
                        <div class="card-body">
                            <form method="post" action="" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label><h5>Title</h5></label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label><h5>Desc</h5></label>
                                    <textarea class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label><h5>Category</h5></label>
                                    <select class="form-control">
                                        @foreach($categories as $category)
                                        <option>{{$category->name}}</option>
                                            @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-group"></label>
                                    <input type="file" name="image" >
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
