@extends('layouts.app')
@section('content')
    <img src="" alt="">
    <div style="background-image: url({{asset('storage/img/bg-img/bg-2.jpg')}})">
        <div class="container pt-5 d-flex justify-content-center ">
            <div class="col-10">
                <div class="row">
                    <div class="card m-5" style="width: 100%;background-color: inherit">
                        <div class="card-header" style="background: linear-gradient(coral,pink,yellow)">
                            <h1 class="text-center" style="color: brown">Create Quiz - Basic Information</h1>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label><h5>Title</h5></label>
                                    <input type="text" class="form-control"style="background-color: inherit; color: white">
                                </div>
                                 <div class="form-group">
                                    <label><h5>Desc</h5></label>
                                     <textarea class="form-control"></textarea>
                                </div>
                                 <div class="form-group">
                                    <label><h5>Category</h5></label>
                                     <select class="form-control">
                                         <option>1</option>
                                         <option>2</option>
                                         <option>3</option>
                                         <option>4</option>
                                         <option>5</option>
                                     </select>
                                </div>
                                <div class="form-group">
                                    <img src="" id="imgProfile"
                                         style="width: 150px; height: 150px" class="img-thumbnail"/>
                                    <br><br>
                                    <input type="file" >
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
