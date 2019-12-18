@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="card shadow mb-4 col-6 d-flex justify-content-center">
            <div class="card-header py-3" style="background: linear-gradient(to right,#61ba6d, #83c331)">
                <h1 class="text-center text-white" >Create Quiz</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <form enctype="multipart/form-data" method="post" action="{{route('quizzes.store')}}">
                            @csrf
                            <div class="form-group">
                                <label><h5>Title</h5></label>
                                <input type="text" class="form-control" name="title"
                                       @if($errors->has('title'))
                                       style="border: solid red"
                                    @endif
                                >
                                @if($errors->has('title'))
                                    <p class="text-danger">{{$errors->first('title')}}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label><h5>Desc</h5></label>
                                <textarea class="form-control" name="desc"
                                          @if($errors->has('desc'))
                                          style="border: solid red"
                                        @endif
                                    ></textarea>
                                @if($errors->has('desc'))
                                    <p class="text-danger">{{$errors->first('desc')}}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label><h5>Category</h5></label>
                                <select class="form-control" name="categories"
                                        @if($errors->has('categories'))
                                        style="border: solid red"
                                    @endif
                                >
                                    <option value="">Choose  Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('categories'))
                                    <p class="text-danger">{{$errors->first('categories')}}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="file" name="image"
                                       @if($errors->has('image'))
                                       style="border: solid red"
                                    @endif
                                >
                                @if($errors->has('image'))
                                    <p class="text-danger">{{$errors->first('image')}}</p>
                                @endif
                            </div>
                            <button type="submit" class="btn text-white" style="background: linear-gradient(to right,#61ba6d, #83c331)" >Create</button>&nbsp;
                            <a class="btn btn-secondary" href="{{route('index')}}">Cancel</a>
                        </form>

                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
