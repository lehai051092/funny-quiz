@extends('layouts.admin')
@section('content')
    <div class="card shadow mb-4 ">
        <div class="card-header py-3">
            <h1 class="m-0 font-weight-bold">
                Create Category
            </h1>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <form method="post" action="{{route('categories.store')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                           <div class="col-12">
                               <div class="row">
                                   <label class="col-2"><h4><i class="fa">Name Category</i></h4></label>
                                   <div class="col-8">
                                       <input type="text" class="form-control" name="name">
                                   </div>
                                   <div class="col-2">
                                       <button type="submit" class="btn btn-success text-center ">Create</button>
                                   </div>
                               </div>
                           </div>
                        </div>
                    </form>
                </table>
            </div>
        </div>
    </div>

@endsection
