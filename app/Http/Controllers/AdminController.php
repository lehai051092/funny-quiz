<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{

    public function getForgotPassword()
    {
        return view('admins.forgot-password');
    }

    public function getIndex()
    {
        if (Gate::allows('crud-users')) {
            return view('admins.index');
        }
        abort(403, 'You are not authorized to access');


    }

    public function getLogin()
    {
        return view('auth.login');
    }

    public function getRegister()
    {
        return view('admins.register');
    }

    public function getTables()
    {
        if (Gate::allows('crud-users')) {
            return view('admins.tables');
        }
        abort(403, 'You are not authorized to access');


    }




}
