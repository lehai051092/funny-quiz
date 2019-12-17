<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function get404()
    {
        return view('admins.404');
    }

    public function getBlank()
    {
        return view('admins.blank');
    }

    public function getButtons()
    {
        return view('admins.buttons');
    }

    public function getCards()
    {
        return view('admins.cards');
    }

    public function getCharts()
    {
        return view('admins.charts');
    }

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
        return view('auth.register');
    }

    public function getTables()
    {
        return view('admins.tables');
    }

    public function getUtilitiesAnimation()
    {
        return view('admins.utilities-animation');
    }

    public function getUtilitiesBorder()
    {
        return view('admins.utilities-border');
    }

    public function getUtilitiesColor()
    {
        return view('admins.utilities-color');
    }

    public function getUtilitiesOther()
    {
        return view('admins.utilities-other');
    }



}
