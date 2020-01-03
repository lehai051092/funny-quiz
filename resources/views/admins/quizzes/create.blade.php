@extends('layouts.admin')
@section('content')

        <div class="card shadow mb-4 ">
            <div class="card-header py-3">
                <h1 class="text-center" >Create Quiz</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <form enctype="multipart/form-data" method="post" action="{{route('quizzes.store')}}">
                            @csrf
                            <div class="form-group">
                                <div class="col-12">
                                    <div class="row">
                                        <label class="col-2"><h4>Title</h4></label>
                                        <input type="text" class="form-control col-9" name="title"
                                               @if($errors->has('title'))
                                               style="border: solid red"
                                            @endif
                                        >
                                        @if($errors->has('title'))
                                            <p class="text-danger">{{$errors->first('title')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-12">
                                    <div class="row">
                                        <label class="col-2"><h4>Desc</h4></label>
                                        <textarea class="form-control col-9" name="desc"
                                                  @if($errors->has('desc'))
                                                  style="border: solid red"
                                        @endif
                                    ></textarea>
                                        @if($errors->has('desc'))
                                            <p class="text-danger">{{$errors->first('desc')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-12">
                                    <div class="row">
                                        <label class="col-2"><h4>Category</h4></label>
                                        <select class="form-control col-9" name="categories"
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
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-2"></div>
                                        <div class="col-9">
                                            <input type="file" name="image"
                                                   @if($errors->has('image'))
                                                   style="border: solid red"
                                                @endif
                                            >
                                            @if($errors->has('image'))
                                                <p class="text-danger">{{$errors->first('image')}}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary text-white"  >Create</button>&nbsp;
                            <a class="btn btn-secondary" href="{{route('index')}}">Cancel</a>
                        </form>

                    </table>
                </div>
            </div>
        </div>
@endsection
