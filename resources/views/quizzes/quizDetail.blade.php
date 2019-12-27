@extends('layouts.app')
@section('content')
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <div class="container p-5">
        <div class="row m-5">
            <div class="col-12 m-5">
                <div class="row">
                    <div class="container">
                        <div class="card">
                            <div class="container-fliud">
                                <div class="wrapper row">
                                    <div class="preview col-md-6">

                                        <div class="preview-pic tab-content">
                                            <div class="tab-pane active" id="pic-1"><img
                                                    src="{{asset('storage/'.$quiz->image)}}"/></div>
                                            <div class="tab-pane" id="pic-2"><img src="http://placekitten.com/400/252"/>
                                            </div>
                                            <div class="tab-pane" id="pic-3"><img src="http://placekitten.com/400/252"/>
                                            </div>
                                            <div class="tab-pane" id="pic-4"><img src="http://placekitten.com/400/252"/>
                                            </div>
                                            <div class="tab-pane" id="pic-5"><img src="http://placekitten.com/400/252"/>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="details col-md-6">
                                        <h3 class="product-title">{{$quiz->name}}</h3>
                                        <div class="rating">
                                            <div class="stars">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                            </div>
                                            <span class="review-no">41 reviews</span>
                                        </div>
                                        <p class="product-description">{{$quiz->desc}}</p>
                                        <div class="action">
                                           <a href="{{route('questions.basic.list',$quiz->id)}}"><button class="add-to-cart btn btn-danger" type="button">Làm Quiz!
                                            </button></a>
                                            <a href="{{route('point.list',$quiz->id)}}"><button class="add-to-cart btn btn-danger" type="button">Thống kê điểm thi
                                                </button></a>
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
