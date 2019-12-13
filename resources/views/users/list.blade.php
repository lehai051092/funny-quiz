@extends('layouts.app')
@section('content')
    <div class="container bootstrap snippet mt-5">
        <div class="row">
            <div class="col-lg-12 mt-5 mb-5">
                <div class="card" style="width: 100%;">
                    <div class="card-header">
                        <h3><i class="fa">List User</i></h3>
                    </div>
                    <hr>
                    <div class="main-box no-header clearfix">
                        <div class="main-box-body clearfix">
                            <div class="table-responsive">
                                <table class="table user-list">
                                    <thead>
                                    <tr>
                                        <th><span>User</span></th>
                                        <th><span>Birthday</span></th>
                                        <th class="text-center"><span>Gender</span></th>
                                        <th><span>Email</span></th>
                                        <th>&nbsp;</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>
                                                <img src="{{asset('storage/'.$user->image)}}" alt="">
                                                <a href="#" class="user-link">{{$user->name}}</a>
                                                <span class="user-subhead">@if($user->role !== \App\RoleInterface::ADMIN)
                                                        Guest
                                                    @else
                                                        Admin
                                                    @endif
                                            </span>
                                            </td>
                                            <td>{{$user->dob}}</td>
                                            <td class="text-center">
                                            <span class="label label-default">@if($user->gender !== \App\GenderInterface::MALE)
                                                    Female
                                                @else
                                                    Male
                                                @endif</span>
                                            </td>
                                            <td>
                                                <a href="#">{{$user->email}}</a>
                                            </td>
                                            <td style="width: 20%;">
                                                <a href="{{route('users.edit', $user->id)}}" class="table-link">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                            </span>
                                                </a>
                                                <a href="#" class="table-link danger">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                            </span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
