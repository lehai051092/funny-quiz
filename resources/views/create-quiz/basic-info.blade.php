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
                            <form>
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control">
                                </div>
                                 <div class="form-group">
                                    <label>Desc</label>
                                     <textarea class="form-control"></textarea>
                                </div>
                                 <div class="form-group">
                                    <label>Category</label>
                                     <select class="form-control">
                                         <option>1</option>
                                         <option>2</option>
                                         <option>3</option>
                                         <option>4</option>
                                         <option>5</option>
                                     </select>
                                </div>
                                <div class="form-group">
                                    <img src="" class="img-circle" alt="ảnh đại diện cho quiz" width="304" height="236"><br>
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
