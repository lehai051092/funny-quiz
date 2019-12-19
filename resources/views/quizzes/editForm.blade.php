@extends('layouts.admin')
@section('content')
        <div class="card shadow mb-4 d-flex justify-content-center">
            <div class="card-header py-3" style="background: linear-gradient(to right,#61ba6d, #83c331)">
                <h1 class="text-center text-white" >Edit Quiz</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <form method="post" action="{{route('quizzes.update',$quiz->id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                               <div class="col-12">
                                   <div class="row">
                                       <label class="col-2"><h4>Name Quiz</h4></label>
                                       <input type="text" class="form-control col-9" placeholder="Enter Name Test" name="name" value="{{$quiz->name}}">
                                   </div>
                               </div>
                            </div>
                            <div class="form-group">
                                <div class="col-12">
                                    <div class="row">
                                        <label class="col-2"><h4>Desc</h4></label>
                                        <input type="text" class="form-control col-9" placeholder="Enter Desc" name="desc" value="{{$quiz->desc}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-12">
                                    <div class="row">
                                        <label class="col-2"><h4>Category</h4></label>
                                        <select class="form-control col-9"  name="category_id">
                                            <option
                                                @if($quiz->category_id==$quiz->id)
                                                selected
                                                @endif
                                                value="{{$category->id}}">{{$category->name}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-12">
                                    <div class="row">
                                        <label class="col-2"><h4>Image</h4></label>
                                        <img src="{{asset('storage/'.$quiz->image)}}" alt=""
                                             style="width: 200px" class="pb-4">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-2"></div>
                                                <div class="col-9">
                                                        <input type="file" name="image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           <div class="pl-3">
                               <button type="submit" class="btn btn-primary">Update</button>
                           </div>
                        </form>

                    </table>
                </div>
            </div>
        </div>

@endsection
