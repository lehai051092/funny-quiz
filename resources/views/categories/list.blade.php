@extends('layouts.app')
@section('content')

    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('storage/img/blog-img/1.jpg')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset('storage/img/blog-img/2.jpg')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset('storage/img/blog-img/3.jpg')}}" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <div class="container">
        <div class="col-12">
            <div class="row m-5">
                <div class="col-12">

                    <div class="card mb-3" style="max-width: 100%;">
                        <div class="row no-gutters">
                            <div class="col-4" style="max-width: 100%;">
                                <img src="{{asset('storage/img/user/anh1.jpg')}}" class="card-img" alt="...">
                            </div>
                            <div class="col-8">
                                <div class="card-body" style="max-width: 100%;">
                                    <h1 class="card-title text-center">List Category</h1>
                                    <a href="{{route('categories.create')}}" class="btn btn-link" style="color: blue">Create</a>

                                    <div class="m-3">
                                        <form class="form-inline my-2 my-lg-0 ">
                                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                        </form>

                                    </div>

                                    <div class="wrap text-center" >
                                        <table class="head">
                                            <tbody>
                                            <tr>
                                                <td><h5>Name Category</h5></td>
                                                <td><h5>Action</h5></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <div class="scroll-table">
                                            <table>
                                                @foreach($categories as $category)
                                                    <tbody></tbody>
                                                    <tr>
                                                        <td>
                                                            <a href="{{route('tests.list',$category->id)}}">{{$category->name}}</a>
                                                        </td>
                                                        <td>
                                                            <a href="{{route('categories.delete',$category->id)}}" class="btn btn-link" style="color: red" onclick="return confirm('Are you sure delete ???')">Delete</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
