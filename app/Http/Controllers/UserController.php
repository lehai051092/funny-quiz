<?php

namespace App\Http\Controllers;

use App\Http\Services\Impl\UserServiceImpl;
use App\Rules\MatchOldPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserServiceImpl $userService)
    {
        $this->middleware('auth');
        $this->userService = $userService;
    }

    public function changePassword()
    {
        return view('users.changePassword');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

        $message = 'Change Password Success';

        return view('users.success', compact('message'));
    }
}
