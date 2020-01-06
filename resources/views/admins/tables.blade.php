@extends('layouts.admin')
@section('content')
    <!-- Page Heading -->
    <h1 class="h1 mb-2 text-gray-800">List Category</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For
        more information about DataTables, please visit the <a target="_blank"
                                                               href="https://datatables.net">official
            DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="{{route('categories.create')}}" class="btn text-white"
                   style="background: linear-gradient(to right,#61ba6d, #83c331)"><i class="fas fa-fw fa-plus"></i>Create Category</a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($categories as $category)
                        <tr class="category-{{$category->id}}">
                            <td>
                                <h5><i class="fa" style="color: black">{{$category->name}}</i></h5>
                            </td>
                            <td>
                                <a href="{{route('categories.delete',$category->id)}}"
                                   class="btn btn-danger text-white delete-category" style="color: red"
                                   onclick="return confirm('Are you want delete ?')">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
