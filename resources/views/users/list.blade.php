@extends('layouts.admin')
@section('content')
                <!-- Page Heading -->
                <h1 class="h1 mb-2 text-gray-800">List User</h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th><span>User</span></th>
                                    <th><span>Birthday</span></th>
                                    <th class="text-center"><span>Gender</span></th>
                                    <th><span>Email</span></th>
                                    <th>&nbsp;Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <img src="{{asset('storage/'.$user->image)}}" alt="" style="width: 100px">
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
                                                <i class="fa fa-square fa-stack-2x" style="color: green"></i>
                                                <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                            </span>
                                            </a>
                                            <a href="{{route('users.delete', $user->id)}}" class="table-link danger" onclick="return confirm('Are you delete?')">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x" style="color: red"></i>
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
@endsection
