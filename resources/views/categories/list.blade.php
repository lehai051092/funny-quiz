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
            <div class="row mb-5">
                <div class="col-12">

                    <div class="card" style="max-width: 100%;">
                        <div class="card-header" style="background: linear-gradient(to right,#61ba6d, #83c331)">
                            <h1 class="text-white text-center">List Category</h1>
                        </div>
                        <div id="app" class="mt-5">
                            @include('users.flash-message')
                            @yield('message')
                        </div>
                        <div class="row no-gutters mt-5">
                            <div class="col-3 mr-1" style="max-width: 100%;">
                                <img src="{{asset('storage/img/user/anh1.jpg')}}" class="card-img" alt="...">
                            </div>
                            <div class="col-8">
                                <div class="card-body" style="max-width: 100%;">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-9">
                                                <a href="{{route('categories.create')}}" class="btn text-white" style="background: linear-gradient(to right,#61ba6d, #83c331)">Create</a>
                                            </div>
                                            <div class="col-3">
                                                <form class="form-inline my-2 my-lg-0 " style="max-width: 100%" >
                                                    @csrf
                                                    <input class="form-control " type="search" placeholder="Search" aria-label="Search" id="search">
                                                </form>
                                            </div>
                                        </div>
                                    </div>

<hr/>
                                    <div class="wrap text-center" >
                                        <table class="head">
                                            <tbody>
                                            <tr>
                                                <td><h4>Name Category</h4></td>
                                                <td><h4>Action</h4></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <div class="scroll-table">
                                            <table>
                                                <tbody id="list-categories">
                                                @foreach($categories as $category)
                                                <tr class="category-{{$category->id}}">
                                                    <td>
                                                        <a href="{{route('quizzes.list',$category->id)}}"><h5><i class="fa">{{$category->name}}</i></h5></a>
                                                    </td>
                                                    <td>
                                                        <a href=""  class="btn btn-danger text-white delete-category" style="color: red" data-id="{{$category->id}}" onclick="return confirm('Are you delete???')">Delete</a>
                                                    </td>
                                                </tr>
                                                    @endforeach
                                                </tbody>
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

