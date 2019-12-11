<?php

namespace App\Http\Controllers;

use App\Http\Services\Impl\UserServiceImpl;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserServiceImpl $userService)
    {
        $this->middleware('auth');
        $this->userService = $userService;
    }
}
