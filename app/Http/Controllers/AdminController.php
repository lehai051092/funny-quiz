<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function getForgotPassword()
    {
        return view('admins.forgot-password');
    }

    public function getIndex()
    {
        return view('admins.index');
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
        return view('admins.tables');
    }




}
