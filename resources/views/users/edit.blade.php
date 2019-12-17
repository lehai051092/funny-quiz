@extends('layouts.app')
@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col-12 p-5">
                <div class="card " style="width: 100%;">
                    <div id="app">
                        @include('users.flash-message')
                        @yield('message')
                    </div>
                    <div class="card-header text-center" style="background: linear-gradient(to right, #61ba6d, #83c331)">
                        <h1><i class="fa text-white">Edit User</i></h1>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-2">
                        </div>
                        <div class="col-8 ">
                            <form method="post" action="{{route('users.edit', $user->id)}}">
                                @csrf
                                <div class="form-group">
                                    <label for="name"><h5>Name</h5></label>
                                    <input type="text" class="form-control" id="name" value="{{$user->name}}" name="name"
                                           @if($errors->has('name'))
                                           style="border: solid red"
                                        @endif>
                                    @if($errors->has('name'))
                                        <p class="text-danger">{{$errors->first('name')}}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="email"><h5>Email</h5></label>
                                    <input type="email" class="form-control" id="email"
                                           placeholder="name@example.com" disabled value="{{$user->email}}" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="dob"><h5>Birthday</h5></label>
                                    <input type="date" class="form-control" id="dob"
                                            value="{{$user->dob}}" name="dob">
                                </div>
                                <div class="form-group">
                                    <label for="gender"><h5>Gender</h5></label>
                                    <select class="form-control" id="gender" name="gender">
                                        <option value="">Select your gender</option>
                                        <option @if($user->gender === \App\GenderInterface::FEMALE)
                                                selected
                                                @endif value="0">Female
                                        </option>
                                        <option @if($user->gender === \App\GenderInterface::MALE)
                                                selected
                                                @endif value="1">Male
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="role"><h5>Role</h5></label>
                                    <select class="form-control" id="role" name="role">
                                        <option value="">Select your role</option>
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
                                <div class="form-group">
                                    <button class="btn text-white" style="background: linear-gradient(to right,#61ba6d, #83c331)">Update</button>
                                    <a class="btn btn-secondary" href="{{route('users.list')}}">Cancel</a>
                                </div>
                            </form>
                        </div>
                        <div class="col-2">
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
