@extends('layouts.admin')
@section('content')

    <div class="card shadow mb-4 d-flex">
        <div class="card-header py-3">
            <h1 class="m-0 font-weight-bold">
                Edit Question
            </h1>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <div class="form-group">
                        <div class="col-12">
                            <div class="row">
                                <label class="col-2"><h4><i class="fa">Title Question</i></h4></label>
                                <div class="col-9">
                                    <input style="display: none" id="id" value="{{$question->id}}"
                                           data-id="{{$question->id}}">
                                    <input type="text" class="form-control" name="title"
                                           value="{{$question->title}}" id="titleEdit">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12">
                            <div class="row">
                                <label class="col-2"><h4><i class="fa">Desc Question</i></h4></label>
                                <div class="col-9">
                                        <textarea type="text" class="form-control"
                                                  name="desc" id="descEdit">{{$question->desc}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12">
                            <div class="row">
                                <label class="col-2"><h4><i class="fa">Content Question</i></h4></label>
                                <div class="col-9">
                                        <textarea type="text" class="form-control"
                                                  name="contentQuestion"
                                                  id="contentQuestionEdit">{{$question->content}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12">
                            <div class="row">
                                <label class="col-2"><h4><i class="fa">Category</i></h4></label>
                                <div class="col-9">
                                    <select class="form-control" name="category_id" id="category_id">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}"
                                                    @if($question->category_id === $category->id)
                                                    selected
                                                @endif
                                            >{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-12">
                            <div class="row">
                                <label class="col-2"><h4><i class="fa">Type</i></h4></label>
                                <div class="col-9">
                                    <select class="form-control" name="type" id="type_id">
                                        <option value="">Select Type</option>
                                        @foreach($types as $type)
                                            <option value="{{$type->id}}"
                                                    @if($question->type_id === $type->id)
                                                    selected
                                                @endif>{{$type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pb-3 pl-4 ml-5">
                        <button type="button" class="btn btn-primary text-center editQuestion" id="editQuestion">Edit
                            Question
                        </button>
                    </div>


                    <form method="post">
                        @csrf
                        <div class="form-group" style="display: none" id="editAnswers">
                            <hr>
                            <hr>
                            <hr>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-2"><h4><i class="fa">Answer</i></h4></div>
                                    <div class="col-9 mt-3">
                                        <div class="col-12">
                                            <div class="" id="dynamic_edit">
                                                @foreach($answers as $answer)
                                                    <div class="row">
                                                        <input type="text" class="idOld" value="{{$answer['id']}}"
                                                               style="display: none">
                                                        <input type="text" class="form-control  col-9 titleOld"
                                                               value="{{$answer['title']}}"/>&nbsp;&nbsp;

                                                        <input type="checkbox" id="myCheckEdit" class="statusOld"
                                                               value="{{$answer['status']}}"
                                                               @if($answer['status'] === 1)
                                                               checked
                                                            @endif
                                                        />
                                                        <input type="text"
                                                               value="{{$answer['question_id']}}"
                                                               class="questionIdOld" style="display: none"/>
                                                        <a href="{{route('questions.deleteAnswer', $answer['id'])}}"
                                                           onclick="return confirm('Are You Sure Delete???')"><i
                                                                name="remove" id="' + i + '"
                                                                class="fa fa-trash btn_remove"
                                                                style="color: red" aria-hidden="true"></i></a>
                                                    </div><br>
                                                @endforeach
                                            </div>
                                        </div>
                                        <a id="editAnswer" class="btn btn-link"><i class="fa fa-plus"
                                                                                   aria-hidden="true"></i> Add New
                                            Answers</a>
                                        <button type="button" class="btn btn-danger mt-1 save" style="display: none">
                                            Save
                                        </button>
                                    </div>
                                </div>

                            </div>
                            <div class="pb-3 pl-4 ml-5">
                                <button type="button" class="btn btn-primary text-center editAnswers">Edit Answers
                                </button>
                                <a href="{{route('admins.questionList')}}" class="btn btn-secondary done"
                                   style="display: none">Done</a>
                            </div>

                        </div>

                    </form>
                </table>
            </div>
        </div>
    </div>

@endsection


