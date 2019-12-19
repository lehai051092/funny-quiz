@extends('layouts.admin')
@section('content')
    <h1 class="h1 mb-2 text-gray-800">Edit User</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <form method="post" action="{{route('users.edit', $user->id)}}">
                        @csrf
                        <div class="form-group">
                           <div class="col-12">
                               <div class="row">
                                   <label class="col-2" for="name"><h4>Name</h4></label>
                                   <input type="text" class="form-control col-9" id="name" value="{{$user->name}}"
                                          name="name"
                                          @if($errors->has('name'))
                                          style="border: solid red"
                                       @endif>
                                   @if($errors->has('name'))
                                       <p class="text-danger">{{$errors->first('name')}}</p>
                                   @endif
                               </div>
                           </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <div class="row">
                                    <label class="col-2" for="email"><h5>Email</h5></label>
                                    <input type="email" class="form-control col-9" id="email"
                                           placeholder="name@example.com" disabled value="{{$user->email}}"
                                           name="email">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                           <div class="col-12">
                               <div class="row">
                                   <label class="col-2" for="dob"><h5>Birthday</h5></label>
                                   <input type="date" class="form-control col-9" id="dob"
                                          value="{{$user->dob}}" name="dob"
                                          @if($errors->has('dob'))
                                          style="border: solid red"
                                       @endif>
                                   @if($errors->has('dob'))
                                       <p class="text-danger">{{$errors->first('dob')}}</p>
                                   @endif
                               </div>
                           </div>
                        </div>
                        <div class="form-group">
                            <div class="col-12">
                                <div class="row">
                                    <label class="col-2" for="gender"><h5>Gender</h5></label>
                                    <select class="form-control col-9" id="gender" name="gender"
                                            @if($errors->has('gender'))
                                            style="border: solid red"
                                        @endif>
                                        @if($errors->has('gender'))
                                            <p class="text-danger">{{$errors->first('gender')}}</p>
                                        @endif
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
                            </div>
                        </div>
                        <div class="form-group">
                           <div class="col-12">
                               <div class="row">
                                   <label class="col-2" for="role"><h5>Role</h5></label>
                                   <select class="form-control col-9" id="role" name="role"
                                           @if($errors->has('role'))
                                           style="border: solid red"
                                       @endif>
                                       @if($errors->has('role'))
                                           <p class="text-danger">{{$errors->first('role')}}</p>
                                       @endif
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
                           </div>
                        </div>
                        <div class="form-group pl-3">
                            <button type="submit" class="btn text-white"
                                    style="background: linear-gradient(to right,#3498db, #007bff)">Update
                            </button>
                            <a class="btn btn-secondary" href="{{route('users.list')}}">Cancel</a>
                        </div>
                    </form>

                </table>
            </div>
        </div>
    </div>

@endsection
