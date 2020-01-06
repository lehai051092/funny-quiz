{{--@extends('layouts.admin')--}}
{{--@section('content')--}}

{{--    <!-- DataTales Example -->--}}
{{--    <div class="card shadow mb-4">--}}
{{--        <div class="card-header py-3">--}}
{{--            <h6 class="m-0 font-weight-bold text-primary">--}}
{{--                List Quiz--}}
{{--            </h6>--}}
{{--        </div>--}}
{{--        <div class="card-body">--}}
{{--            <div class="table-responsive">--}}
{{--                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">--}}
{{--                    <thead>--}}
{{--                    <tr>--}}
{{--                        <th>Quiz</th>--}}
{{--                        <th colspan="2">Action</th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tfoot>--}}
{{--                    <tr>--}}
{{--                        <th>Quiz</th>--}}
{{--                        <th colspan="2">Action</th>--}}
{{--                    </tr>--}}
{{--                    </tfoot>--}}
{{--                    <tbody>--}}
{{--                    @foreach($quizzes as $quiz)--}}
{{--                        <tr>--}}
{{--                            <td><a href="{{route('quizzes.add',$quiz->id)}}"><h3>{{$quiz->name}}</h3></a></td>--}}
{{--                            <td>--}}
{{--                                <a href="{{route('quizzes.delete',$quiz->id)}}"--}}
{{--                                   class="btn btn-danger text-white delete-category" style="color: red"--}}
{{--                                   onclick="return confirm('Are you want delete ?')">Del</a>--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                <a href="{{route('quizzes.edit',$quiz->id)}}"--}}
{{--                                   class="btn btn-primary text-white delete-category" style="color: red"--}}
{{--                                   >Edit</a>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                    @endforeach--}}
{{--                    </tbody>--}}
{{--                </table>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}


@extends('layouts.admin')
@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="m-0 font-weight-bold ">
                List Quiz
            </h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Quiz</th>
                        <th >Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Quiz</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($quizzes as $quiz)
                        <tr>
                            <td><a href="{{route('quizzes.add',$quiz->id)}}"><h3>{{$quiz->name}}</h3></a></td>
                            <td>
                                <a href="{{route('quizzes.delete',$quiz->id)}}"
                                   class="btn btn-danger text-white delete-category" style="color: red"
                                   onclick="return confirm('Are you want delete ?')">Del</a>
                                <a href="{{route('quizzes.edit',$quiz->id)}}"
                                   class="btn btn-secondary text-white delete-category" style="color: red"
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
