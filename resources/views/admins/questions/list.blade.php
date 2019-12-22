@extends('layouts.admin')
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold">
                List <Question></Question>
            </h3>
           <div class="pt-3">
               <form class="form-inline my-2 my-lg-0">
                   <div class="col-md-2 form-group">
                       <select name="type" class="form-control w-100">
                           <option value="-1">Type</option>

                                   <option value=""></option>
                       </select>
                   </div>
                   <div class="col-md-2 form-group">
                       <select name="category_id" class="form-control w-100">
                           <option value="-1">Category</option>

                           <option value=""></option>
                       </select>
                   </div>
                   <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
               </form>
           </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Question</th>
                        <th>Desc</th>
                        <th>Content</th>
                        <th>Category</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Question</th>
                        <th>Desc</th>
                        <th>Content</th>
                        <th>Category</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($questions as $question)
                        <tr>
                            <td><h3>{{$question->title}}</h3></td>
                            <td><h3>{{$question->desc}}</h3></td>
                            <td><h3>{{$question->content}}</h3></td>
                            <td>
                                @if($question->category_id === $question->category['id'])
                                <h3>{{$question->category['name']}}</h3>
                                   @endif
                            </td>
                            <td><h3>{{$question->type}}</h3></td>
                            <td>
                                <a href="{{route('questions.delete',$question->id)}}"
                                   class="btn btn-danger text-white delete-category" style="color: red"
                                   onclick="return confirm('Are you want delete ?')">Del</a>
                                <a href="{{route('questions.edit',$question->id)}}"
                                   class="btn btn-primary text-white delete-category" style="color: red"
                                >Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
