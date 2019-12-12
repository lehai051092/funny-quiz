@extends('layouts.app')
@section('content')

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <!------ Include the above in your HEAD tag ---------->


    <link rel="stylesheet" href="https://bootswatch.com/4/simplex/bootstrap.min.css"/>


    <div class="container m-5">
        <div class="row m-5">
            <div class="col-12 m-5">
                <div class="card m-5">
                    <div class="card-body">
                        <form enctype="multipart/form-data" method="post" action="{{route('users.updateImage', $user->id)}}">
                            @csrf
                            <div class="card-title mb-4">
                                <div class="d-flex justify-content-start">
                                    <div class="image-container">
                                        <img src="{{asset('storage/'.$user->image)}}" id="imgProfile"
                                             style="width: 150px; height: 150px" class="img-thumbnail"/>
                                        <div class="middle">
                                            <input type="button" class="btn btn-secondary" id="btnChangePicture"
                                                   value="Change"/>
                                            <input type="file" style="display: none;" id="profilePicture" name="image"/>
                                        </div>
                                        <div class="bottom mt-3">
                                            <input type="submit" class="btn btn-info" value="Change Image">
                                        </div>
                                    </div>
                                    <div class="userData ml-3">
                                        <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"></h2>
                                    </div>
                                    <div class="ml-auto">
                                        <input type="button" class="btn btn-primary d-none" id="btnDiscard"
                                               value="Discard Changes"/>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="row">
                            <div class="col-12">
                                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="basicInfo-tab" data-toggle="tab"
                                           href="#basicInfo" role="tab" aria-controls="basicInfo"
                                           aria-selected="true">Basic
                                            Info</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="connectedServices-tab" data-toggle="tab"
                                           href="#connectedServices" role="tab" aria-controls="connectedServices"
                                           aria-selected="false">Change Password</a>
                                    </li>
                                </ul>
                                <div class="tab-content ml-1" id="myTabContent">
                                    <div class="tab-pane fade show active" id="basicInfo" role="tabpanel"
                                         aria-labelledby="basicInfo-tab">

                                        <form method="post" action="{{route('users.update', $user->id)}}">
                                            @csrf
                                            <div id="app">
                                                @include('users.flash-message')
                                                @yield('message')
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3 col-md-2 col-5">
                                                    <label style="font-weight:bold;">Name</label>
                                                </div>
                                                <div class="col-md-8 col-6">
                                                    <input type="text" class="form-control" value="{{$user->name}}"
                                                           name="name"
                                                           @if($errors->has('name'))
                                                           style="border: solid red"
                                                        @endif
                                                    >
                                                    @if($errors->has('name'))
                                                        <p class="text-danger">{{$errors->first('name')}}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <hr/>

                                            <div class="row">
                                                <div class="col-sm-3 col-md-2 col-5">
                                                    <label style="font-weight:bold;">Email</label>
                                                </div>
                                                <div class="col-md-8 col-6">
                                                    <input type="email" class="form-control" value="{{$user->email}}"
                                                           name="email" disabled>
                                                </div>
                                            </div>
                                            <hr/>

                                            <div class="row">
                                                <div class="col-sm-3 col-md-2 col-5">
                                                    <label style="font-weight:bold;">Birth Date</label>
                                                </div>
                                                <div class="col-md-8 col-6">
                                                    <input type="date" class="form-control" value="{{$user->dob}}"
                                                           name="dob"
                                                           @if($errors->has('dob'))
                                                           style="border: solid red"
                                                        @endif
                                                    >
                                                    @if($errors->has('dob'))
                                                        <p class="text-danger">{{$errors->first('dob')}}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <hr/>


                                            <div class="row">
                                                <div class="col-sm-3 col-md-2 col-5">
                                                    <label style="font-weight:bold;">Gender</label>
                                                </div>
                                                <div class="col-md-8 col-6">
                                                    <div class="form-group">
                                                        <select class="form-control" name="gender">
                                                            <option @if($user->gender === \App\GenderInterface::MALE)
                                                                    selected
                                                                    @endif value="1">Male
                                                            </option>
                                                            <option @if($user->gender === \App\GenderInterface::FEMALE)
                                                                    selected
                                                                    @endif value="0">Female
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr/>
                                            <div class="row" style="display: none">
                                                <div class="col-sm-3 col-md-2 col-5">
                                                    <label style="font-weight:bold;">Role</label>
                                                </div>
                                                <div class="form-group">
                                                    <select class="form-control" name="role">
                                                        <option @if($user->role === \App\RoleInterface::ADMIN)
                                                                selected
                                                                @endif value="1">Admin
                                                        </option>
                                                        <option @if($user->role === \App\RoleInterface::GUEST)
                                                                selected
                                                                @endif value="0">Guest
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-3 col-md-2 col-5">

                                                </div>
                                                <div class="col-md-8 col-6">
                                                    <button class="btn btn-info" type="submit">Update</button>
                                                    <a href="{{route('index')}}" class="btn btn-primary">Cancel</a>
                                                </div>
                                            </div>
                                            <hr/>
                                        </form>
                                    </div>

                                    <div class="tab-pane fade" id="connectedServices" role="tabpanel"
                                         aria-labelledby="ConnectedServices-tab">
                                        <form method="post" action="{{route('users.updatePassword', $user->id)}}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm-3 col-md-2 col-5">
                                                    <label style="font-weight:bold;">Old Password</label>
                                                </div>
                                                <div class="col-md-8 col-6">
                                                    <input type="password" class="form-control"
                                                           name="current_password"
                                                           @if($errors->has('current_password'))
                                                           style="border: solid red"
                                                        @endif
                                                    >
                                                    @if($errors->has('current_password'))
                                                        <p class="text-danger">{{$errors->first('current_password')}}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <hr/>
                                            <div class="row">
                                                <div class="col-sm-3 col-md-2 col-5">
                                                    <label style="font-weight:bold;">New Password</label>
                                                </div>
                                                <div class="col-md-8 col-6">
                                                    <input type="password" class="form-control"
                                                           value=""
                                                           name="new_password"
                                                           @if($errors->has('new_password'))
                                                           style="border: solid red"
                                                        @endif
                                                    >
                                                    @if($errors->has('new_password'))
                                                        <p class="text-danger">{{$errors->first('new_password')}}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <hr/>
                                            <div class="row">

                                                <div class="col-sm-3 col-md-2 col-5">
                                                    <label style="font-weight:bold;">Confirm Password</label>
                                                </div>
                                                <div class="col-md-8 col-6">
                                                    <input type="password" class="form-control"
                                                           value=""
                                                           name="new_confirm_password"
                                                           @if($errors->has('new_confirm_password'))
                                                           style="border: solid red"
                                                        @endif
                                                    >
                                                    @if($errors->has('new_confirm_password'))
                                                        <p class="text-danger">{{$errors->first('new_confirm_password')}}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <hr/>
                                            <div class="row">
                                                <div class="col-sm-3 col-md-2 col-5">

                                                </div>
                                                <div class="col-md-8 col-6">
                                                    <button class="btn btn-info" type="submit">Change Password
                                                    </button>
                                                </div>
                                            </div>
                                            <hr/>
                                        </form>
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
