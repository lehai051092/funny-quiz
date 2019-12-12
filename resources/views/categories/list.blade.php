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
                <div class="card mb-3" style="max-width: 1000px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="{{asset('storage/img/user/anh1.jpg')}}" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h1 class="card-title text-center">List Category</h1>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
